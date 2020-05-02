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
