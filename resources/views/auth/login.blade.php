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
            <form action="{{route('login')}}" method="POST" class="space-y-8">
                @csrf
                <div class="w-full">
                    <input type="text" placeholder="{{__('nadil.auth.email')}}" name="email"
                           class="flex items-center w-full ltr:font-lato rtl:font-ahlan ltr:placeholder:font-bold rtl:placeholder:font-normal text-[19px] ltr:tracking-[4px] rtl:tracking-normal uppercase border-[#707070] border-2 p-4 rounded-[19px]">
                </div>
                <div class="w-full">
                    <input type="password" placeholder="{{__('nadil.auth.password')}}" name="password"
                           class="flex items-center w-full ltr:font-lato rtl:font-ahlan ltr:placeholder:font-bold text-[19px] rtl:placeholder:font-normal ltr:tracking-[4px] rtl:tracking-normal uppercase border-[#707070] border-2 p-4 rounded-[19px]">
                </div>
                <div class="w-full">
                    <a href="{{route('password.request')}}">{{__('Forgot Password')}}</a>
                </div>
                <div class="flex w-full justify-end">
                    <button type="submit"
                            class="ltr:font-lato rtl:font-ahlan uppercase px-12 py-4 bg-white shadow-md rounded-[12px] ltr:tracking-[4px] rtl:tracking-normal ltr:font-bold rtl:font-normal">{{__('nadil.auth.login')}}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
