
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$restaurant->name}}</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" >
                        <a href="{{route('restaurant-admin.restaurant.tables.create',['restaurant' => $restaurant->id])}}" class="btn btn-primary">Add</a>


                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Capacity</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($restaurant->diningTables as $dining_table)
                        <tr>
                            <td>{{$dining_table->name}}</td>
                            <td>{{$dining_table->capacity}}</td>
                            
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Action</button>
                                    <button type="button" id="dropdownSubMenu1" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div aria-labelledby="dropdownSubMenu1" class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#">View</a>
                                        <a class="dropdown-item" href="{{route('restaurant-admin.restaurant.menus',['restaurant' => $restaurant->id])}}">Menus</a>
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
