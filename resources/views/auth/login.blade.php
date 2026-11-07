<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.css"
    integrity="sha512-x9WwyMYBnlXMNQ6kQ/Lyzu1NqIhLQKL5Oq6xByfXuRj7s9CskyCbLv/1IjqzJmXwFXWr0ov6jBV7Qbc0hh9nHg=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
    @vite('resources/scss/app.scss')
</head>
<body class="login-page">
    <main class="auth-container" aria-labelledby="login-title">
        <section class="auth-card">
            <h1 id="login-title" class="auth-title">Entrar</h1>

            @if (session('success'))
                <div class="auth-alert" role="alert">{{ session('success') }}</div>
            @endif

            <form action="{{ route('login.authenticate') }}" method="POST">
                @csrf

                <div class="auth-field">
                    <label class="visually-hidden" for="email">Email</label>
                    <span class="auth-field-icon bi bi-envelope" aria-hidden="true">
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <input id="email" name="email" type="email" value="{{ old('email') }}"
                        class="@error('email') is-invalid @enderror" placeholder="Email"
                        autocomplete="email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="auth-field">
                    <label class="visually-hidden" for="password">Senha</label>
                    <span class="auth-field-icon bi bi-lock-fill" aria-hidden="true">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input id="password" name="password" type="password"
                        class="@error('password') is-invalid @enderror" placeholder="Senha"
                        autocomplete="current-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="auth-submit">Entrar</button>
            </form>
        </section>

        <a class="auth-navigation" href="{{ route('register') }}">Cadastre-se</a>
    </main>
</body>
</html>
