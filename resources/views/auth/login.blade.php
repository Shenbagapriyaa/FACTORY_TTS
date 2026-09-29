<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Sign In | TextileFlow</title>

    <link rel="stylesheet"
          href="{{ asset('css/app.css') }}?v={{ filemtime(public_path('css/app.css')) }}">
</head>

<body class="login-page">

    <div class="login-layout">

        <!-- LEFT BRAND PANEL -->
        <section class="login-brand-panel">

            <div class="brand big">
                <span class="brand-main">Textile</span><span class="brand-accent">Flow</span>
            </div>

            <div class="login-brand-copy">
                <span class="login-overline">PRODUCTION MANAGEMENT</span>

                <h2>
                    From material receipt<br>
                    to final dispatch.
                </h2>

                <p>
                    Track fabric inventory, production orders and shipment
                    records in one workspace.
                </p>
            </div>

            <div class="login-brand-footer">
                <span>TEXTILE FLOW</span>
                <span>01 / OPERATIONS</span>
            </div>

        </section>


        <!-- LOGIN CARD -->
        <main class="login-card">

            <span class="login-form-label">
                WORKSPACE ACCESS
            </span>

            <h1>Sign in</h1>

            <p class="muted">
                Enter your account details to continue.
            </p>

            @include('partials.flash')

            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <!-- EMAIL -->
                <div class="field">

                    <label for="email">
                        Email Address
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="email"
                        placeholder="admin@example.com"
                    >

                </div>


                <!-- PASSWORD -->
                <div class="field">

                    <label for="password">
                        Password
                    </label>

                    <div class="password-field">

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            id="passwordToggle"
                            aria-label="Show password"
                            title="Show password"
                        >

                            <svg
                                id="eyeIcon"
                                xmlns="http://www.w3.org/2000/svg"
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>

                        </button>

                    </div>

                </div>


                <!-- SIGN IN -->
                <button
                    class="btn primary full"
                    type="submit"
                >
                    Sign in
                </button>

            </form>


            <p class="login-security-note">
                Authorized team members only
            </p>

        </main>

    </div>


    <!-- PASSWORD TOGGLE -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const passwordInput =
                document.getElementById('password');

            const passwordToggle =
                document.getElementById('passwordToggle');

            const eyeIcon =
                document.getElementById('eyeIcon');


            if (!passwordInput || !passwordToggle || !eyeIcon) {
                return;
            }


            passwordToggle.addEventListener('click', function () {

                const isHidden =
                    passwordInput.type === 'password';

                passwordInput.type =
                    isHidden ? 'text' : 'password';


                if (isHidden) {

                    passwordToggle.setAttribute(
                        'aria-label',
                        'Hide password'
                    );

                    passwordToggle.setAttribute(
                        'title',
                        'Hide password'
                    );

                    eyeIcon.innerHTML = `
                        <path d="M3 3l18 18"/>
                        <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"/>
                        <path d="M9.9 4.2A10.8 10.8 0 0 1 12 4c6.5 0 10 8 10 8a18.2 18.2 0 0 1-3.1 4.5"/>
                        <path d="M6.6 6.6C3.7 8.4 2 12 2 12s3.5 8 10 8a9.7 9.7 0 0 0 3.4-.6"/>
                    `;

                } else {

                    passwordToggle.setAttribute(
                        'aria-label',
                        'Show password'
                    );

                    passwordToggle.setAttribute(
                        'title',
                        'Show password'
                    );

                    eyeIcon.innerHTML = `
                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/>
                        <circle cx="12" cy="12" r="3"/>
                    `;
                }

            });

        });
    </script>

</body>
</html>