{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Session Status -->--}}
{{--        <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('login') }}">--}}
{{--            @csrf--}}

{{--            <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password"--}}
{{--                                required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <!-- Remember Me -->--}}
{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="inline-flex items-center">--}}
{{--                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-button class="ml-3">--}}
{{--                    {{ __('Log in') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}

@extends('layouts.site-tw')
@section('content')
{{--    <div class="container page-login">--}}
{{--        <div class="v-middle">--}}
{{--            <div class="card col-md-4 mx-auto align-middle">--}}

{{--                <form id="login-form" class="d-flex flex-column" action="{{route('login')}}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <div class="mb-3">--}}
{{--                        <input type="email" class="form-control shadow-sm" placeholder="E-mail" name="email"--}}
{{--                               id="exampleInputEmail1">--}}
{{--                        @error('email')<span class="error">{{$message}}</span>@enderror--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <input type="password" class="form-control shadow-sm" name="password" placeholder="password"--}}
{{--                               id="exampleInputPassword1">--}}
{{--                        @error('password')<span class="error">{{$message}}</span>@enderror--}}
{{--                    </div>--}}

{{--                    <button type="submit" class="btn btn-primary btn-nadil shadow-sm d-flex align-self-end">Submit</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="flex flex-col w-full h-full justify-center">
        <div class="w-1/3 rounded-[64px] border-2 bg-[#EFEFEF] my-12 px-16 py-12 mx-auto ">
            <form action="{{route('login')}}" method="POST" class="space-y-8">
                @csrf
                <div class="w-full">
                    <input type="text" placeholder="Email" name="email"
                           class="flex items-center w-full font-lato placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-4 rounded-[19px]">
                </div>
                <div class="w-full">
                    <input type="password" placeholder="Password" name="password"
                           class="flex items-center w-full font-lato placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-4 rounded-[19px]">
                </div>
                <div class="flex w-full justify-end">
                    <button type="submit"
                            class="font-lato uppercase px-12 py-4 bg-white shadow-md rounded-[12px] tracking-[4px] font-bold">Login
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
