@extends('layouts.register')
@section('title', 'Register')
@section('content')
     <!-- Register Form -->
  <div class="container mx-auto px-4 py-4 flex justify-center">
    <div class="w-full max-w-2xl">
      <div class="bg-[#F4F6F4] rounded-lg p-10">
        <h1 class="text-2xl font-semibold text-center mb-6">Register</h1>
          
        <form x-data="registerForm" @submit.prevent="submitForm">
            <!-- Notification Toast -->
              <div x-init="setTimeout(() => showToast = true, 500)"
                :class="{ 'hidden': !showToast }"
                x-show="showToast"
                x-transition:enter="transition transform ease-out duration-300"
                x-transition:enter-start="scale-95 opacity-0"
                x-transition:enter-end="scale-100 opacity-100"
                x-transition:leave="transition transform ease-in duration-200"
                x-transition:leave-start="scale-100 opacity-100"
                x-transition:leave-end="scale-95 opacity-0"
                class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-md shadow-lg">
                Registration successful! You can now log in.
            </div>
          <div class="mb-4">
            <input 
              type="text" 
              x-model="fullname"
              placeholder="Fullname" 
              class="bg-white w-full px-4 py-3 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
              required
            >
          </div>
          
          <div class="mb-4">
            <input 
              type="email" 
              x-model="email"
              placeholder="Email" 
              class="bg-white w-full px-4 py-3 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
              required
            >
          </div>
          
          <div class="mb-4">
            <input 
              type="password" 
              x-model="password"
              placeholder="Password" 
              class="bg-white w-full px-4 py-3 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
              required
            >
          </div>
          
          <div class="mb-4">
            <input 
              type="password" 
              x-model="confirmPassword"
              placeholder="Confirm password" 
              class="bg-white w-full px-4 py-3 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
              required
            >
          </div>

          <div class="mb-4">
            <div class="relative">
              <select 
                x-model="state"
                class="bg-white w-full px-4 py-3 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent appearance-none"
                required
              >
                <option value="" disabled >State</option>
                <template x-for="stateOption in states" :key="stateOption">
                  <option :value="stateOption" x-text="stateOption"></option>
                </template>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </div>
            </div>
          </div>
          
          <div class="mb-4">
            <div class="relative">
              <select 
                x-model="grade"
                class="bg-white w-full px-4 py-3 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent appearance-none"
                required
              >
                <option value="" disabled >Grade</option>
                <template x-for="gradeOption in grades" :key="gradeOption">
                  <option :value="gradeOption" x-text="gradeOption"></option>
                </template>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </div>
            </div>
          </div>
          
          <div class="mb-4">
            <div class="relative">
              <select 
                x-model="age"
                class="bg-white w-full px-4 py-3 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent appearance-none"
                required
              >
                <option value="" disabled >Age</option>
                <template x-for="ageOption in ages" :key="ageOption">
                  <option :value="ageOption" x-text="ageOption"></option>
                </template>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </div>
            </div>
          </div>
          
          <div class="mb-4">
            <div class="relative">
              <select 
                x-model="club"
                class="bg-white w-full px-4 py-3 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent appearance-none"
                required
              >
                <option value="" disabled >Club</option>
                <template x-for="clubOption in clubs" :key="clubOption">
                  <option :value="clubOption" x-text="clubOption"></option>
                </template>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </div>
            </div>
          </div>

          <div x-show="error" class="mb-4 text-red-500 text-sm" x-text="error"></div>
          
          <div class="flex justify-center">
            <button 
            type="submit" 
            class=" bg-green-500 text-white py-3 px-3 rounded-md font-medium flex items-center justify-center"
            :class="{'opacity-75 cursor-not-allowed': loading}"
            :disabled="loading"
          >
            <span x-show="loading" class="mr-2">
              <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
            </span>
            <span>REGISTER</span>
          </button>
          </div>
         <div class="flex justify-center mt-5">
            <p class="text-sm text-gray-600">
                Already registered?
                <a href="/login" class="text-green-600 hover:underline">
                  <span>Login</span>
                </a>
              </p>
              
         </div>
        </form>
        

      </div>
    </div>
  </div>
@endsection
