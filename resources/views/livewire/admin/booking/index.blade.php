<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Booking</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" >
                        <a href="{{route('admin.bookings.create')}}" class="btn btn-primary">Add</a>


                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Restaurant</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Seats</th>
                        <th>Phone</th>
                        <th>Tables</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>{{$booking->restaurant->name}}</td>
                            <td>{{$booking->booking_date}}</td>
                            <td>{{$booking->booking_time}}</td>
                            <td>{{$booking->seats}}</td>
                            <td>{{$booking->phone}}</td>
                            <td>

{{--                                @foreach($booking->reserved_tables as $table)--}}
{{--                                    <div>{{$table->name ,}}</div>--}}
{{--                                @endforeach--}}
                                {{ $booking->reserved_tables->pluck('name')->implode(', ') }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Action</button>
                                    <button type="button" id="dropdownSubMenu1" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div aria-labelledby="dropdownSubMenu1" class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#">View</a>
                                        <a class="dropdown-item" href="{{route('admin.cuisines.edit',['id' => $booking->id])}}">Edit</a>
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
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
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
                    Livewire.emit('deleteConfirmed')
                }
            })
        })
    </script>
@endpush
