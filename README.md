# Laravel - Tailwind Css
- Beautiful login & registration form desinged by tailwind css in laravel. <br>

## Login
![login](https://user-images.githubusercontent.com/33843231/80870310-70f97a80-8cc7-11ea-85c3-0db74df6c5d2.png)
## Register
![register](https://user-images.githubusercontent.com/33843231/80870311-722aa780-8cc7-11ea-94c1-9a0993e51965.png)

## Install Tailwind
- npm install tailwindcss <br>
### app.scss
```tailwind
@tailwind base;

@tailwind components;

@tailwind utilities;
```
- npx tailwindcss init <br>

### tailwind.config.js
```js
module.exports = {
  theme: {
    extend: {
      width: {
        '96' : '24rem'
      }
    },
  },
  variants: {},
  plugins: [],
}

```
### webpack.mix.js
```js
const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
        .options({
            processCssUrls: false,
            postCss: [
                tailwindcss('./tailwind.config.js')
            ],
        });
```

### layouts/app.blade.php
```php
<body>
    <div id="app">
        <main class="h-screen">
            @yield('content')
        </main>
    </div>
</body>
```

### auth/login.blade.php
```php
@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-6">
        <img src="/login-form.png" alt="">

        <h1 class="text-white text-3xl pt-8">Welcome Back</h1>
        <h2 class="text-blue-300">Enter your credentials below</h2>

        <form method="POST" action="{{ route('login') }}" class="pt-8">
            @csrf

            <div class="relative">
                <label for="email" class="text-blue-500 uppercase text-xs font-bold absolute pl-3 pt-2">E-mail</label>

                <div>
                    <input id="email" type="email" class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                           placeholder="your@email.com" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                    @error('email')
                        <span class="text-red-600 text-sm pt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password" class="text-blue-500 uppercase text-xs font-bold absolute pl-3 pt-2">Password</label>

                <div>
                    <input id="password" type="password" class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                           placeholder="Your Password" name="password" autocomplete="current-password">

                    @error('password')
                        <span class="text-red-600 text-sm pt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="pt-2">
                <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="text-white" for="remember">Remember Me</label>
            </div>

            <div class="pt-8">
                <button type="submit"
                        class="w-full bg-gray-400 px-3 py-2 text-left uppercase rounded font-bold text-blue-800">
                    Login
                </button>
            </div>

            <div class="flex justify-between pt-8 text-white text-sm font-bold">
                <a class="" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>

                <a class="" href="{{ route('register') }}">
                    Register
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

```

## Resgister

### auth/register.blade.php

```php
@extends('layouts.app')

@section('content')
<div class="bg-gray-300 mx-auto h-full flex justify-center items-center">
    <div class="w-96 rounded-lg shadow-xl bg-blue-900 p-6">
        <img src="/logo.png" alt="">

        <h1 class="text-white text-3xl pt-6">Register</h1>
        <h2 class="text-blue-300">Enter your credentials below</h2>

        <form method="POST" action="{{ route('register') }}" class="pt-8">
            @csrf

            <div class="relative">
                <label for="name" class="absolute pl-3 pt-2 uppercase text-blue-500 font-bold text-xs">Name</label>

                <div class="">
                    <input id="name" type="text" class="bg-blue-800 text-gray-100 pt-8 w-full rounded p-3 outline-none focus:bg-blue-700"
                           name="name" value="{{ old('name') }}" placeholder="Your name" autocomplete="name" autofocus>

                    @error('name')
                        <span class="text-red-600 text-sm pt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="email" class="absolute pl-3 pt-2 uppercase text-blue-500 font-bold text-xs">Email</label>

                <div class="">
                    <input id="email" type="email" class="bg-blue-800 text-gray-100 pt-8 w-full rounded p-3 outline-none focus:bg-blue-700"
                           name="email" value="{{ old('email') }}" placeholder="your@email.com" autocomplete="email">

                    @error('email')
                        <span class="text-red-600 text-sm pt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password" class="absolute pl-3 pt-2 uppercase text-blue-500 font-bold text-xs">Password</label>

                <div class="">
                    <input id="password" type="password" class="bg-blue-800 text-gray-100 pt-8 w-full rounded p-3 outline-none focus:bg-blue-700"
                           name="password" placeholder="Password" autocomplete="new-password">

                    @error('password')
                        <span class="text-red-600 text-sm pt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password-confirm" class="absolute pl-3 pt-2 uppercase text-blue-500 font-bold text-xs">Confirm Password</label>

                <div class="">
                    <input id="password-confirm" type="password" class="bg-blue-800 text-gray-100 pt-8 w-full rounded p-3 outline-none focus:bg-blue-700"
                           name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                </div>
            </div>

            <div class="pt-8">
                <button type="submit" class="w-full bg-gray-400 px-3 py-2 text-left uppercase rounded font-bold text-blue-800">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

```
![register_error](https://user-images.githubusercontent.com/33843231/80870308-6f2fb700-8cc7-11ea-8e25-04a0a612213c.png)

