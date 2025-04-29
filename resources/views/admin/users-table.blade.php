<div x-show="activeTab === 'users'" class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
  <div class="p-4 border-b border-gray-200">
    <h3 class="font-medium">Users</h3>
    <p class="text-sm text-gray-500">Manage all registered users</p>
  </div>

  <!-- Indicateur de chargement -->
  <div x-show="loadingUsers" class="p-4 text-center text-gray-500">
      Loading users...
  </div>

  <!-- Message si aucun utilisateur n'est trouvé (après chargement) -->
   <div x-show="!loadingUsers && users.length === 0" class="p-4 text-center text-gray-500">
      No users found.
  </div>

  <!-- Afficher le tableau seulement si chargement terminé ET il y a des utilisateurs -->
  <div class="overflow-x-auto" x-show="!loadingUsers && users.length > 0">
    <table class="w-full">
      <thead class="bg-gray-50 border-b border-gray-200">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Full Name</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Club</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
    </thead>
       <tbody class="bg-white divide-y divide-gray-200">
                <template x-for="user in users" :key="user.id">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900" x-text="user.fullname"></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500" x-text="user.email"></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500" x-text="user.club ? user.club.name : 'N/A'"></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full capitalize"
                                  :class="{
                                      'bg-blue-100 text-blue-800': user.role === 'admin',
                                      'bg-purple-100 text-purple-800': user.role === 'referee',
                                      'bg-teal-100 text-teal-800': user.role === 'athlete',
                                      'bg-gray-100 text-gray-800': !['admin', 'referee', 'athlete'].includes(user.role)
                                  }"
                                  x-text="user.role">
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full capitalize"
                                :class="{
                                'bg-green-100 text-green-800': user.status === 'active',
                                'bg-yellow-100 text-yellow-800': user.status === 'pending',
                                'bg-red-100 text-red-800': user.status === 'suspended',
                                'bg-gray-100 text-gray-800': !['active', 'pending', 'suspended'].includes(user.status)
                                }"
                                x-text="user.status">
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                          <button @click="openProgressModal(user)" class="text-blue-600 hover:text-blue-900" title="View Progress">
                            <span class="sr-only">View Progress</span>
                            {{-- Tu peux garder l'icône oeil ou changer pour une icône de stats/graphique --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>

                            <button @click="openEditModal(user)" class="text-indigo-600 hover:text-indigo-900" title="Edit User">
                              <span class="sr-only">Edit</span>
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                              </svg>
                         </button>

                            <button @click="confirmDeleteUser(user.id)" class="text-red-600 hover:text-red-900" title="Delete User">
                                 <span class="sr-only">Delete</span>
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                   <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                 </svg>
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
    </table>
  </div>
</div>