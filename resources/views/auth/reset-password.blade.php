{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('password.update') }}">--}}
{{--            @csrf--}}

{{--            <!-- Password Reset Token -->--}}
{{--            <input type="hidden" name="token" value="{{ $request->route('token') }}">--}}

{{--            <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />--}}
{{--            </div>--}}

{{--            <!-- Confirm Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--                <x-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                                    type="password"--}}
{{--                                    name="password_confirmation" required />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Reset Password') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}


@extends('layouts.site-tw')
@section('content')
    <div class="container page-login">
        <div class="v-middle">
            <div class="card col-md-4 mx-auto align-middle">

                <form id="login-form" class="d-flex flex-column" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="email" class="form-control shadow-sm" placeholder="E-mail" name="email"
                               id="exampleInputEmail1">
                        @error('email')<span class="error">{{$message}}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control shadow-sm" placeholder="Password" name="password"
                               >
                        @error('password')<span class="error">{{$message}}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control shadow-sm" placeholder="Confirm" name="password_confirmation"
                               >
                        @error('password_confirmation')<span class="error">{{$message}}</span>@enderror
                    </div>
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <button type="submit" class="btn btn-primary btn-nadil shadow-sm d-flex align-self-end">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
