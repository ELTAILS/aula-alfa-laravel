<header class="d-flex justify-content-between align-items-center px-3 py-2 bg-dark text-light">
    <span>{{ config('app.name') }}</span>
    <div class="d-flex align-items-center gap-2">
        <span>{{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">Sair</button>
        </form>
    </div>
</header>
