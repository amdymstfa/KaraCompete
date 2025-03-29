<nav class="p-0 m-0" x-data="{ isOpen: false }">
    <div class="flex justify-between items-center p-2 bg-white shadow-sm left-0 right-0 sticky text-2xl">
        <!-- Logo -->
        <span class="font-bold"><a href="#">KaraCompete</a></span>
        
        <!-- Menu on desktop -->
        <ul class="hidden md:flex justify-between space-x-8">
            <a href=""><li class="hover:border-1 hover:scale-105 duration-500 hover:rounded-sm hover:border-button hover:text-primary ">Tournament</li></a>
            <a href=""><li class="hover:border-1 hover:scale-105 duration-500 hover:rounded-sm hover:border-button hover:text-primary">Calendar</li></a>
            <a href=""><li class="hover:border-1 hover:scale-105 duration-500 hover:rounded-sm hover:border-button hover:text-primary">Results</li></a>
        </ul>
        
        <!-- Login button -->
        <a href="login">
            <button class="hidden md:block text-primary font-bold rounded-sm border-2 border-button px-4 py-1 hover:bg-button hover:text-white transition-colors">
                Login
            </button>
        </a>
        
        <!-- Mobile Menu Button -->
        <button 
            class="md:hidden text-gray-700"
            @click="isOpen = !isOpen"
        >
            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="isOpen" class="md:hidden bg-white shadow-md">
        <ul class="flex flex-col items-center py-4 space-y-4">
            <a href="" @click="isOpen = false"><li class="hover:scale-105 duration-500 hover:rounded-sm hover:text-primary">Tournament</li></a>
            <a href="" @click="isOpen = false"><li class="hover:scale-105 duration-500 hover:rounded-sm hover:text-primary">Calendar</li></a>
            <a href="" @click="isOpen = false"><li class="hover:scale-105 duration-500 hover:rounded-sm hover:text-primary">Results</li></a>
            <button class="text-primary font-bold rounded-sm border-2 border-button px-4 py-1 w-32 hover:bg-button hover:text-white transition-colors">
                Login
            </button>
        </ul>
    </div>
</nav>
