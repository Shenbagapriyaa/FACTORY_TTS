<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>
        @yield('page-title', 'Textile Flow') | Textile Flow
    </title>

    {{-- =====================================================
         PROFESSIONAL ERP CSS
         Cache busting ensures latest CSS is loaded
    ====================================================== --}}

    <link rel="stylesheet"
          href="{{ asset('css/app.css') }}?v={{ filemtime(public_path('css/app.css')) }}">

</head>

<body>

<div class="app-shell">

    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    <aside class="sidebar">

        {{-- BRAND --}}

        <div class="brand">

            <span class="brand-main">
                Textile
            </span>

            <span class="brand-accent">
                Flow
            </span>

        </div>

        <button class="sidebar-toggle" type="button" aria-expanded="false" aria-controls="sidebarNavigation">
            <span class="menu-lines" aria-hidden="true"></span>
            <span>Menu</span>
        </button>


        {{-- USER --}}

        <div class="sidebar-user">

            <div class="sidebar-user-name">
                {{ auth()->user()->name }}
            </div>

            <div class="sidebar-user-role">
                Administrator
            </div>

        </div>


        {{-- NAVIGATION --}}

        <nav class="sidebar-nav" id="sidebarNavigation">

            {{-- DASHBOARD --}}

            <a href="{{ route('dashboard') }}"
               class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">

                <span class="nav-icon">⌂</span>

                <span>
                    Dashboard
                </span>

            </a>


            {{-- =================================================
                 MASTER
            ================================================== --}}

            <div class="nav-section-title">
                MASTER
            </div>


            {{-- FABRICS --}}

            <a href="{{ route('fabrics.index') }}"
               class="nav-item {{ request()->routeIs('fabrics.*') ? 'active' : '' }}">

                <span class="nav-icon">▦</span>

                <span>
                    Fabrics
                </span>

            </a>


            {{-- FABRIC GROUPS --}}

            <a href="{{ route('fabric-groups.index') }}"
               class="nav-item {{ request()->routeIs('fabric-groups.*') ? 'active' : '' }}">

                <span class="nav-icon">▤</span>

                <span>
                    Fabric Groups
                </span>

            </a>


            {{-- =================================================
                 PRODUCTION
            ================================================== --}}

            <div class="nav-section-title">
                PRODUCTION
            </div>


            {{-- MATERIAL RECEIVING --}}

            <a href="{{ route('material-receivings.index') }}"
               class="nav-item {{ request()->routeIs('material-receivings.*') ? 'active' : '' }}">

                <span class="nav-icon">⇩</span>

                <span>
                    Material Receiving
                </span>

            </a>


            {{-- GRN --}}

            <a href="{{ route('grns.index') }}"
               class="nav-item {{ request()->routeIs('grns.*') ? 'active' : '' }}">

                <span class="nav-icon">▣</span>

                <span>
                    GRN
                </span>

            </a>


            {{-- INSPECTION --}}

            <a href="{{ route('inspections.index') }}"
               class="nav-item {{ request()->routeIs('inspections.*') ? 'active' : '' }}">

                <span class="nav-icon">✓</span>

                <span>
                    Inspection
                </span>

            </a>


            {{-- FABRIC STORE --}}

            <a href="{{ route('fabric-stores.index') }}"
               class="nav-item {{ request()->routeIs('fabric-stores.*') ? 'active' : '' }}">

                <span class="nav-icon">▤</span>

                <span>
                    Fabric Store
                </span>

            </a>


            {{-- RELAXATION --}}

            <a href="{{ route('relaxations.index') }}"
               class="nav-item {{ request()->routeIs('relaxations.*') ? 'active' : '' }}">

                <span class="nav-icon">◌</span>

                <span>
                    Relaxation
                </span>

            </a>


            {{-- RESERVATION --}}

            <a href="{{ route('reservations.index') }}"
               class="nav-item {{ request()->routeIs('reservations.*') ? 'active' : '' }}">

                <span class="nav-icon">▣</span>

                <span>
                    Reservation
                </span>

            </a>


            {{-- FABRIC ISSUE --}}

            <a href="{{ route('fabric-issues.index') }}"
               class="nav-item {{ request()->routeIs('fabric-issues.*') ? 'active' : '' }}">

                <span class="nav-icon">⇧</span>

                <span>
                    Fabric Issue
                </span>

            </a>


            {{-- ORDERS --}}

            <a href="{{ route('orders.index') }}"
               class="nav-item {{ request()->routeIs('orders.*') ? 'active' : '' }}">

                <span class="nav-icon">▤</span>

                <span>
                    Orders
                </span>

            </a>


            {{-- PATTERN / CAD --}}

            <a href="{{ route('patterns.index') }}"
               class="nav-item {{ request()->routeIs('patterns.*') ? 'active' : '' }}">

                <span class="nav-icon">◫</span>

                <span>
                    Pattern / CAD
                </span>

            </a>


            {{-- LAY MODELS --}}

            <a href="{{ route('lay-models.index') }}"
               class="nav-item {{ request()->routeIs('lay-models.*') ? 'active' : '' }}">

                <span class="nav-icon">◫</span>

                <span>
                    Lay Models
                </span>

            </a>


            {{-- MARKER --}}

            <a href="{{ route('markers.index') }}"
               class="nav-item {{ request()->routeIs('markers.*') ? 'active' : '' }}">

                <span class="nav-icon">◈</span>

                <span>
                    Marker
                </span>

            </a>


            {{-- CUTTING --}}

            <a href="{{ route('cuttings.index') }}"
               class="nav-item {{ request()->routeIs('cuttings.*') ? 'active' : '' }}">

                <span class="nav-icon">✂</span>

                <span>
                    Cutting
                </span>

            </a>


            {{-- BUNDLE / QR --}}

            <a href="{{ route('bundles.index') }}"
               class="nav-item {{ request()->routeIs('bundles.*') ? 'active' : '' }}">

                <span class="nav-icon">▣</span>

                <span>
                    Bundle / QR Tracking
                </span>

            </a>


            {{-- SEWING --}}

            <a href="{{ route('sewings.index') }}"
               class="nav-item {{ request()->routeIs('sewings.*') ? 'active' : '' }}">

                <span class="nav-icon">⚙</span>

                <span>
                    Sewing / Production
                </span>

            </a>


            {{-- WASHING / LASER --}}

            <a href="{{ route('washings.index') }}"
               class="nav-item {{ request()->routeIs('washings.*') ? 'active' : '' }}">

                <span class="nav-icon">◉</span>

                <span>
                    Washing / Laser
                </span>

            </a>


            {{-- FINISHING --}}

            <a href="{{ route('finishings.index') }}"
               class="nav-item {{ request()->routeIs('finishings.*') ? 'active' : '' }}">

                <span class="nav-icon">✓</span>

                <span>
                    Finishing
                </span>

            </a>


            {{-- PACKING --}}

            <a href="{{ route('packings.index') }}"
               class="nav-item {{ request()->routeIs('packings.*') ? 'active' : '' }}">

                <span class="nav-icon">▣</span>

                <span>
                    Packing
                </span>

            </a>


            {{-- SHIPMENT --}}

            <a href="{{ route('shipments.index') }}"
               class="nav-item {{ request()->routeIs('shipments.*') ? 'active' : '' }}">

                <span class="nav-icon">➤</span>

                <span>
                    Shipment
                </span>

            </a>

        </nav>


        {{-- =================================================
             LOGOUT
        ================================================== --}}

        <div class="sidebar-bottom">

            <form method="POST"
                  action="{{ route('logout') }}"
                  class="logout-form">

                @csrf

                <button type="submit"
                        class="logout-button">

                    <span class="nav-icon">
                        ↪
                    </span>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </aside>


    {{-- =====================================================
         MAIN CONTENT
    ====================================================== --}}

    <main class="main-content">


        {{-- TOPBAR --}}

        <header class="topbar">

            <div class="topbar-content">

                <div class="topbar-heading">

                    <h1>
                        @yield('page-title', 'Dashboard')
                    </h1>

                    <p>
                        @yield(
                            'page-subtitle',
                            'Production master data'
                        )
                    </p>

                </div>

            </div>

        </header>


        {{-- =================================================
             PAGE CONTENT
        ================================================== --}}

        <div class="content">

            {{-- FLASH MESSAGES --}}

            @include('partials.flash')


            {{-- PAGE CONTENT --}}

            @yield('content')

        </div>

    </main>

</div>


{{-- =====================================================
     JAVASCRIPT
====================================================== --}}

<script src="{{ asset('js/app.js') }}?v={{ filemtime(public_path('js/app.js')) }}"></script>

@stack('scripts')


</body>
</html>