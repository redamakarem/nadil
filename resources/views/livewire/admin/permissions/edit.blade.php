<div class="card card-primary">

    <div class="card-header">
        <h3 class="card-title">{{__('Edit Permission')}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form wire:submit.prevent="submit">
        <div class="card-body">
            <div class="form-group">
                <label for="name">{{__('Permission Name')}}</label>
                <input wire:model.defer="permission.name"
                       type="text" class="form-control" id="name" placeholder="Enter permission name">
                @error('permission.name')<span class="error">{{ $message }}</span>@enderror
            </div>
            
        </div>



        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
