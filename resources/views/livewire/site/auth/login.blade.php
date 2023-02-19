<div>
    
        <div class="rounded-[64px] border-2 bg-[#EFEFEF] my-12 px-16 py-12">
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
            <form wire:submit.prevent="login" class="space-y-8">
                <div class="w-full">
                    <h2 class="ltr:font-lato rtl:font-ahlan text-center font-bold uppercase text-lg ltr:tracking-[4px] rtl:tracking-normal">Login</h2>
                </div>
                <div class="w-full">
                    <input type="text" placeholder="{{__('nadil.auth.email')}}" wire:model="email"
                           class="flex items-center w-full ltr:font-lato rtl:font-ahlan ltr:placeholder:font-bold rtl:placeholder:font-normal text-[19px] ltr:tracking-[4px] rtl:tracking-normal uppercase border-[#707070] border-2 p-4 rounded-[19px]">
                </div>
                <div class="w-full">
                    <div class="border-[#707070] border-2 p-4 rounded-[19px]">
                        <input type={{$showPassword?"text":"password"}} placeholder="{{__('nadil.auth.password')}}" wire:model="password"
                           class="flex items-center w-full ltr:font-lato rtl:font-ahlan ltr:placeholder:font-bold text-[19px] rtl:placeholder:font-normal ltr:tracking-[4px] rtl:tracking-normal uppercase rounded-[19px]">
                           <button type="button" wire:click="togglePasswordVisibility"><i class="fa fa-{{ $showPassword?"eye":"eye-slash" }}"></i></button>
                    </div>
                </div>
                {{-- <div class="w-full flex justify-between">
                    <a href="{{route('password.request')}}">{{__('Forgot Password')}}</a>
                    <a href="{{route('site.user-register')}}">{{__('Register')}}</a>
                </div> --}}
                <div class="flex justify-center space-x-8">
                    <a href="{{route('site.auth.google')}}"><i class="fa-brands fa-google text-3xl"></i></a>
                    <a href="{{route('site.auth.facebook')}}"><i class="fa-brands fa-facebook text-3xl"></i></a>
                </div>
                <div class="flex w-full justify-end">
                    <button  type="submit"
                            class="ltr:font-lato rtl:font-ahlan uppercase px-12 py-4 bg-white shadow-md rounded-[12px] ltr:tracking-[4px] rtl:tracking-normal ltr:font-bold rtl:font-normal">{{__('nadil.auth.login')}}
                    </button>
                </div>
            </form>
        </div>
    
</div>
