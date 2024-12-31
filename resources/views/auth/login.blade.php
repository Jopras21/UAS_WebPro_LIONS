<x-guest-layout>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Font Family */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #030D16;
            color: #E4E4E3;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .login-box {
            background-color: #1E1A1F;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #E4E4E3;
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #E4E4E3;
            margin-bottom: 8px;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #293F71;
            border-radius: 4px;
            background-color: #030D16;
            color: #E4E4E3;
        }

        .input-field:focus {
            border-color: #3C5097;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #293F71;
            color: #E4E4E3;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #3C5097;
        }

        .footer {
            text-align: center;
            margin-top: 15px;
        }

        .footer a {
            color: #3C5097;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .captcha {
            text-align: center;
            margin-top: 20px;
        }

        .btn-refresh {
            margin-top: 10px;
            background-color: #3C5097;
            color: #E4E4E3;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-refresh:hover {
            background-color: #293F71;
        }

        .text-danger {
            color: #FF0000;
        }
    </style>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="input-group">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="input-field block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="input-group mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="input-field block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="mb-3 mt-4">
                    <label for="captcha">Captcha</label>
                    <div class="captcha">
                        <span>{!! captcha_img() !!}</span>
                        <button type="button" class="btn-refresh">Refresh</button>
                    </div>
                    <input id="captcha" type="text" class="input-field" name="captcha">
                    @error('captcha')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <x-primary-button class="btn">
                    {{ __('Log in') }}
                </x-primary-button>

                <div class="footer mt-4">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="mt-4 text-center">
                    <a href="{{ route('register') }}">
                        {{ __('Not registered?') }}
                    </a>
                </div>

                <script>
                    document.querySelector('.btn-refresh').addEventListener('click', function() {
                        fetch('/refresh-captcha')
                            .then(response => response.text())
                            .then(data => {
                                document.querySelector('.captcha span').innerHTML = data;
                            });
                    });
                </script>
            </form>
        </div>
    </div>
</x-guest-layout>