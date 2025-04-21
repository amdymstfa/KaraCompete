

<div x-show="activeTab === 'schedule'" class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
      <!-- Fighters Info -->
      <div class="bg-gray-50 rounded-lg p-6 mb-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <!-- Fighter 1 -->
          <div class="w-full md:w-5/12">
            <div class="flex flex-col items-center md:items-start">
              <div class="text-sm font-medium mb-1">Name: <span x-text="fighter1.name"></span></div>
              <div class="text-sm mb-1">Age: <span x-text="fighter1.age"></span></div>
              <div class="text-sm mb-1">Country: <span x-text="fighter1.country"></span></div>
              <div class="text-sm mb-1">Category: <span x-text="fighter1.category"></span></div>
              <div class="text-sm">Belt: <span x-text="fighter1.belt"></span></div>
            </div>
          </div>
          
          <!-- VS -->
          <div class="my-6 md:my-0">
            <div class="text-2xl font-bold text-gray-800">VS</div>
          </div>
          
          <!-- Fighter 2 -->
          <div class="w-full md:w-5/12">
            <div class="flex flex-col items-center md:items-end">
              <div class="text-sm font-medium mb-1">Name: <span x-text="fighter2.name"></span></div>
              <div class="text-sm mb-1">Age: <span x-text="fighter2.age"></span></div>
              <div class="text-sm mb-1">Country: <span x-text="fighter2.country"></span></div>
              <div class="text-sm mb-1">Category: <span x-text="fighter2.category"></span></div>
              <div class="text-sm">Belt: <span x-text="fighter2.belt"></span></div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Upcoming Matches -->
      <h2 class="text-lg font-medium mb-4">Upcoming Matches</h2>
      <div class="space-y-4">
        <template x-for="match in matches" :key="match.id">
          <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4">
            <div class="flex justify-between items-center">
              <div>
                <div class="flex items-center">
                  <span class="font-medium" x-text="match.fighter1"></span>
                  <span class="mx-2 text-gray-400">vs</span>
                  <span class="font-medium" x-text="match.fighter2"></span>
                </div>
                <div class="text-sm text-gray-500 mt-1" x-text="`${match.time} | ${match.status}`"></div>
              </div>
              <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-1 rounded-md text-sm">
                View
              </button>
            </div>
          </div>
        </template>
      </div>
</div>
