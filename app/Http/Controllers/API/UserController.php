<?php

namespace App\Http\Controllers\API; 

use App\Http\Controllers\Controller;
use App\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\UserResource;
use Exception;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log; 

class UserController extends Controller
{
    protected UserServiceInterface $userService;

    /**
     * UserController constructor.
     * Injects the UserServiceInterface dependency.
     *
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
        // Middleware for authorization could be added here
        // For example:
        // $this->middleware('auth:sanctum'); // Require authentication
        // $this->middleware('can:manage-users'); // Require specific permission/policy
    }

    /**
     * @OA\Get(
     *     path="/api/users",
     *     summary="Retrieves the list of users",
     *     tags={"Admin Users"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="List of users",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/UserResource"))
     *     ),
     *     @OA\Response(response=401, description="Unauthenticated"),
     *     @OA\Response(response=403, description="Unauthorized")
     * )
     * Display a listing of the resource (for admin).
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $users = $this->userService->getAllUsers();
        return UserResource::collection($users);
    }

    /**
     * @OA\Get(
     *     path="/api/users/{id}",
     *     summary="Retrieves a specific user",
     *     tags={"Admin Users"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, description="ID of the user", @OA\Schema(type="integer")),
     *     @OA\Response(
     *         response=200,
     *         description="User details",
     *         @OA\JsonContent(ref="#/components/schemas/UserResource")
     *     ),
     *     @OA\Response(response=404, description="User not found"),
     *     @OA\Response(response=401, description="Unauthenticated"),
     *     @OA\Response(response=403, description="Unauthorized")
     * )
     * Display the specified resource (for admin).
     *
     * @param int $id
     * @return UserResource|\Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $user = $this->userService->getUserById($id);
        if (!$user) {
            return response()->json(['message' => 'User not found.'], Response::HTTP_NOT_FOUND); // 404
        }
        return new UserResource($user);
    }


    /**
      * @OA\Put(
      *     path="/api/users/{id}",
      *     summary="Updates a user",
      *     tags={"Admin Users"},
      *     security={{"sanctum":{}}},
      *     @OA\Parameter(name="id", in="path", required=true, description="ID of the user", @OA\Schema(type="integer")),
      *     @OA\RequestBody(
      *         required=true,
      *         description="User data to update",
      *         @OA\JsonContent(ref="#/components/schemas/UpdateUserRequest")
      *     ),
      *     @OA\Response(
      *         response=200,
      *         description="User updated successfully",
      *         @OA\JsonContent(ref="#/components/schemas/UserResource")
      *     ),
      *     @OA\Response(response=404, description="User not found"),
      *     @OA\Response(response=422, description="Validation error"),
      *     @OA\Response(response=401, description="Unauthenticated"),
      *     @OA\Response(response=403, description="Unauthorized")
      * )
      * Update the specified resource in storage (by admin).
      * Handles PUT/PATCH requests.
      *
      * @param Request $request
      * @param int $id
      * @return UserResource|\Illuminate\Http\JsonResponse
      */
    public function update(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'fullname' => 'sometimes|required|string|max:255',
            'email' => ['sometimes', 'required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($id)],
            'password' => 'sometimes|nullable|string|min:8|confirmed',
            'state' => 'sometimes|nullable|string|max:100',
            'grade' => 'sometimes|nullable|string|max:50',
            'age' => 'sometimes|nullable|integer|min:0',
            'club' => 'sometimes|nullable|string|max:100', 
            'role' => ['sometimes', 'required', Rule::in(['admin', 'referee', 'athlete'])],
            'status' => ['sometimes', 'required', 'string', Rule::in(['active', 'pending', 'suspended'])], 
        ]);

        try {
             $success = $this->userService->updateUser($id, $validatedData);

             if (!$success) {
                 // If update returns false, it likely means the user wasn't found
                 // by the underlying repository findById check.
                 return response()->json(['message' => 'User not found or update failed.'], Response::HTTP_NOT_FOUND); // 404
             }

             // Fetch the updated user to return the latest data
             $user = $this->userService->getUserById($id);
              if (!$user) {
                 // Should ideally not happen if update succeeded, but as a safeguard:
                 return response()->json(['message' => 'User not found after update.'], Response::HTTP_NOT_FOUND); // 404
             }
             return new UserResource($user); // 200 OK

        } catch (Exception $e) {
             Log::error("User update error (ID: {$id}): " . $e->getMessage());
             return response()->json(['message' => 'Server error during user update.', 'error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR); // 500
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/users/{id}",
     *     summary="Deletes a user",
     *     tags={"Admin Users"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, description="ID of the user", @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="User deleted successfully"),
     *     @OA\Response(response=404, description="User not found"),
     *     @OA\Response(response=401, description="Unauthenticated"),
     *     @OA\Response(response=403, description="Unauthorized")
     * )
     * Remove the specified resource from storage (by admin).
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $success = $this->userService->deleteUser($id);
            if (!$success) {
                // If delete returns false, it likely means the user wasn't found.
                return response()->json(['message' => 'User not found.'], Response::HTTP_NOT_FOUND); // 404
            }
            return response()->noContent(); // 204 No Content

        } catch (Exception $e) {
            Log::error("User delete error (ID: {$id}): " . $e->getMessage());
            return response()->json(['message' => 'Server error during user deletion.', 'error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR); // 500
        }
    }
}