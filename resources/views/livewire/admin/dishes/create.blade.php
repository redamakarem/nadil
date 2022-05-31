<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add Dish</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form wire:submit.prevent="submit">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Dish Name</label>
                <input wire:model="name"
                       type="text" class="form-control" id="name" placeholder="Enter Dish name">
                @error('name')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <x-media-library-attachment name="dish_image"/>
            </div>
            <div class="form-group">
                <textarea name="" id="" class="form-control" rows="5"></textarea>
            </div>

            <div class="form-group" wire:ignore>
                <label>Cuisines</label>
                <select class="select2" style="width: 100%;"
                        id="cuisines" multiple="multiple" wire:model.defer="form_data.cuisines"
                        data-placeholder="Select cuisine(s)" >
                    @foreach($cuisines as $cuisine)
                        <option value="{{$cuisine->id}}">{{$cuisine->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Preparation Time</label>
                <input wire:model="prep_time"
                       type="text" class="form-control" id="name" placeholder="Enter Preparation Time">
                @error('name')<span class="error">{{ $message }}</span>@enderror
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

            jQuery('#cuisines').select2().on('change', function () {
            @this.set('form_data.cuisines',jQuery(this).val());
                console.log('Cuisines : ' + @this.form_data.cuisines)
            });


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
