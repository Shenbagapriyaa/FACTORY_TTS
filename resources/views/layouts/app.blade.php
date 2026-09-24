<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Textile Production Management' }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

<div class="app-shell">

    <aside class="sidebar">

        <div class="brand">
            <span class="brand-main">Textile</span><span class="brand-accent">Flow</span>
        </div>

        <div class="sidebar-user">
            <div class="sidebar-user-name">
                {{ auth()->user()->name }}
            </div>
        </div>

        <nav class="sidebar-nav">

            <a
                href="{{ route('dashboard') }}"
                class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"
            >
                <span class="nav-icon">⌂</span>
                <span>Dashboard</span>
            </a>

            <div class="nav-section-title">
                MASTER
            </div>

            <a
                href="{{ route('fabrics.index') }}"
                class="nav-item {{ request()->routeIs('fabrics.*') ? 'active' : '' }}"
            >
                <span class="nav-icon">▦</span>
                <span>Fabrics</span>
            </a>

            <a
                href="{{ route('fabric-groups.index') }}"
                class="nav-item {{ request()->routeIs('fabric-groups.*') ? 'active' : '' }}"
            >
                <span class="nav-icon">▤</span>
                <span>Fabric Groups</span>
            </a>

            <div class="nav-section-title">
                PRODUCTION
            </div>

            <a
                href="{{ route('lay-models.index') }}"
                class="nav-item {{ request()->routeIs('lay-models.*') ? 'active' : '' }}"
            >
                <span class="nav-icon">◫</span>
                <span>Lay Models</span>
            </a>

        </nav>

        <div class="sidebar-bottom">

            <form
                method="POST"
                action="{{ route('logout') }}"
                class="logout-form"
            >
                @csrf

                <button type="submit" class="logout-button">
                    <span class="nav-icon">↪</span>
                    <span>Logout</span>
                </button>
            </form>

        </div>

    </aside>

    <main class="main-content">

        <header class="topbar">

            <div class="topbar-content">

                <div>

                    <h1>
                        @yield('page-title', 'Dashboard')
                    </h1>

                    <p>
                        @yield('page-subtitle', 'Production master data')
                    </p>

                </div>

            </div>

        </header>

        <div class="content">

            @include('partials.flash')

            @yield('content')

        </div>

    </main>

</div>

<script src="{{ asset('js/app.js') }}"></script>

@stack('scripts')

</body>
</html>