
<div class="w-full">
    <div wire:loading>
        <div class="h-screen w-screen flex justify-center items-center fixed bg-gray-500 bg-opacity-25 top-0 left-0">
            <img src="{{asset('/images/nadil-loader.png')}}" alt="" class="w-24 h-24">
        </div>
    </div>
    <div class="flex flex-col items-center w-full ">
        @if($errors->any())
            <div id="validation-errors" class="bg-red-600 px-8 py-12 text-white font-lato uppercase text-md tracking-[6px] rounded-[19px]">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
            </div>
        @endif

        @if (!$this->isProfileComplete())
            <div class="bg-green-600 px-8 py-12 text-white font-lato uppercase text-md tracking-[6px] rounded-[19px]"">
                Please update your profile before booking. <a href="{{route('user.profile.show')}}">Update</a>
            </div>
        @endif
            
        <div class="flex font-lato rtl:font-ahlan uppercase text-md ">{{__('nadil.booking.select_date_time')}}</div>
        <div class="flex w-full justify-between space-x-8">
            <div class="w-1/2">
                <div class="uppercase text-center mt-12 mb-4 px-16 py-6 bg-nadilBtn-100 tracking-[6px] rounded-[19px]">{{$display_date}}</div>
                <div wire:ignore class="flex justify-center">
                    <div id="booking-date" ></div>
                </div>
            </div>
            <div class="w-1/2 ">
                <div class="uppercase text-center mt-12 mb-4 px-16 py-6 bg-nadilBtn-100 tracking-[6px] rtl:tracking-normal rounded-[19px]">{{$selected_time ?? __('nadil.booking.select_time')}}</div>
                <div class="max-h-[296px] overflow-y-scroll scrollbar scrollbar-thumb-gray-600 scrollbar-track-gray-100 px-8">
                    @if($slots)
                        @foreach(array_chunk($slots,2,true) as $chunk)
    
    
                            <div class="flex justify-between">
                                @foreach($chunk as $key => $timeSlot)
                                    <div role="group">
                                        <button type="button" wire:click="setSelectedTime('{{$timeSlot}}')" {{$this->slot_bookable($timeSlot)?'':'disabled'}} class="mb-4 inline-block px-8 py-6 bg-nadilBtn-100 tracking-[6px] rounded-[19px] disabled:text-gray-400 hover:bg-grey-500 focus:bg-black focus:text-white focus:outline-none focus:ring-0 active:bg-black active:text-white transition duration-150 ease-in-out">{{\Carbon\Carbon::parse($timeSlot)->translatedFormat("h:i A")}}</button>
                                    </div>
                                @endforeach
                            </div>
    
                        @endforeach
                    @else
                        <div class="flex flex-col justify-center h-44">
                            <div class="w-full text-center">{{__('nadil.booking.no_available_slots')}}</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="flex my-8 flex-col">
            <div class="font-lato rtl:font-ahlan uppercase text-md text-center">{{__('nadil.booking.how_many_seats')}}</div>
            {{-- <div class="font-lato uppercase text-md text-center">{{$restaurant->max_party_size}}</div> --}}
        </div>
        <div class="flex w-full">
            <div class="w-1/2 flex flex-col items-center">
                {{-- <input type="number" step="1" min="0" max="{{$restaurant->max_party_size}}" wire:model.defer="seats"> --}}
                <p>{{__('nadil.messages.booking_party_size',['max' => $restaurant->max_party_size])}}</p>
                <select wire:model.defer="seats">
                    <option value="">{{__('nadil.booking.num_guest')}}</option>
                    @for ($i = 1; $i <= $restaurant->max_party_size; $i++)
                        <option value="{{$i}}">{{$i}} {{trans_choice('nadil.booking.guest',$i)}}</option>
                    @endfor
                </select>
                
            </div>
            
            <div class="w-1/2 flex flex-col items-center">
                <button {{!$this->isProfileComplete() ?'disabled':''}} type="button" wire:click="submit" class="mb-4 inline-block px-8 py-6 rtl:font-ahlan rtl:tracking-normal bg-nadilBtn-100 tracking-[6px] rounded-[19px] hover:bg-grey-500 focus:bg-black focus:text-white focus:outline-none focus:ring-0 active:bg-black active:text-white disabled:text-gray-300 transition duration-150 ease-in-out">{{__('nadil.booking.book_now')}}</button>
            </div>
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
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ar.js"></script>


<script>
    var booking_date = flatpickr("#booking-date", {
        "locale": "{{app()->getLocale()}}",
        inline: true,
        dateFormat: 'y-m-d',
        minDate:'today'
    });
    booking_date.config.onChange.push(function(selectedDates,dateStr,instance) {
        console.log(dateStr);
    @this.selected_date = dateStr;
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
