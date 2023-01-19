<div class="container">
    <div class="w-full flex items-center flex-col space-y-8 my-8 px-6">
        @foreach ($bookings as $booking )
        <div class="shadow-md bg-red rounded-md py-8 mx-6 w-full mt-8 cursor-pointer" style="background-image:url('{{$booking->restaurant->getFirstMediaUrl('restaurant_bgs')}}'); background-size: cover">
           <div class="text-3xl text-black text-center"> {{ $booking->restaurant->{'name_'.app()->getLocale()} }}</div>
           <div class="text-black text-center"> {{ $booking->booking_date }}</div>
           <div class="text-black text-center"> {{ $booking->booking_status->{'name_'.app()->getLocale()}  }}</div>
           @if ($booking->booking_date > \Carbon\Carbon::now() && $booking->booking_status_id==1)
           <a href="#" wire:click.prevent="confirmBookingDeletion({{$booking->id}})" class="text-black" >{{__('Cancel Booking')}}</a>
           
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
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('bookingDeleteConfirmed')
                }
            })
        })
    </script>
@endpush