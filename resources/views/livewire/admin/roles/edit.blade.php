<div class="card card-primary">

    <div class="card-header">
        <h3 class="card-title">{{__('Edit Role')}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form wire:submit.prevent="submit">
        <div class="card-body">
            <div class="form-group">
                <label for="name">{{__('Role Name')}}</label>
                <input wire:model.defer="role.name"
                       type="text" class="form-control" id="name" placeholder="{{__('Enter role name')}}">
                @error('role.name')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group" wire:ignore>
                <label>{{__('Permissions')}}</label>
                <select class="select2" style="width: 100%;"
                        id="permissions" multiple="multiple" wire:model.defer="selected_permissions"
                        data-placeholder="Select permission(s)" >
                    @foreach($permissions as $permission)
                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>



        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
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
                Livewire.emit('cuisineUpdated');
            }

            jQuery('#permissions').select2().on('change', function () {
                @this.set('selected_permissions',jQuery(this).val());
                console.log('Permissions : ' + @this.selected_permissions)
            });
        });


    </script>
@endpush
