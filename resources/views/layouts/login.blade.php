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
              Alpine.data('loginForm', () => ({
                email: '',
                password: '',
                loading: false,
                error: '',
                
                submitForm() {
                  this.loading = true;
                  this.error = '';
                  
                  // Simulate API call
                  setTimeout(() => {
                    this.loading = false;
                    if (this.email === 'admin@example.com' && this.password === 'password') {
                      window.location.href = 'admin-panel.html';
                    } else if (this.email && this.password) {
                      window.location.href = 'tournament-bracket.html';
                    } else {
                      this.error = 'Please enter valid credentials';
                    }
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
