<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
        <script>
          function adminPanel() {
            return {
              activeTab: 'users',
              mobileMenuOpen: false,
              stats: {
                totalUsers: 1254,
                activeUsers: 876,
                totalCompetitions: 54
              },
              users: [
                { id: 1, name: 'John Doe', email: 'john@example.com', role: 'Admin', status: 'Active' },
                { id: 2, name: 'Jane Smith', email: 'jane@example.com', role: 'User', status: 'Active' },
                { id: 3, name: 'Robert Johnson', email: 'robert@example.com', role: 'User', status: 'Inactive' }
              ],
              arbitors: [
                { id: 1, name: 'Alice Brown', email: 'alice@example.com', specialty: 'Boxing', status: 'Active' },
                { id: 2, name: 'Michael Wilson', email: 'michael@example.com', specialty: 'Karate', status: 'Active' },
                { id: 3, name: 'Sarah Davis', email: 'sarah@example.com', specialty: 'Taekwondo', status: 'Inactive' }
              ],
              jurys: [
                { id: 1, name: 'Thomas Clark', email: 'thomas@example.com', role: 'Head Judge', status: 'Active' },
                { id: 2, name: 'Emily White', email: 'emily@example.com', role: 'Judge', status: 'Active' },
                { id: 3, name: 'David Miller', email: 'david@example.com', role: 'Technical Expert', status: 'Inactive' }
              ],
              competitions: [
                { id: 1, name: 'Summer Championships', date: '2025-05-15', status: 'Upcoming', participants: '120' },
                { id: 2, name: 'Regional Tournament', date: '2025-06-30', status: 'Registration', participants: '45' },
                { id: 3, name: 'National Finals', date: '2025-08-10', status: 'Planning', participants: '0' }
              ],
        
              fighter1: {
                name: 'Ali Diallo',
                age: '27 years old',
                country: 'Morocco',
                category: 'Middleweight',
                belt: 'Black'
              },
              fighter2: {
                name: 'David Rodriguez',
                age: '25 years old',
                country: 'Spain',
                category: 'Middleweight',
                belt: 'Black'
              },
              matches: [
                { id: 1, fighter1: 'Mr Diallo', fighter2: 'Mr Rodriguez', time: '10:30', status: 'Scheduled' },
                { id: 2, fighter1: 'Mr Diallo', fighter2: 'Mr Rodriguez', time: '11:15', status: 'Scheduled' },
                { id: 3, fighter1: 'Mr Diallo', fighter2: 'Mr Rodriguez', time: '12:00', status: 'Scheduled' },
                { id: 4, fighter1: 'Mr Diallo', fighter2: 'Mr Rodriguez', time: '13:45', status: 'Scheduled' }
              ],
             
              setActiveTab(tab) {
                this.activeTab = tab;
                this.mobileMenuOpen = false; 
              }
            }
          }
        </script>
    </head>
    <body>
        <main>
            @yield('content')
        </main>
        <footer class="bg-gray-800 text-white py-8">
            @include('components.footer')
        </footer>
    </body>
</html>
