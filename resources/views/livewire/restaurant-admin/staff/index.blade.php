@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('Staff') }}</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <a href="{{ route('restaurant-admin.restaurant.staff.create',$restaurant->id) }}" class="btn btn-primary">Add</a>


                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles->pluck('name') as $role)
                                        <span class="badge bg-dark">{{ $role }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default">Action</button>
                                        <button type="button" id="dropdownSubMenu1"
                                            class="btn btn-default dropdown-toggle dropdown-icon"
                                            data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div aria-labelledby="dropdownSubMenu1" class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#">View</a>
                                            <a class="dropdown-item"
                                                href="{{ route('restaurant-admin.restaurant.staff.edit', [$restaurant,$user->id]) }}">Edit</a>
                                            <a class="dropdown-item" href="#"
                                                wire:click.prevent="confirmRestaurantDeletion({{ $user->id }})">Delete</a>
                                            
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
        window.addEventListener('show-swal-delete', evt => {
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
    <script>
        window.addEventListener('test', evt => {
            console.log(evt);
            // toastr.success(evt.detail.info,'Success');
        });
    </script>
@endpush
