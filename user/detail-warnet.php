<?php
include '../connection.php';

$id = $_GET['id'];
$resultWarnet = mysqli_query($koneksi, "SELECT * FROM tbl_warnet WHERE id_warnet='$id'");
$data = mysqli_fetch_assoc($resultWarnet);

if (!$data) {
    echo "Data tidak ditemukan!";
}

?>
<!-- hero section -->
<div class="container mt-4 mb-5">
    <h1 class="text-center mb-4">Cyberwave Net</h1>
    <!-- <p class="text-center mb-4">Detail Warnet</p> -->
</div>
<!-- end hero -->


<!-- card  -->
<div class="card my-5">
    <h3 class="card-header text-center">Informasi Warnet</h3>

    <div class="container align-items-center align-items-center justify-content-center py-3">
        <div class="row">
            <!-- left side konten -->
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="user-avatar-section">
                    <div class=" d-flex align-items-center flex-column">
                        <img class="d-block rounded my-4" src="../assets/img/upload/<?= $data['gambar']; ?>" height="100" width="100" alt="<?= $data['gambar']; ?>" />
                        <div class="user-info text-center">
                            <h4 class="mb-3"><?= $data['nama_warnet']; ?></h4>
                        </div>
                    </div>
                </div>

                <h5 class="pb-2 border-bottom mb-4">Details</h5>
                <div class="info-container">
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <span class="fw-medium me-2">Deskripsi:</span>
                            <span><?= $data['deskripsi']; ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-medium me-2">Alamat:</span>
                            <span><?= $data['alamat']; ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-medium me-2">Latitude:</span>
                            <span><?= $data['latitude']; ?></span>
                        </li>
                        <li class="mb-2">
                            <span class="fw-medium me-2">Longitude:</span>
                            <span><?= $data['longitude']; ?></span>
                        </li>
                    </ul>
                </div>
                <!-- /User Card -->
                <hr class="my-0 mb-2">

                <h5 class="pb-3">Bagikan pengalaman anda</h5>

                <!-- form -->
                <form action="?page=proses_komentar" method="post">

                    <input type="hidden" name="id_warnet" value="<?= $data['id_warnet']; ?>">

                    <!-- deskripsi -->
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">Coba ceritakan pengalaman anda</label>
                        <textarea id="basic-default-message" class="form-control" name="komentar" placeholder="Bagikan pengalaman anda ditempat ini!"></textarea>
                    </div>
                    <!-- deskripsi -->

                    <button type="submit" name="tambah" class="btn btn-success">Tambah Data</button>
                    <a href="?page=daftar-warnet" class="btn btn-secondary">
                        <i class='bx bx-left-arrow-alt me-1'></i>
                        Kembali
                    </a>
                </form>
                <!-- end form -->
            </div>
            <!-- end left side konten -->
            <!-- right side konten -->
            <div class="col-xl-8 col-lg-7 col-md-7 order 0 order-md-1 ml-5">
                <!-- map -->
                <div id="map" style="width:100%;height:480px;" class="rounded"></div>
                <!-- end map -->
            </div>
            <!-- end right side konten -->
        </div>
    </div>
</div>
<!-- card  -->

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

        // create marker for the warnet location
        const warnetPosition = {
            lat: parseFloat('<?= $data['latitude']; ?>'),
            lng: parseFloat('<?= $data['longitude']; ?>')
        };

        // buat marker berdasarkan urutan index data
        const marker = new google.maps.Marker({
            position: warnetPosition,
            map: map,
            title: '<?= $data['nama_warnet']; ?>',
        });

        // buat keterangan isi konten ketika marker ditekan/click
        const infoWindow = new google.maps.InfoWindow({
            content: '<div><strong><?= htmlspecialchars($data['nama_warnet']); ?></strong><br><br><?= htmlspecialchars($data['deskripsi']); ?></div>'
        });

        // buat event listener ketika marker ditekan
        marker.addListener('click', () => {
            infoWindow.open(map, marker)
        });

        // =============================================
        map.setCenter(warnetPosition);
    }
</script>