{{--<div class="container">--}}
{{--    <div class="row">--}}
{{--        <div class="py-5"></div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-4">--}}
{{--            <div class="buttons-container">--}}
{{--                <div class="d-grid gap-2 col-8 mx-auto">--}}
{{--                    <a href="#" class="btn btn-primary shadow rounded-lg">Contact Us</a>--}}
{{--                    <a href="#" class="btn btn-primary shadow">Join Us</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="form-container ">--}}
{{--                <form wire:submit.prevent="submit">--}}
{{--                    <div class="mb-3 shadow input-container">--}}
{{--                        @error('user.name') <span class="danger">{{$message}}</span> @enderror--}}

{{--                        <input wire:model.lazy="user.name"--}}
{{--                               type="text" class="form-control"--}}
{{--                               placeholder="Your Name">--}}
{{--                    </div>--}}
{{--                    <div class="mb-3 shadow input-container">--}}
{{--                        @error('user.email') <span class="danger">{{$message}}</span> @enderror--}}

{{--                        <input wire:model.lazy="user.email"--}}
{{--                               type="text" class="form-control"--}}
{{--                               placeholder="Your E-mail">--}}
{{--                    </div>--}}
{{--                    <div class="mb-3 shadow input-container">--}}
{{--                        @error('user.mobile') <span class="danger">{{$message}}</span> @enderror--}}

{{--                        <input wire:model.lazy="user.mobile"--}}
{{--                               type="text" class="form-control"--}}
{{--                               placeholder="Mobile number">--}}
{{--                    </div>--}}

{{--                    <div class="mb-3 shadow input-container">--}}
{{--                        @error('password') <span class="danger">{{$message}}</span> @enderror--}}
{{--                        <input type="password" wire:model.lazy="password"--}}
{{--                               type="text" class="form-control"--}}
{{--                               placeholder="Password">--}}
{{--                    </div>--}}
{{--                    <div class="mb-3 shadow input-container">--}}
{{--                        @error('password_confirmation') <span class="danger">{{$message}}</span> @enderror--}}
{{--                        <input wire:model.lazy="password_confirmation"--}}
{{--                               type="password" class="form-control"--}}
{{--                               placeholder="Confirm Password">--}}
{{--                    </div>--}}


{{--                    <div class="d-flex justify-content-end">--}}
{{--                        <button class="btn-nadil" type="submit">Send</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="py-3"></div>--}}
{{--    </div>--}}
{{--</div>--}}


<div class="flex lg:px-16">
    {{-- <div class="w-[31%] flex flex-col justify-center px-12 space-y-8">
        <h2 class="font-din text-[20px] uppercase tracking-[6px] text-center">Contact Us</h2>
        <a href="#" class="font-lato font-bold uppercase text-md text-center tracking-[6px] p-8 font-bold shadow-md rounded-[19px] bg-[#f8f8f8] border-[#707070]">Contact Us</a>
        <a href="#" class="font-lato font-bold uppercase text-md text-center tracking-[6px] p-8 font-bold shadow-md rounded-[19px] bg-[#f8f8f8] border-[#707070]">Join Us</a>
    </div> --}}
    <div class="flex-1 flex-col items-center ">
        <div class="flex flex-col w-full rounded-lg p-4 lg:rounded-[64px] border-2 bg-[#EFEFEF] lg:my-12 lg:px-16 lg:py-12 lg:space-y-8">
            <form wire:submit.prevent="register" class="space-y-8">
                @if($errors->any())
                    <div id="validation-errors"
                         class="flex flex-col bg-red-600 px-8 py-12 text-white font-lato uppercase text-md tracking-[6px] rounded-[19px]">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                    <div>

                        @if (session()->has('success'))

                            <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3" role="alert">

                                {{__('nadil.auth.register_msg')}} <a href="{{route('login')}}">{{__('nadil.auth.register')}}</a>

                            </div>

                        @endif

                    </div>
                    <div class="w-full">
                        <h2 class="ltr:font-lato rtl:font-ahlan text-center font-bold uppercase text-lg ltr:tracking-[4px] rtl:tracking-normal">{{__('nadil.auth.register')}}</h2>
                    </div>
                <div class="w-full">
                    <input type="text" placeholder="{{__('nadil.auth.name')}}" wire:model.lazy="profile.name"
                           class="flex items-center w-full font-lato placeholder:rtl:font-ahlan placeholder:rtl:tracking-normal placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-4 rounded-[19px]">
                </div>
                {{-- <div class="w-full">
                    <div
                        class="flex items-center w-full bg-white font-lato placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-4 rounded-[19px] space-x-4">
                        <div>
                            <input type="radio" wire:model.lazy="profile.gender" id="male" value="0"/>
                            <label for="male">Male</label>
                        </div>
                        <div>
                            <input type="radio" wire:model.lazy="profile.gender" id="female" value="1"/>
                            <label for="female">Female</label>
                        </div>
                    </div>

                </div>
                <div class="w-full" wire:ignore>
                    <input id="dob" type="text" placeholder="Date of Birth" wire:model.lazy="date_of_birth"
                           class="flex items-center w-full font-lato placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-4 rounded-[19px]">
                </div> --}}
                <div class="w-full">
                    <input type="text" placeholder="{{__('nadil.auth.email')}}" wire:model.lazy="profile.email"
                           class="flex items-center w-full font-lato placeholder:rtl:font-ahlan placeholder:rtl:tracking-normal placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-4 rounded-[19px]">
                </div>

                <div class="w-full">
                    <input type="text" placeholder="Your Mobile Number" wire:model.lazy="profile.phone"
                           class="flex items-center w-full font-lato placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-4 rounded-[19px]">
                </div>
                {{-- <div class="w-full">
                    <input type="password" placeholder="Password" wire:model.lazy="password"
                           class="flex items-center w-full font-lato placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-4 rounded-[19px]">
                </div>
                <div class="w-full">
                    <input type="password" placeholder="Confirm Password" wire:model.lazy="password_confirmation"
                           class="flex items-center w-full font-lato placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-4 rounded-[19px]">
                </div> --}}
                <div class="flex w-full justify-center lg:justify-end">
                    <button type="submit"
                            class="font-lato rtl:font-ahlan rtl:tracking-normal uppercase px-12 py-4 bg-white shadow-md rounded-[12px] tracking-[4px] font-bold">{{__('nadil.auth.register')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        .flatpickr-day.selected{
            background: #0a0e14;
        }
        .flatpickr-day.selected:hover{
            background: #666666;
        }
    </style>

@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <script>
        var booking_date = flatpickr("#dob", {
            dateFormat: 'Y-m-d'
        });
        booking_date.config.onChange.push(function(selectedDates,dateStr,instance) {
            console.log(dateStr);
        @this.date_of_birth = dateStr;
        } );

    </script>

    {{--    <script>--}}
    {{--        jQuery('#inlinePicker').datepicker({--}}
    {{--            format: 'yyyy-mm-dd'--}}
    {{--        })--}}
    {{--            .on('changeDate', function(e) {--}}
    {{--             @this.selected_date = e.format();--}}

    {{--            });--}}
    {{--        jQuery('.datepicker-inline').addClass('px-3 py-4');--}}
    {{--        jQuery('#inlinePicker').datepicker('setDate',new Date());--}}
    {{--        jQuery('#inlinePicker').datepicker('update',new Date());--}}
    {{--        @this.selected_date = moment().format('YYYY-MM-DD');--}}
    {{--        console.log(moment().format('YYYY-MM-DD'))--}}

    {{--    </script>--}}

@endpush
