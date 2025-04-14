<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
      <div class="flex items-center">
        <div class="bg-green-100 rounded-full p-3 mr-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
        </div>
        <div>
          <div class="text-sm text-gray-500">Total Users</div>
          <div class="text-2xl font-semibold" x-text="stats.totalUsers"></div>
        </div>
      </div>
    </div>
    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
      <div class="flex items-center">
        <div class="bg-green-100 rounded-full p-3 mr-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <div>
          <div class="text-sm text-gray-500">Active Users</div>
          <div class="text-2xl font-semibold" x-text="stats.activeUsers"></div>
        </div>
      </div>
    </div>
    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
      <div class="flex items-center">
        <div class="bg-green-100 rounded-full p-3 mr-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
          </svg>
        </div>
        <div>
          <div class="text-sm text-gray-500">Total Competitions</div>
          <div class="text-2xl font-semibold" x-text="stats.totalCompetitions"></div>
        </div>
      </div>
    </div>
  </div>