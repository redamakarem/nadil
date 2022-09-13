<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{__('Edit new staff'). 'for restaurant '. $restaurant->name_en }}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form wire:submit.prevent="submit">
        <div class="card-body">
            

            <div class="form-group">
                <label for="name">{{__('Staff Name')}}</label>
                <input wire:model="user.name"
                       type="text" class="form-control" id="name" placeholder="Enter Full Name">
            </div>
            
            <div class="form-group">
                <label for="name">{{__('Email')}}</label>
                <input wire:model="user.email"
                       type="text" class="form-control" id="name" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="name">{{__('Password')}}</label>
                <input wire:model="password"
                       type="password" class="form-control" id="name" placeholder="Enter password">
            </div>
            <div class="form-group">
                <label for="name">{{__('Password Confirmation')}}</label>
                <input wire:model="password_confirmation"
                       type="password" class="form-control" id="name" placeholder="Enter password again">
            </div>
            <div class="form-group " wire:ignore>
                <label>{{__('Role')}}</label>
                <select class="select2 form-control"
                        id="owner" name="user_id" wire:model="selected_role"
                        data-placeholder="Select role" style="width: 100%">
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
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
            


        </div>



        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
