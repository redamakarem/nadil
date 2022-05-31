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
                    <tbody>

                        <tr>
                            <th>Restaurant</th>
                            <td>{{$booking->restaurant->name}}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{$booking->booking_date}}</td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>{{$booking->booking_time}}</td>
                        </tr>

                        <tr>
                            <th>Seats</th>
                            <td>{{$booking->seats}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$booking->phone}}</td>
                        </tr>
                        <tr>
                            <th>Tables</th>
                            <td>
                                {{ $booking->reserved_tables->pluck('name')->implode(', ') }}
                            </td>
                        </tr>
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
