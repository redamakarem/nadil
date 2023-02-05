@extends('layouts.site-mobile',['restaurant' => null])
@section('content')
    <div class="flex flex-col w-full h-full justify-center py-4 px-8">
        <div class="w-full rounded-lg border-2 bg-[#EFEFEF] px-4">
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
                <div class="justify-center lg:flex w-full justify-end">
                    <button type="submit"
                            class="ltr:font-lato rtl:font-ahlan uppercase px-12 py-4 bg-white shadow-md rounded-[12px] ltr:tracking-[4px] rtl:tracking-normal ltr:font-bold rtl:font-normal">{{__('nadil.auth.login')}}
                    </button>
                </div>
            </form>
            <div class="flex justify-center space-x-8 pb-4">
                <a href="{{route('site.auth.google')}}"><i class="fa-brands fa-google text-3xl"></i></a>
                <a href="{{route('site.auth.facebook')}}"><i class="fa-brands fa-facebook text-3xl"></i></a>
            </div>
        </div>
    </div>

@endsection
