<?php

if (isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
} else {
    header("Location: ?url=user");
}

$resultView = mysqli_query($koneksi, "SELECT * FROM `view_detail_warnet` WHERE`id_warnet` = $id");
$numrows = mysqli_num_rows($resultView);



$resultWarnet = mysqli_query($koneksi, "SELECT * FROM tbl_warnet WHERE id_warnet = $id");
$data = mysqli_fetch_assoc($resultWarnet);
?>

<h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warnet /</span> Details</h5>

<div class="row">
    <!-- left side konten -->
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
        <!-- User Card -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="user-avatar-section">
                    <div class=" d-flex align-items-center flex-column">
                        <img class="d-block rounded my-4" src="../assets/img/upload/<?= $data['gambar']; ?>" height="100" width="100" alt="<?= $data['gambar']; ?>" />
                        <div class="user-info text-center">
                            <h4 class="mb-4"><?= $data['nama_warnet']; ?></h4>
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
                        <li class="mb-3">
                            <span class="fw-medium me-2">Longitude:</span>
                            <span><?= $data['longitude']; ?></span>
                        </li>
                    </ul>
                </div>
                <a href="?url=warnet" class="btn btn-secondary">
                    <i class='bx bx-left-arrow-alt me-1'></i>
                    Kembali
                </a>
            </div>
        </div>
        <!-- /User Card -->
    </div>
    <!-- end left side konten -->

    <!-- right side konten -->
    <div class="col-xl-8 col-lg-7 col-md-7 order 0 order-md-1">

        <!-- Project table -->
        <div class="card mb-4">
            <h6 class="card-header">User's Review</h6>
            <div class="table-responsive mb-3 p-3">
                <table class="table datatable-project border-top table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if ($numrows == true) :
                            while ($row = mysqli_fetch_assoc($resultView)) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row["nama_user"]; ?></td>
                                    <td><?= $row["komentar"]; ?></td>
                                </tr>
                        <?php
                            endwhile; //endwhile
                        endif; //endif
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /Project table -->
    </div>
    <!-- end right side konten -->
</div>