<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add Area</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form wire:submit.prevent="submit">
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
                <label for="name_en">Area English Name</label>
                <input wire:model="area.name_en"
                       type="text" class="form-control" id="name_en" placeholder="Enter area name">
                @error('area.name_en')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="name_ar">Area Arabic Name</label>
                <input wire:model="area.name_ar"
                       type="text" class="form-control" id="name_ar" placeholder="Enter area arabic name">
                @error('area.name_ar')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="governate">{{__('Governate')}}</label>
                <select name="governate" id="governate" wire:model='selected_governate' class="form-control">
                    <option value="">{{__('Select Governate')}}</option>
                    @foreach ($governates as $governate )
                    <option value="{{$governate->id}}">{{$governate->name_en}}</option>
                    @endforeach
                </select>
                @error('selected_governate')<p class="error">{{$message}}</p>@enderror
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
