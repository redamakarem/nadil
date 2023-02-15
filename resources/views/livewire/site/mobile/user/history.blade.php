<div class="container">
    <div class="w-full flex items-center flex-col space-y-8 my-8 px-6">
        @foreach ($bookings as $booking )
        <div class="shadow-md bg-red rounded-md py-8 mx-6 w-full mt-8 cursor-pointer" style="background-image:url('{{$booking->restaurant->getFirstMediaUrl('restaurant_bgs')}}'); background-size: cover">
           <div class="text-3xl text-white text-center"> {{ $booking->restaurant->{'name_'.app()->getLocale()} }}</div>
           <div class="text-white text-center"> {{ $booking->booking_date }}</div>
           <div class="text-white text-center"> {{ $booking->booking_status->{'name_'.app()->getLocale()}  }}</div>
           @if ($booking->booking_date > \Carbon\Carbon::now() && $booking->booking_status_id==1)
           <div class="flex justify-center">
            <a class="bg-nadilBtn-100 px-8 py-2 rounded-lg font-lato uppercase" href="#" wire:click.prevent="confirmBookingDeletion({{$booking->id}})" class="text-black" >{{__('nadil.booking.cancel_booking')}}</a>
           </div>
           
           @endif
        
        </div>
        @endforeach
    </div>

    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('show-swal-delete',evt => {
            Swal.fire({
                title: "{{__('nadil.general.swal_title')}}",
                text: "{{__('nadil.general.swal_text')}}",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: "{{__('nadil.general.swal_cancel_text')}}",
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{__('nadil.general.swal_confirm_text')}}",
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('bookingDeleteConfirmed')
                }
            })
        })
    </script>
@endpush