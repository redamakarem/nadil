
<div class="w-full">
    <x-loading-indicator-2 />
    <div class="flex flex-col items-center w-full ">
        @if($errors->any())
            <div id="validation-errors" class="bg-red-600 px-8 py-12 text-white font-lato uppercase text-md tracking-[6px] rounded-[19px]">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
            </div>
        @endif
    
        <div class="flex font-lato uppercase text-md ">Pick your day and time</div>
        <div class="flex w-full justify-between space-x-8">
            <div class="w-1/2">
                <div class="uppercase text-center mt-12 mb-4 px-16 py-6 bg-nadilBtn-100 tracking-[6px] rounded-[19px]">{{$display_date}}</div>
                <div wire:ignore class="flex justify-center">
                    <div id="booking-date" ></div>
                </div>
            </div>
            <div class="w-1/2 ">
                <div class="uppercase text-center mt-12 mb-4 px-16 py-6 bg-nadilBtn-100 tracking-[6px] rounded-[19px]">{{$selected_time ?? 'Select Time'}}</div>
                <div class="max-h-[296px] overflow-y-scroll scrollbar scrollbar-thumb-gray-600 scrollbar-track-gray-100 px-8">
                    @if($slots)
                        @foreach(array_chunk($slots,2,true) as $chunk)
    
    
                            <div class="flex justify-between">
                                @foreach($chunk as $key => $timeSlot)
                                    <div role="group">
                                        <button type="button" wire:click="setSelectedTime('{{$timeSlot}}')" {{$this->slot_bookable($timeSlot)?'':'disabled'}} class="mb-4 inline-block px-8 py-6 bg-nadilBtn-100 tracking-[6px] rounded-[19px] disabled:text-gray-400 hover:bg-grey-500 focus:bg-black focus:text-white focus:outline-none focus:ring-0 active:bg-black active:text-white transition duration-150 ease-in-out">{{$timeSlot}}</button>
                                    </div>
                                @endforeach
                            </div>
    
                        @endforeach
                    @else
                        <div class="flex flex-col justify-center h-44">
                            <div class="w-full text-center">No reservable slots on the selected date</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="flex my-8 flex-col">
            <div class="font-lato uppercase text-md text-center">How many seats?</div>
            {{-- <div class="font-lato uppercase text-md text-center">{{$restaurant->max_party_size}}</div> --}}
        </div>
        <div class="flex w-full">
            <div class="w-1/2 flex flex-col items-center">
                {{-- <input type="number" step="1" min="0" max="{{$restaurant->max_party_size}}" wire:model.defer="seats"> --}}
                <select wire:model.defer="seats">
                    <option value="">{{__('Select number of guests')}}</option>
                    @for ($i = 1; $i <= $restaurant->max_party_size; $i++)
                        <option value="{{$i}}">{{$i}} guests</option>
                    @endfor
                </select>
            </div>
            <div class="w-1/2 flex flex-col items-center">
                <button {{!$booking_enabled?'disabled':''}} type="button" wire:click="submit" class="mb-4 inline-block px-8 py-6 bg-nadilBtn-100 tracking-[6px] rounded-[19px] hover:bg-grey-500 focus:bg-black focus:text-white focus:outline-none focus:ring-0 active:bg-black active:text-white transition duration-150 ease-in-out">Book Now</button>
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


<script>
    var booking_date = flatpickr("#booking-date", {
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
