{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <div class="mb-4 text-sm text-gray-600">--}}
{{--            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
{{--        </div>--}}

{{--        <!-- Session Status -->--}}
{{--        <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('password.email') }}">--}}
{{--            @csrf--}}

{{--            <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Email Password Reset Link') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}


@extends('layouts.site-tw')
@section('content')

<div class="flex flex-col w-full h-full justify-center">
    <div class="w-1/3 rounded-[64px] border-2 bg-[#EFEFEF] my-12 px-16 py-12 mx-auto ">
        <div class="form-group">
            @if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form action="{{ route('password.request') }}" method="POST" class="space-y-8">
            @csrf
            <div class="w-full">
                <input type="text" placeholder="{{__('nadil.auth.email')}}" name="email"
                       class="flex items-center w-full ltr:font-lato rtl:font-ahlan ltr:placeholder:font-bold rtl:placeholder:font-normal text-[19px] ltr:tracking-[4px] rtl:tracking-normal uppercase border-[#707070] border-2 p-4 rounded-[19px]">
            </div>
            
            
            <div class="flex w-full justify-end">
                <button type="submit"
                        class="ltr:font-lato rtl:font-ahlan uppercase px-12 py-4 bg-white shadow-md rounded-[12px] ltr:tracking-[4px] rtl:tracking-normal ltr:font-bold rtl:font-normal">{{__('nadil.auth.login')}}
                </button>
            </div>
        </form>
    </div>
</div>



    {{-- <div class="container page-login">
        <div class="v-middle">
            <div class="card col-md-4 mx-auto align-middle">
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif
                <form id="login-form" class="flex flex-col" action="{{ route('password.request') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="email" class="form-control shadow-sm" placeholder="E-mail" name="email"
                               id="exampleInputEmail1">
                        @error('email')<span class="error">{{$message}}</span>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-nadil shadow-sm d-flex align-self-end">Submit</button>
                </form>
            </div>
        </div>
    </div> --}}

@endsection

