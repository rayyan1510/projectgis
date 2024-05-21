{/* <script>
      let map;

      function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
          zoom: 3,
          center: { lat: -28.024, lng: 140.887 },
        });

        // Fetch locations data from PHP
        fetch('getLocations.php')
          .then(response => response.json())
          .then(locations => {
            locations.forEach(location => {
              const marker = new google.maps.Marker({
                position: { lat: parseFloat(location.lat), lng: parseFloat(location.lng) },
                map: map,
              });

              const infoWindow = new google.maps.InfoWindow({
                content: location.info,
              });

              marker.addListener('click', () => {
                infoWindow.open(map, marker);
              });
            });
          })
          .catch(error => console.error('Error fetching location data:', error));
      }

      window.initMap = initMap;
    </script> */}