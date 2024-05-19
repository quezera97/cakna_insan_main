<div>
    <section class="flex items-center justify-center h-1/5">
        <div class="bg-white w-full h-auto rounded p-8">
            <h2 class="text-2xl font-bold mb-4">Cakna Insan Malaysia {{ __('ui_text.has_been_here') }}</h2>
            <div id="map"></div>
        </div>
    </section>
</div>

@push('css')
    <style>
        #map { height: 500px; }
        .leaflet-popup-content-wrapper {
            border-radius: 0.25rem;
        }
        .leaflet-popup-content {
            margin: 0;
            line-height: 1.25;
        }
    </style>
@endpush

@push('js')
    <script>
        // Initialize the map
        var map = L.map('map').setView([20, 0], 2); // Centered on the world

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var locationData = @json($locationCoordinate);

        var locations = locationData.map(function (location) {
            return {
                lat: parseFloat(location.latitude),
                lng: parseFloat(location.longitude),
                place: location.place_or_country,
                date: location.date
            };
        });

        // Add pins to the map
        locations.forEach(function(location) {
            var date = new Date(location.date);
            var formattedDate = date.toLocaleDateString('en-GB', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });

            var marker = L.marker([location.lat, location.lng]).addTo(map);
            marker.bindPopup('<div class="bg-yellow-200 p-2 rounded shadow-md">' +
                            '<strong>' + location.place + '</strong><br>' +
                            'Date: ' + formattedDate +
                            '</div>');
        });

    </script>
@endpush
