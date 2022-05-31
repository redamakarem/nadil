<div>
    
    @forelse ($inputs as $key => $value )
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add table for restaurant {{$restaurant->name}} (ID: {{$restaurant->id}})</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
    
            <div class="card-body">
                <div class="form-group">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <p><strong>Opps Something went wrong</strong></p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
    
                <div class="form-group">
                    <label for="name">Table Name</label>
                    <input wire:model="inputs.{{$key}}.name"
                        type="text" class="form-control" placeholder="Enter table name">
                </div>
                <div class="form-group">
                    <label for="end_time">Table Capacity</label>
                    <input wire:model="inputs.{{$key}}.capacity"
                        type="text" class="form-control"  placeholder="Enter the capacity for table">
                </div>
    
            </div>
    
    
    
            <!-- /.card-body -->
    
            <div class="card-footer">
                <button type="button" wire:click='add()' class="btn btn-primary">Add</button>
            </div>
    </div>
    @empty
        <p>No tables defined yet</p>
        <br>
        
    @endforelse
    <div class="row">
        <button type="button" wire:click='save' class="btn btn-primary">Save</button>
    </div>
</div>

@push('scripts')
    <script>
        jQuery(document).ready(function () {
            window.addEventListener('alert', ({detail: {type, message}}) => {
                if (type === 'success') {
                    toastr.success(message);
                } else {
                    toastr.error(message);
                }
            });

            // toastr.options.onHidden = function () {
            //     Livewire.emit('cuisineAdded');
            // }
        });


    </script>
@endpush
