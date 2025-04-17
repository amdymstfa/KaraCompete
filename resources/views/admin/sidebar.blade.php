<div
    class="fixed md:static inset-y-0 left-0 w-64 bg-white border-r border-gray-200 transform transition-transform duration-300 z-30"
    :class="mobileMenuOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
>
    <div class="flex justify-between items-center p-4 border-b border-gray-200">
        <h1 class="text-xl font-semibold">Admin Panel</h1>
        <button @click="mobileMenuOpen = false" class="md:hidden p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <nav class="p-4">
        <ul class="space-y-1">
            <li>
                <button
                    @click="setActiveTab('users')"
                    class="w-full text-left px-4 py-2 rounded-md transition-colors"
                    :class="activeTab === 'users' ? 'bg-green-100 text-green-800' : 'hover:bg-gray-100'"
                >
                    Users
                </button>
            </li>
            <li>
                <button
                    @click="setActiveTab('Arbitors')"
                    class="w-full text-left px-4 py-2 rounded-md transition-colors"
                    :class="activeTab === 'Arbitors' ? 'bg-green-100 text-green-800' : 'hover:bg-gray-100'"
                >
                    Arbitors
                </button>
            </li>
            <li>
                <button
                    @click="setActiveTab('Jurys')"
                    class="w-full text-left px-4 py-2 rounded-md transition-colors"
                    :class="activeTab === 'Jurys' ? 'bg-green-100 text-green-800' : 'hover:bg-gray-100'"
                >
                    Jurys
                </button>
            </li>
            <li>
                <button
                    @click="setActiveTab('competitions')"
                    class="w-full text-left px-4 py-2 rounded-md transition-colors"
                    :class="activeTab === 'competitions' ? 'bg-green-100 text-green-800' : 'hover:bg-gray-100'"
                >
                    Competitions
                </button>
            </li>
            <li>
                <button
                    @click="setActiveTab('brackets')"
                    class="w-full text-left px-4 py-2 rounded-md transition-colors"
                    :class="activeTab === 'brackets' ? 'bg-green-100 text-green-800' : 'hover:bg-gray-100'"
                >
                    Tournament Brackets
                </button>
            </li>
            <li>
                <button
                    @click="setActiveTab('GlobalsStats')"
                    class="w-full text-left px-4 py-2 rounded-md transition-colors"
                    :class="activeTab === 'brackets' ? 'bg-green-100 text-green-800' : 'hover:bg-gray-100'"
                >
                    Globals stats
                </button>
            </li>
        </ul>
    </nav>
</div>
