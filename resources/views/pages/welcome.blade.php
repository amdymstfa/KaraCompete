@extends('layouts.app')
@section('title', 'Karacompete')
@section('content')
    <!-- Hero Section -->
    <div class="p-4 md:p-5 max-w-7xl mx-auto">
        <div class="flex justify-around ">
            <div>
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
                        <p class="text-base sm:text-lg md:text-xl lg:text-2xl">simplicity</p>              
                    </div>
                    <div class="flex items-start space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 sm:w-7 sm:h-7 text-primary flex-shrink-0 mt-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <p class="text-base sm:text-lg md:text-xl lg:text-2xl">Organization</p>              
                    </div>
                    <div class="flex items-start space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 sm:w-7 sm:h-7 text-primary flex-shrink-0 mt-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <p class="text-base sm:text-lg md:text-xl lg:text-2xl">automation</p>              
                    </div>
                </div>
            </div>
            
            <div>
                <video src="{{ Vite::asset('resources/datas/video/video1.mp4') }}" autoplay loop
                class="w-full max-w-full rounded-lg shadow-lg border border-gray-300 p-2 md:p-5 mt-5 hidden md:block"
                ></video>
            </div>
            
        </div>
    </div>
@endsection

@section('details')
    <!-- Main Objectives Section -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl p-1 md:p-2 font-bold text-center mb-4">Main objective</h1>
            <p class="text-lg sm:text-xl md:text-2xl lg:text-3xl p-1 md:p-2 text-center mb-12 max-w-4xl mx-auto">
                Our system is designed to optimize the management of combat tournaments
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1: Participant Management -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                    <div class="p-4 flex items-start">
                        <div class="bg-primary rounded-md p-2 mr-3 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-xl lg:text-2xl font-bold">Participant Management</h3>
                    </div>
                    <div class="px-4 pb-4">
                        <p class="text-sm sm:text-base md:text-lg text-gray-700">
                            Streamlined registration system for athletes with detailed profiles including name, age, gender, rank, and club. Self-registration interface available for participants.
                        </p>
                    </div>
                </div>

                <!-- Card 2: Category Management -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                    <div class="p-4 flex items-start">
                        <div class="bg-primary rounded-md p-2 mr-3 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-xl lg:text-2xl font-bold">Category Management</h3>
                    </div>
                    <div class="px-4 pb-4">
                        <p class="text-sm sm:text-base md:text-lg text-gray-700">
                            Create and manage competition categories based on age, gender, weight, and rank. Easily add custom categories to accommodate special tournament requirements.
                        </p>
                    </div>
                </div>

                <!-- Card 3: Fight Organization -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                    <div class="p-4 flex items-start">
                        <div class="bg-primary rounded-md p-2 mr-3 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-xl lg:text-2xl font-bold">Fight Organization</h3>
                    </div>
                    <div class="px-4 pb-4">
                        <p class="text-sm sm:text-base md:text-lg text-gray-700">
                            Automatic generation of competition brackets (pools, direct elimination). Real-time tracking of results and automatic ranking updates after each match.
                        </p>
                    </div>
                </div>

                <!-- Card 4: Referee Management -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                    <div class="p-4 flex items-start">
                        <div class="bg-primary rounded-md p-2 mr-3 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-xl lg:text-2xl font-bold">Referee Management</h3>
                    </div>
                    <div class="px-4 pb-4">
                        <p class="text-sm sm:text-base md:text-lg text-gray-700">
                            Register and manage referees with specific role assignments (main referee, assistant, timekeeper). Optimize referee scheduling for maximum efficiency.
                        </p>
                    </div>
                </div>

                <!-- Card 5: Results Display -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                    <div class="p-4 flex items-start">
                        <div class="bg-primary rounded-md p-2 mr-3 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-xl lg:text-2xl font-bold">Results Display</h3>
                    </div>
                    <div class="px-4 pb-4">
                        <p class="text-sm sm:text-base md:text-lg text-gray-700">
                            Live broadcasting of results for spectators. Automatic generation of certificates and trophies for winners. Comprehensive statistics and performance reports.
                        </p>
                    </div>
                </div>

                <!-- Card 6: App Demo - Special Highlighted Card -->
                <div class="bg-gradient-to-br from-primary/10 to-primary/5 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden border-2 border-primary/20 hover:border-primary/40 transform hover:-translate-y-1">
                    <div class="p-4 flex items-start">
                        <div class="bg-primary rounded-md p-2 mr-3 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-xl lg:text-2xl font-bold">Try Demo Version</h3>
                    </div>
                    <div class="px-4 pb-2">
                        <p class="text-sm sm:text-base md:text-lg text-gray-700">
                            Experience the KaraCompete app firsthand with our interactive demo. Test all features with sample data and see how it can transform your karate competitions.
                        </p>
                    </div>
                    <div class="px-4 pb-4 pt-2 flex justify-center">
                        <a href="#" class="inline-block bg-primary text-white font-bold rounded-md px-6 py-2 hover:bg-primary/90 transition-colors">
                            Launch Demo
                        </a>
                    </div>
                </div>
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

