<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
        <tr>
            <th>Name</th>
            <th>Time</th>
            <th>Party Size</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @forelse($bookings as $booking)
            <tr>
                <td>{{$booking->user->name??'testing'}}</td>
                <td>{{$booking->booking_time}}</td>
                <td>{{$booking->seats}}</td>
                <td>
                    <select class="form-control" wire:change='updateBookingStatus({{$booking}},$event.target.value)'>
                        <option value="">Select Status</option>
                        @foreach ($bookingStatuses as $bookingStatus)
                        <option value="{{ $bookingStatus->id }}" {{$booking->booking_status_id == $bookingStatus->id ? 'selected':''}}>{{$bookingStatus->name_en}}</option>
                        @endforeach
                        
                    </select>
                </td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" id="dropdownSubMenu1" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div aria-labelledby="dropdownSubMenu1" class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#">View</a>
                            <a class="dropdown-item" href="{{route('admin.bookings.edit', $booking)}}">Edit</a>
                            <a class="dropdown-item" href="#"
                               wire:click.prevent="confirmCuisineDeletion({{$booking->id}})">Delete</a>
                        </div>
                    </div>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="6">No results found</td>
            </tr>
        @endforelse

        </tbody>
    </table>
</div>