<!-- hero section -->
<div class="container mt-4 mb-5">
    <h1 class="text-center mb-4">Cyberwave</h1>
    <p class="text-center mb-4">Selamat datang di sistem informasi penyebaran warnet yang ada di kota Medan.</p>
</div>
<!-- end hero -->

<!-- card map -->
<div class="card my-5">
    <h3 class="card-header text-center">Peta Penyebaran Warnet</h3>

    <div class="container align-items-center align-items-center justify-content-center py-3">
        <!-- <div class="map-container text-center h-100">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127620.98165807888!2d98.57835464837869!3d3.591185366259567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131bf770b68fd%3A0x7053f2dc0b36e2d0!2sMedan%2C%20Medan%20City%2C%20North%20Sumatra%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1622546021176!5m2!1sen!2sus" allowfullscreen="" loading="lazy" width="700" height="500"></iframe>
        </div> -->

        <div id="map" style="width:100%;height:480px;"></div>
    </div>
</div>
<!-- card map -->

<!-- <script>
    (g => {
        var h, a, k, p = "The Google Maps JavaScript API",
            c = "google",
            l = "importLibrary",
            q = "__ib__",
            m = document,
            b = window;
        b = b[c] || (b[c] = {});
        var d = b.maps || (b.maps = {}),
            r = new Set,
            e = new URLSearchParams,
            u = () => h || (h = new Promise(async (f, n) => {
                await (a = m.createElement("script"));
                e.set("libraries", [...r] + "");
                for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                e.set("callback", c + ".maps." + q);
                a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                d[q] = f;
                a.onerror = () => h = n(Error(p + " could not load."));
                a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                m.head.append(a)
            }));
        d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
    })
    ({
        key: "AIzaSyB9z-1e_MOB6wjXVRrp5-01ejzAdxTXffg",

        v: "beta"
    });
</script> -->
<!-- <script>
    // Initialize and add the map
    let map;

    async function initMap() {
        // Set Posisi awal karena ini mau nampilkan daftar warnet yang ada di kota medan jadi set ke daerah yang ada di kota medan
        const position = {
            lat: 3.5919266196621003,
            lng: 98.67737096460594
        };

        // versi ke 1
        // set map library
        // const {
        //     Map
        // } = await google.maps.importLibrary("maps");
        // Buat map dan atur posisi dan angle camera
        // map = new Map(document.getElementById("map"), {
        //     zoom: 12,
        //     center: position,
        //     mapId: "Medan_Warnet_ID",
        // });

        // versi ke 2
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: position
        });


        // set poin posisi marker
        // const tourStops = [
        //     [{
        //         lat: 3.6217696518605735,
        //         lng: 98.70734511349158
        //     }, "Stream Cafe"],
        //     [{
        //         lat: 3.6010496880070346,
        //         lng: 98.68316688529538
        //     }, "warnet aksara 1"],
        //     [{
        //         lat: 3.5631315942101653,
        //         lng: 98.65068940429956
        //     }, "warnet maju tak gentar"],

        // ];
        // Create an info window to share between markers.
        // const infoWindow = new google.maps.InfoWindow();

        // Create the markers.
        // tourStops.forEach(([position, title], i) => {
        //     const marker = new google.maps.Marker({
        //         position,
        //         map,
        //         title: `${i + 1}. ${title}`,
        //         // label: `${i + 1}`,
        //         optimized: false,
        //     });

        //     // Add a click listener for each marker, and set up the info window.
        //     marker.addListener("click", () => {
        //         infoWindow.close();
        //         infoWindow.setContent(marker.getTitle());
        //         infoWindow.open(marker.getMap(), marker);
        //     });
        // });

        // fungsi ambil data
        fetch('../getLocation.php')
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
                    marker.addListner('click', () => {
                        infoWindow.open(map, marker)
                    });
                });

            })
            .catch(error => console.error('Error fetching location data:', error));


        // =============================================

        // The marker, positioned at Uluru
        // const marker = new AdvancedMarkerView({
        //     map: map,
        //     position: position,
        //     title: "Uluru",
        // });

        // // The marker, positioned at Uluru
        // const marker2 = new AdvancedMarkerView({
        //     map: map,
        //     position: position,
        //     title: "Uluru",
        // });

        // const marker = new google.maps.Marker({
        //     position: position,
        //     map,
        //     title: "Percobaan",
        // });

    }


    // Ambil data marker dari PHP

    // function setMarkers(map, locations) {
    //     let globalPin = 'img/marker.png';

    //     for (let i = 0; i < locations.length; i++) {
    //         var office = locations[i];
    //         var myLatitudeLongitude = new google.maps.LatLing(office[4], office[3]);
    //         var infowindow = new google.maps.InfoWindow({
    //             content: contentString
    //         });

    //         let contentString = '<div id="content">' +
    //             '<div id="siteNotice">' +
    //             '</div>' +
    //             '<h5 id="firstHeading" class="firstHeading">' + office[1] + '</h5>' +
    //             '<div id="bodyContent">' +
    //             '<a href=detail.php?id_warnet=' + office[0] + '>Info Detail</a>' +
    //             '</div>' +
    //             '</div>';

    //         // buat marker
    //         let marker = new google.maps.Marker({
    //             position: myLatitudeLongitude,
    //             map: map,
    //             title: office[1],
    //             icon: 'img/markermap.png'
    //         });

    //         // nambahkan map untuk bisa click
    //         google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));
    //     }
    // }


    window.initMap = initMap;
</script> -->