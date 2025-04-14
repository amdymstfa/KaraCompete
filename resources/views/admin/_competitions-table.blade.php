<div x-show="activeTab === 'competitions'" class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
    <div class="p-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
      <div>
        <h3 class="font-medium">Competitions</h3>
        <p class="text-sm text-gray-500">Manage all tournaments and events</p>
      </div>
      <a href="create-competition.html" class="bg-green-500 text-white px-4 py-2 rounded-md text-sm font-medium whitespace-nowrap">
        Create Competition
      </a>
    </div>
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead class="bg-gray-50 border-b border-gray-200">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Participants</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <template x-for="competition in competitions" :key="competition.id">
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900" x-text="competition.name"></div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-500" x-text="competition.date"></div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span 
                  class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                  :class="{
                    'bg-green-100 text-green-800': competition.status === 'Upcoming',
                    'bg-blue-100 text-blue-800': competition.status === 'Registration',
                    'bg-yellow-100 text-yellow-800': competition.status === 'Planning'
                  }"
                  x-text="competition.status"
                ></span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-500" x-text="competition.participants"></div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <button class="text-green-600 hover:text-green-900 mr-2">Edit</button>
                <button class="text-red-600 hover:text-red-900">Delete</button>
              </td>
            </tr>
          </template>
        </tbody>
      </table>
    </div>
  </div>