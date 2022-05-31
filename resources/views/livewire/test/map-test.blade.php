<div>

    <h1>Google Map Test</h1>
    <div id="googleMap" style="width:100%;height:400px;" wire:ignore></div>
    <p>
        {{$latLng}} <br>
        <button wire:click="save">Save</button>
    </p>

</div>



@push('scripts')
    <script>

        document.addEventListener('livewire:load', function () {
            initMap();


        })
        function initMap() {
            const myLatlng = { lat: -25.363, lng: 131.044 };
            const map = new google.maps.Map(document.getElementById("googleMap"), {
                zoom: 4,
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
                infoWindow.setContent(
                    JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                );
                infoWindow.open(map);
                @this.latLng=JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfJsNn93pyzgF-9ICzEI1q-N9UN3c0SxE&callback=initMap"></script>
@endpush
