<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{__('Edit User')}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @if ($errors->any())
                <div class="alert alert-danger m-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" wire:submit.prevent="submit">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control"
                               id="name" placeholder="Enter name" wire:model.defer="user.name">
                        @error('name')<p class="error">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control"
                               id="email" placeholder="Enter email" wire:model.defer="user.email">
                        @error('name')<p class="error">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control"
                               id="coordinates" placeholder="Password"
                               wire:model.defer="password">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                               id="coordinates" placeholder="Password"
                               wire:model.defer="form_data.password_confirmation">
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
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
