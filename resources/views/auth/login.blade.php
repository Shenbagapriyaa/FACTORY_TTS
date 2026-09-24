<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - TextileFlow</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

<div class="login-page">

    <div class="login-card">

        <!-- Brand -->
        <div class="login-brand">
            <span class="brand-main">Textile</span><span class="brand-accent">Flow</span>
        </div>


        <!-- Header -->
        <div class="login-header">
            <h1>Sign in</h1>
            <p>Textile Production Management</p>
        </div>


        <!-- Success Message -->
        @if(session('success'))
            <div class="login-alert success">
                {{ session('success') }}
            </div>
        @endif


        <!-- Error Message -->
        @if($errors->any())
            <div class="login-alert error">
                {{ $errors->first() }}
            </div>
        @endif


        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">

            @csrf


            <!-- Email -->
            <div class="login-field">

                <label for="email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="admin@example.com"
                    autocomplete="email"
                    required
                    autofocus
                >

            </div>


            <!-- Password -->
            <div class="login-field">

                <label for="password">
                    Password
                </label>

                <div class="password-wrapper">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        id="togglePassword"
                        aria-label="Show password"
                    >

                        <!-- Eye -->
                        <svg
                            id="eyeOpen"
                            class="eye-icon"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                        >
                            <path
                                d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />

                            <circle
                                cx="12"
                                cy="12"
                                r="2.7"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            />
                        </svg>


                        <!-- Eye Off -->
                        <svg
                            id="eyeClosed"
                            class="eye-icon hidden"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                        >
                            <path
                                d="M3 3l18 18"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                            />

                            <path
                                d="M10.6 10.6a2.7 2.7 0 0 0 3.8 3.8"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                            />

                            <path
                                d="M6.7 6.8C3.8 8.8 2.5 12 2.5 12s3.5 6 9.5 6c2 0 3.7-.6 5.1-1.4"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />

                            <path
                                d="M9.3 5.4C10.1 5.1 11 5 12 5c6 0 9.5 7 9.5 7s-1.4 2.8-4.2 4.8"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>

                    </button>

                </div>

            </div>


            <!-- Login Button -->
            <button
                type="submit"
                class="login-button"
            >
                Sign in
            </button>

        </form>


        <!-- Initial Admin Information -->
        <div class="login-note">

            <span>Initial Admin</span>

            <div>
                Email: admin@example.com
            </div>

            <div>
                Password: ChangeMe@123
            </div>

        </div>

    </div>

</div>


<!-- Password Show / Hide -->
<script>

const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');

const eyeOpen = document.getElementById('eyeOpen');
const eyeClosed = document.getElementById('eyeClosed');


togglePassword.addEventListener('click', function () {

    if (password.type === 'password') {

        password.type = 'text';

        eyeOpen.classList.add('hidden');
        eyeClosed.classList.remove('hidden');

        togglePassword.setAttribute(
            'aria-label',
            'Hide password'
        );

    } else {

        password.type = 'password';

        eyeClosed.classList.add('hidden');
        eyeOpen.classList.remove('hidden');

        togglePassword.setAttribute(
            'aria-label',
            'Show password'
        );
    }

});

</script>

</body>
</html>