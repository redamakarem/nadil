<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add Cuisine</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form wire:submit.prevent="submit">
        <div class="card-body">
            <div class="form-group">
                <label for="name_en">Cuisine Name</label>
                <select class="form-control" wire:model='selected_restaurant'>
                    <option value="">{{__('Select Restaurant')}}</option>
                    @foreach ($restaurants as $restaurant)
                        <option value="{{$restaurant->id}}">{{$restaurant->name_en}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                
                <x-media-library-attachment name="cuisine_image"/>
            </div>
        </div>



<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
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

            toastr.options.onHidden = function () {
                Livewire.emit('cuisineAdded');
            }
        });


    </script>
@endpush
