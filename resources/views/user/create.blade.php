<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    @vite('resources/scss/app.scss')
</head>
<body class="register-page">
    <main class="auth-container" aria-labelledby="register-title">
        <section class="auth-card">
            <h1 id="register-title" class="auth-title">Cadastrar</h1>

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="auth-field">
                    <label class="visually-hidden" for="name">Nome</label>
                    <span class="auth-field-icon bi bi-person" aria-hidden="true"></span>
                    <input id="name" name="name" type="text" value="{{ old('name') }}"
                        class="@error('name') is-invalid @enderror" placeholder="Nome"
                        autocomplete="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="auth-field">
                    <label class="visually-hidden" for="email">Email</label>
                    <span class="auth-field-icon bi bi-envelope" aria-hidden="true"></span>
                    <input id="email" name="email" type="email" value="{{ old('email') }}"
                        class="@error('email') is-invalid @enderror" placeholder="Email"
                        autocomplete="email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="auth-field">
                    <label class="visually-hidden" for="password">Senha</label>
                    <span class="auth-field-icon bi bi-lock-fill" aria-hidden="true"></span>
                    <input id="password" name="password" type="password"
                        class="@error('password') is-invalid @enderror" placeholder="Senha"
                        autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="auth-submit">Cadastrar</button>
            </form>
        </section>

        <a class="auth-navigation" href="{{ route('login') }}">Já tem uma conta? Entrar</a>
    </main>
</body>
</html>
