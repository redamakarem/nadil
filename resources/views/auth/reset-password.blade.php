{{-- <x-guest-layout> --}}
{{--    <x-auth-card> --}}
{{--        <x-slot name="logo"> --}}
{{--            <a href="/"> --}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
{{--            </a> --}}
{{--        </x-slot> --}}

{{--        <!-- Validation Errors --> --}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

{{--        <form method="POST" action="{{ route('password.update') }}"> --}}
{{--            @csrf --}}

{{--            <!-- Password Reset Token --> --}}
{{--            <input type="hidden" name="token" value="{{ $request->route('token') }}"> --}}

{{--            <!-- Email Address --> --}}
{{--            <div> --}}
{{--                <x-label for="email" :value="__('Email')" /> --}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus /> --}}
{{--            </div> --}}

{{--            <!-- Password --> --}}
{{--            <div class="mt-4"> --}}
{{--                <x-label for="password" :value="__('Password')" /> --}}

{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required /> --}}
{{--            </div> --}}

{{--            <!-- Confirm Password --> --}}
{{--            <div class="mt-4"> --}}
{{--                <x-label for="password_confirmation" :value="__('Confirm Password')" /> --}}

{{--                <x-input id="password_confirmation" class="block mt-1 w-full" --}}
{{--                                    type="password" --}}
{{--                                    name="password_confirmation" required /> --}}
{{--            </div> --}}

{{--            <div class="flex items-center justify-end mt-4"> --}}
{{--                <x-button> --}}
{{--                    {{ __('Reset Password') }} --}}
{{--                </x-button> --}}
{{--            </div> --}}
{{--        </form> --}}
{{--    </x-auth-card> --}}
{{-- </x-guest-layout> --}}


@extends('layouts.site-tw')
@section('content')
    <div class="flex lg:px-16">
        <div class="flex-1 flex-col items-center ">
            <div class="flex flex-col w-full rounded-lg p-4 lg:rounded-[64px] border-2 bg-[#EFEFEF] lg:my-12 lg:px-16 lg:py-12 lg:space-y-8">

                <form id="login-form" class="" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <div class="w-full">
                        <h2 class="ltr:font-lato rtl:font-ahlan text-center font-bold uppercase text-lg ltr:tracking-[4px] rtl:tracking-normal">{{__('nadil.auth.reset_password')}}</h2>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="flex items-center w-full font-lato placeholder:rtl:font-ahlan placeholder:rtl:tracking-normal placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-4 rounded-[19px]" placeholder="{{__('nadil.auth.email')}}" name="email"
                            id="exampleInputEmail1">
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" class="flex items-center w-full font-lato placeholder:rtl:font-ahlan placeholder:rtl:tracking-normal placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-4 rounded-[19px]" placeholder="{{__('nadil.auth.password')}}" name="password">
                        @error('password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" class="flex items-center w-full font-lato placeholder:rtl:font-ahlan placeholder:rtl:tracking-normal placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-4 rounded-[19px]" placeholder="{{__('nadil.auth.confirm_password')}}"
                            name="password_confirmation">
                        @error('password_confirmation')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="flex w-full justify-center">
                        <button type="submit"
                                class="font-lato rtl:font-ahlan rtl:tracking-normal uppercase px-12 py-4 bg-white shadow-md rounded-[12px] tracking-[4px] font-bold">{{__('nadil.general.submit')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
