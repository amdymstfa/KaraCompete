<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterService
{
    public function registerUser(array $data)
    {
        // Validate incoming data
        $validator = Validator::make($data, [
            'fullname' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
            'role' => ['nullable', 'in:admin,referee,athlete'],
            'state' => ['required', 'string'],
            'grade' => ['required', 'string'],
            'age' => 'required|in:Under 18,18-25,26-35,36-45,46+',
            'club' => ['required', 'string'],
        ]);

        // Return errors if validation fails
        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors()
            ];
        }

        // Default role is 'athlete'
        $role = $data['role'] ?? 'athlete';

        // Only admins can assign 'admin' or 'referee' roles
        if (in_array($role, ['admin', 'referee']) && (!Auth::check() || Auth::user()->role !== 'admin')) {
            $role = 'athlete';
        }

        // Create the new user
        $user = User::create([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $role,
            'state' => $data['state'],
            'grade' => $data['grade'],
            'age' => $data['age'],
            'club' => $data['club'],
        ]);

        // Return success response with user data
        return [
            'success' => true,
            'user' => $user
        ];
    }
}
