@extends('layouts.app')
@section('title', 'Login')
@section('content')

  <!-- Login Form -->
  <div class="container mx-auto px-4 py-12 flex justify-center">
    <div class="w-full max-w-xl">
      <div class="bg-[#F4F6F4] rounded-lg p-8">
        <h1 class="text-2xl font-semibold text-center mb-6">Login</h1>
        
        <form x-data="loginForm" @submit.prevent="submitForm">
          <div class="mb-4">
            <input 
              type="email" 
              x-model="email"
              placeholder="Email" 
              class="w-full px-4 py-3 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white"
              required
            >
          </div>
          
          <div class="mb-6">
            <input 
              type="password" 
              x-model="password"
              placeholder="Password" 
              class="w-full px-4 py-3 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white"
              required
            >
          </div>
          
          <div x-show="error" class="mb-4 text-red-500 text-sm" x-text="error"></div>
          
         <div class="flex justify-center">
            <button 
            type="submit" 
            class="px-3 bg-green-500 text-white py-3 rounded-md font-medium flex items-center justify-center"
            :class="{'opacity-75 cursor-not-allowed': loading}"
            :disabled="loading"
          >
            <span x-show="loading" class="mr-2">
              <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
            </span>
            <span>LOGIN</span>
          </button>
         </div>
         <div class="flex justify-center mt-5">
            <p class="text-sm text-gray-600">
                Not registered?
                <a href="/register" class="text-green-600 hover:underline">
                  <span>Register</span>
                </a>
              </p>
              
         </div>
        </form>
      </div>
    </div>
  </div>
@endsection