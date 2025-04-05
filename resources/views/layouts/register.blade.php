<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
         <script>
    document.addEventListener('alpine:init', () => {
      Alpine.data('registerForm', () => ({
        fullName: '',
        email: '',
        password: '',
        confirmPassword: '',
        state: '',
        grade: '',
        age: '',
        club: '',
        states: ['California', 'New York', 'Texas', 'Florida', 'Illinois', 'Morocco'],
        grades: ['White Belt', 'Yellow Belt', 'Orange Belt', 'Green Belt', 'Blue Belt', 'Brown Belt', 'Black Belt'],
        ages: ['Under 18', '18-25', '26-35', '36-45', '46+'],
        clubs: ['Shotokan Dojo', 'Goju-Ryu Academy', 'Kyokushin Center', 'Wado-Ryu Institute'],
        loading: false,
        error: '',
        
        submitForm() {
          this.loading = true;
          this.error = '';
          
          if (this.password !== this.confirmPassword) {
            this.error = 'Passwords do not match';
            this.loading = false;
            return;
          }
          
          // Simulate API call
          setTimeout(() => {
            this.loading = false;
            window.location.href = 'tournament-bracket.html';
          }, 1000);
        }
      }));
    });
  </script>
    </head>
    <body>
        <header>
            @include('components.navbar')
        </header>
        <main>
            @yield('content')
        </main>
        <footer class="bg-gray-800 text-white py-8">
            @include('components.footer')
        </footer>
    </body>
</html>
