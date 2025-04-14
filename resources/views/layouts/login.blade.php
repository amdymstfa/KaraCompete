<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      @vite(['resources/css/app.css', 'resources/js/app.js'])
      <title>@yield('title')</title>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
      <script>
        document.addEventListener("alpine:init", () => {
  Alpine.data("loginForm", () => ({
    email: "",
    password: "",
    emailError: "",
    passwordError: "",
    loading: false,
    generalError: "",

    validateEmail() {
      if (!this.email) {
        this.emailError = "Email is required"
        return false
      }
      if (!/^\S+@\S+\.\S+$/.test(this.email)) {
        this.emailError = "Please enter a valid email address"
        return false
      }
      this.emailError = ""
      return true
    },

    validatePassword() {
      if (!this.password) {
        this.passwordError = "Password is required"
        return false
      }
      if (this.password.length < 6) {
        this.passwordError = "Password must be at least 6 characters"
        return false
      }
      this.passwordError = ""
      return true
    },

    async submitForm() {
      // Reset errors
      this.emailError = ""
      this.passwordError = ""
      this.generalError = ""

      // Validate form
      const isEmailValid = this.validateEmail()
      const isPasswordValid = this.validatePassword()

      if (!isEmailValid || !isPasswordValid) {
        return
      }

      this.loading = true

      try {
        const response = await fetch("http://127.0.0.1:8000/api/login", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            "X-Requested-With": "XMLHttpRequest",
          },
          body: JSON.stringify({
            email: this.email,
            password: this.password,
          }),
        })

        const data = await response.json()

        if (!response.ok) {
          // Handle API error responses
          if (data.errors) {
            if (data.errors.email) {
              this.emailError = data.errors.email[0]
            }
            if (data.errors.password) {
              this.passwordError = data.errors.password[0]
            }
          } else if (data.message) {
            this.generalError = data.message
          } else {
            this.generalError = "An error occurred. Please try again."
          }
          this.loading = false
          return
        }

        // Login successful
        // Store token in localStorage
        localStorage.setItem("auth_token", data.access_token)
        localStorage.setItem("token_type", data.token_type)
        localStorage.setItem("user", JSON.stringify(data.user))

        // Redirect to the URL provided by the API
        window.location.href = data.redirect
      } catch (error) {
        console.error("Login error:", error)
        this.generalError = "Network error. Please check your connection and try again."
        this.loading = false
      }
    },
  }))
})

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
