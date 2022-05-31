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
                <input wire:model="name_en"
                       type="text" class="form-control" id="name_en" placeholder="Enter cuisine name">
                @error('name_en')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="name_ar">Cuisine Arabic Name</label>
                <input wire:model="name_ar"
                       type="text" class="form-control" id="name_ar" placeholder="Enter cuisine arabic name">
                @error('name_ar')<span class="error">{{ $message }}</span>@enderror
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
