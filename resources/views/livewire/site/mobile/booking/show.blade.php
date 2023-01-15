<div id="booking-container"
class="flex flex-col px-4 pt-8">
@if($errors->any())
<div id="validation-errors" class="bg-red-600 mb-4 px-8 py-12 text-white font-lato uppercase text-md rounded-[19px]">
@foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
@endforeach
</div>
@endif
    <div class="uppercase text-center tracking-[4px] underline underline-offset-[10px] mb-3">{{ $restaurant->name_en}}</div>
    <div class="uppercase text-center tracking-[4px]">{{ $restaurant->address}}</div>
    <div class="uppercase text-center tracking-[4px]">Curated to unlock new culinary moments</div>
    <div class="uppercase text-center mt-12 mb-4 px-8 py-6 bg-nadilBtn-100 tracking-[4px] rounded-[19px]">Pick your day and time</div>
    <div wire:ignore class="flex justify-center">
        <div id="booking-date" ></div>
    </div>

    <div class="uppercase text-center mt-12 mb-4 px-16 py-6 bg-nadilBtn-100 tracking-[4px] rounded-[19px]">{{$selected_time ?? 'Select Time'}}</div>
    <div class="overflow-y-scroll scrollbar scrollbar-thumb-gray-600 scrollbar-track-gray-100 px-8">
        @if($slots)
            @foreach(array_chunk($slots,2,true) as $chunk)


                <div class="flex justify-between">
                    @foreach($chunk as $key => $timeSlot)
                        <div role="group">
                            <button type="button" wire:click="setSelectedTime('{{$timeSlot}}')" {{$this->slot_bookable($timeSlot)?'':'disabled'}} class="mb-4 inline-block px-4 py-2 bg-nadilBtn-100 tracking-[4px] rounded-lg disabled:text-gray-400 hover:bg-grey-500 focus:bg-black focus:text-white focus:outline-none focus:ring-0 active:bg-black active:text-white transition duration-150 ease-in-out">{{$timeSlot}}</button>
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
    <div class="uppercase text-center mt-12 mb-4 px-16 py-6 bg-nadilBtn-100 tracking-[6px] rounded-[19px]">{{__('How many seats')}}</div>
    <div class="my-4 flex justify-center">
        <input
            class="rounded-[64px] bg-[#E0E0E0] outline-none border-none placeholder:text-center placeholder:font-lato placeholder:uppercase text-center w-full h-12"
            type="number" step="1" min="0" max="{{$restaurant->max_party_size}}" wire:model="seats" placeholder="{{ __('# of people') }}">
    </div>
    <div class="flex justify-center mb-6">
        <button 
        class="uppercase font-lato font-bold bg-[#F8F8F8] shadow-md rounded-lg py-4 w-2/3" 
        wire:click="submit" type="button">{{ __('Book Now') }}</button>
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
@endpush
