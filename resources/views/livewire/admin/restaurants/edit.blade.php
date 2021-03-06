<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit restaurant</h3>
            </div>

            <!-- /.card-header -->
            <!-- form start -->


            <form wire:submit.prevent = "submit">
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
                        <label for="name_en">English Name</label>
                        <input type="text" name="name_en" class="form-control" id="name_en" placeholder="Enter name" wire:model="restaurant.name_en">
                    </div>
                    <div class="form-group">
                        <label for="name_ar">Arabic Name</label>
                        <input type="text" name="name_ar" class="form-control" id="name_ar" placeholder="Enter name" wire:model="restaurant.name_ar">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" wire:model="restaurant.email">
                    </div>
                    <div class="form-group" wire:ignore>
                        <label>Owner</label>
                        <select class="form-control" style="width: 100%;"
                                id="owner" wire:model="owner"
                                data-placeholder="Select Owner" >
                            <option value="">{{__('Select Owner')}}</option>
                            @foreach($ownerss as $owners)
                                <option value="{{$owners->id}}">{{$owners->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="coordinates">Coordinates</label>
                        <div id="googleMap" style="width:100%;height:400px;" wire:ignore></div>
                        <input type="text" readonly name="coordinates" class="form-control"
                               id="coordinates" placeholder="Click on the map to get coordinates"
                               wire:model="coordinates">
                        @error('coordinates')<p class="error">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <x-media-library-attachment name="restaurant_image"/>
                    </div>

                    <div class="form-group">
                        <label for="restaurant_bg">Restaurant Background</label>
                        <x-media-library-attachment name="restaurant_bg"/>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control"
                                  rows="3" name="address" wire:model="restaurant.address"
                                  placeholder="Address..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control"
                               id="phone" placeholder="Ex: 25555555" wire:model="restaurant.phone">
                        @error('phone')<p class="error">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>{{__('Active')}}</label>
                        <livewire:components.toggle-button
                            :model="$restaurant"
                            field="is_active"
                            key="{{ $restaurant->id }}"/>
                    </div>


                    <div class="form-group" wire:ignore>
                        <label>Cuisines</label>
                        <select class="select2" style="width: 100%;"
                                id="cuisines" multiple="multiple" wire:model="cuisines"
                                data-placeholder="Select cuisine(s)" >
                            @foreach($cuisiness as $cuisine)
                                <option value="{{$cuisine->id}}">{{$cuisine->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" wire:ignore>
                        <label>Meal Types</label>
                        <select class="select2" style="width: 100%;"
                                id="meal_types" multiple="multiple" wire:model="meal_types"
                                data-placeholder="Select meal type(s)" >
                            @foreach($meal_typess as $meal_type)
                                <option value="{{$meal_type->id}}">{{$meal_type->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Max Party Size</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" wire:model="restaurant.max_party_size">
                    </div>
                    <div class="form-group">
                        <label for="name">Estimated Dining Time</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Eg: 45" wire:model="restaurant.estimated_dining_time">
                    </div>

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

@push('scripts')
    <script>
        jQuery(document).ready(function () {
            jQuery('#cuisines').select2().on('change', function () {
            @this.set('cuisines',jQuery(this).val());
                console.log('Cuisines : ' + @this.cuisines)
            });
            jQuery('#meal_types').select2().on('change', function () {
            @this.set('meal_types',jQuery(this).val());
                console.log('Cuisines : ' + @this.meal_types)
            });

            window.addEventListener('alert', ({detail: {type, message}}) => {
                if (type === 'success') {
                    toastr.success(message);
                } else {
                    toastr.error(message);
                }
            });

            toastr.options.onHidden = function () {
                Livewire.emit('restaurant-updated');
            }

        });


        document.addEventListener('livewire:load', function () {
            initMap();


        })
        function initMap() {
            const locationStr = "{{$restaurant->coordinates}}";
            const coordsArray =locationStr.split(',');
            const myLatlng = {lat:parseFloat(coordsArray[0]),lng:parseFloat(coordsArray[1])};
                // { lat: 29.377194479736122, lng: 47.97981981486454 };
            const map = new google.maps.Map(document.getElementById("googleMap"), {
                zoom: 14,
                center: myLatlng,
            });
            // Create the initial InfoWindow.
            let infoWindow = new google.maps.InfoWindow({
                content: "Click the map to get Lat/Lng!",
                position: myLatlng,
            });

            infoWindow.open(map);
            // Configure the click listener.
            map.addListener("click", (mapsMouseEvent) => {
                // Close the current InfoWindow.
                infoWindow.close();
                // Create a new InfoWindow.
                infoWindow = new google.maps.InfoWindow({
                    position: mapsMouseEvent.latLng,
                });
                console.log(mapsMouseEvent.latLng.toJSON());
                infoWindow.setContent(
                    JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                );
                infoWindow.open(map);
            // @this.coordinates=JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
            var coordsStr= mapsMouseEvent.latLng.toJSON().lat+','+mapsMouseEvent.latLng.toJSON().lng;
            @this.coordinates = coordsStr;

            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfJsNn93pyzgF-9ICzEI1q-N9UN3c0SxE&callback=initMap"></script>
@endpush

