@extends('layouts.dasboardAdmin')
@section('title', 'Admin Panel')

@section('content')
<div class="bg-white">
    <div class="h-screen flex flex-col md:flex-row" x-data="adminPanel">
      <!-- Overlay pour mobile quand le sidebar est ouvert -->
      <div 
        x-show="mobileMenuOpen" 
        @click="mobileMenuOpen = false" 
        class="fixed inset-0 bg-black bg-opacity-50 md:hidden z-20"
      ></div>

      <!-- Sidebar -->
      @include('admin._sidebar')
      
      <!-- Main Content -->
      <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Content Header -->
        @include('admin._header')
        
        <!-- Content Body -->
        <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
          <!-- Stats Cards -->
          @include('admin._stats')
          
          <!-- Tables pour chaque onglet -->
          @include('admin._users-table')
          @include('admin._arbitors-table')
          @include('admin._jurys-table')
          @include('admin._competitions-table')
          @include('admin._tournament-table')
        </main>
      </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/admin-panel.js') }}"></script>
@endsection