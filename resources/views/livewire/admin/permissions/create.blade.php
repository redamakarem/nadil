<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{__('Add Permission')}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form wire:submit.prevent="submit">
        <div class="card-body">
            <div class="form-group">
                <label for="name_en">{{__('Permission Name')}}</label>
                <input wire:model="permission.name"
                       type="text" class="form-control" id="name_en" placeholder="{{__('Enter permission')}}">
                @error('permission.name')<span class="error">{{ $message }}</span>@enderror
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
