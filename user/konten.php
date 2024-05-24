<!-- hero section -->
<div class="container mt-4 mb-5">
    <h1 class="text-center mb-4">Cyberwave Net</h1>
    <p class="text-center mb-4">Selamat datang <span style="font-weight: bold"><?= $_SESSION['nama']; ?></span> di sistem informasi penyebaran warnet yang ada di kota Medan.</p>
</div>
<!-- end hero -->

<!-- card map -->
<div class="card my-5">
    <h3 class="card-header text-center">Peta Penyebaran Warnet</h3>

    <div class="container align-items-center align-items-center justify-content-center py-3">
        <div id="map" style="width:100%;height:480px;"></div>
    </div>
</div>
<!-- card map -->

<script>
    // Initialize and add the map
    // let map;

    async function initMap() {
        // Set Posisi awal karena ini mau nampilkan daftar warnet yang ada di kota medan jadi set ke daerah yang ada di kota medan
        const position = {
            lat: 3.5919266196621003,
            lng: 98.67737096460594
        };


        // set map 
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: position
        });

        // fungsi ambil data
        fetch('http://localhost/projectgis/getLokasi.php')
            .then(response => response.json())
            .then(locations => {
                locations.forEach(locations => {
                    // buat marker berdasarkan urutan index data
                    const marker = new google.maps.Marker({
                        position: {
                            lat: parseFloat(locations.latitude),
                            lng: parseFloat(locations.longitude)
                        },
                        map: map,
                        // title: locations.nama_warnet,
                    });

                    // buat keterangan isi konten ketika marker ditekan/click
                    const infoWindow = new google.maps.InfoWindow({
                        content: locations.nama_warnet
                    });

                    // buat event listener ketika marker ditekan
                    marker.addListener('click', () => {
                        infoWindow.open(map, marker)
                    });
                });

            })
            .catch(error => console.log('Error fetching location data: ', error));


        // =============================================
    }

    window.initMap = initMap;
</script>