@section('karacompete')
    <div class="">
        <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl p-1 md:p-2 font-bold text-center mb-4">Top Competitions</h1>
        <p class="text-lg sm:text-xl md:text-2xl lg:text-3xl p-1 md:p-2 text-center mb-12 max-w-4xl mx-auto">Meet the top karate athletes competing in this event.</p>
        <div class="grid md:grid-cols-3 gap-3 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Competition infos-details --}}
            <div class="w-fit bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden p-3">
                <div class="h-48 bg-gray-800">
                  <img src="{{Vite :: asset('resources/datas/img/compete.jpeg')}}" alt="Competitor" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                  <div class="text-md sm:text-sm md:text-sm lg:text-xl font-bold">Karate World Series Championship 2023</div>
                  <h3 class="font-medium mb-1"> <span class="text-md sm:text-sm md:text-sm lg:text-xl font-bold">Country</span> : Senegal</h3>
                  <h3 class="font-medium mb-1"> <span class="text-md sm:text-sm md:text-sm lg:text-xl font-bold">Style</span> : Shotokan</h3>
                  <h3 class="font-medium mb-1"> <span class="text-md sm:text-sm md:text-sm lg:text-xl font-bold">Participant</span> : 32</h3>
                </div>
              </div>
              {{-- Competition infos-details --}}
              <div class="w-fit bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden p-3">
                <div class="h-48 bg-gray-800">
                  <img src="{{Vite :: asset('resources/datas/img/compete.jpeg')}}" alt="Competitor" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                  <div class="text-md sm:text-sm md:text-sm lg:text-xl font-bold">Karate World Series Championship 2023</div>
                  <h3 class="font-medium mb-1"> <span class="text-md sm:text-sm md:text-sm lg:text-xl font-bold">Country</span> : Senegal</h3>
                  <h3 class="font-medium mb-1"> <span class="text-md sm:text-sm md:text-sm lg:text-xl font-bold">Style</span> : Shotokan</h3>
                  <h3 class="font-medium mb-1"> <span class="text-md sm:text-sm md:text-sm lg:text-xl font-bold">Participant</span> : 32</h3>
                </div>
              </div>
              {{-- Competition infos-details --}}
              <div class="w-fit bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden p-3">
                <div class="h-48 bg-gray-800">
                  <img src="{{Vite :: asset('resources/datas/img/compete.jpeg')}}" alt="Competitor" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                  <div class="text-md sm:text-sm md:text-sm lg:text-xl font-bold">Karate World Series Championship 2023</div>
                  <h3 class="font-medium mb-1"> <span class="text-md sm:text-sm md:text-sm lg:text-xl font-bold">Country</span> : Senegal</h3>
                  <h3 class="font-medium mb-1"> <span class="text-md sm:text-sm md:text-sm lg:text-xl font-bold">Style</span> : Shotokan</h3>
                  <h3 class="font-medium mb-1"> <span class="text-md sm:text-sm md:text-sm lg:text-xl font-bold">Participant</span> : 32</h3>
                </div>
              </div>
        </div>
    </div>
@endsection
