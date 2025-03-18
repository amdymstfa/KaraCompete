@extends('layouts.app')
@section('title', 'Karacompete')
@section('content')
    <!-- Hero Section -->
    <div class="p-4 md:p-5 max-w-7xl mx-auto">
        <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl p-2 md:p-5 font-bold">
            Simplify your <span class="text-primary">karate</span> competitions with our all in one app!
        </h1>
        
        <p class="text-lg sm:text-xl md:text-2xl lg:text-3xl p-2 md:p-5">
            Organize, participate, and track results in real time with intuitive tools for organizers, athletes, referees, and spectators.
        </p>
        
        <!-- Feature points - responsive grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-2 md:p-5">
            <div class="flex items-start space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 sm:w-7 sm:h-7 text-primary flex-shrink-0 mt-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <p class="text-base sm:text-lg md:text-xl lg:text-2xl">Simplified registrations</p>              
            </div>
            <div class="flex items-start space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 sm:w-7 sm:h-7 text-primary flex-shrink-0 mt-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <p class="text-base sm:text-lg md:text-xl lg:text-2xl">Organization of the fights</p>              
            </div>
            <div class="flex items-start space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 sm:w-7 sm:h-7 text-primary flex-shrink-0 mt-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <p class="text-base sm:text-lg md:text-xl lg:text-2xl">Automated combat</p>              
            </div>
        </div>
        
        <div class="flex justify-center items-center p-2 md:p-5 mt-4">
            <a href="">
                <button class="bg-primary border-2 text-white font-bold rounded-xl px-4 py-2 sm:px-5 sm:py-2 md:px-6 md:py-3 text-base sm:text-lg md:text-xl hover:bg-primary/90 transition-colors">
                    Start
                </button>
            </a>
        </div>
    </div>
@endsection

@section('details')
   
@endsection
