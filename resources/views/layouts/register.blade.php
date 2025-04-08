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
        fullname: '',
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

      // Basic validation
      if (!this.email.includes('@')) {
        this.error = 'Please enter a valid email address.';
        this.loading = false;
        return;
      }

      if (this.password.length < 8) {
        this.error = 'Password must be at least 8 characters.';
        this.loading = false;
        return;
      }

      fetch('/api/registration', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
  },
  credentials: 'include',
  body: JSON.stringify({
    fullname: this.fullname,
    email: this.email,
    password: this.password,
    password_confirmation: this.confirmPassword,
    state: this.state,
    grade: this.grade,
    age: this.age,
    club: this.club
  })
})
.then(res => res.json())
.then(data => {
  this.loading = false;
  console.log(data);
  if (data.message) {
   
    // alert(data.message);
    this.showToast = true;
    // window.location.href = '/login';
    setTimeout(() => {
          window.location.href = '/login';
        }, 1000);
  } else {
    this.error = data.message || 'Registration failed. Please try again.';
  }
})
.catch(err => {
  this.loading = false;
  this.error = 'Something went wrong. Please try again.';
  console.error(err);
});

    }
      }));
    });
  </script>
    </head>
    <body>
        <header class="">
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
