<?php

if (isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
} else {
    header("Location: ?url=warnet");
}

$result = mysqli_query($koneksi, "SELECT * FROM tbl_warnet WHERE id_warnet = $id");
$data = mysqli_fetch_assoc($result);
?>

<h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warnet/</span> Edit</h5>

<!-- row -->
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Data</h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="../assets/img/upload/<?= $data['gambar']; ?>" alt="<?= $data['gambar']; ?>" class="d-block rounded" height="100" width="100" id="" />
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <form action="?url=proses_edit_warnet" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id_warnet" value="<?= $data['id_warnet']; ?>">

                    <input type="hidden" name="gambarLama" value="<?= $data['gambar']; ?>">
                    <!-- nama  -->
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Warnet</label>
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama" placeholder="Nama warnet" value="<?= $data['nama_warnet']; ?>" required />
                    </div>
                    <!-- nama -->

                    <!-- deskripsi -->
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="basic-default-deskripsi" name="deskripsi" placeholder="Deskripsi" value="<?= $data['deskripsi']; ?>" required />
                    </div>
                    <!-- deskripsi -->

                    <!-- gambar -->
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Gambar</label>
                        <input class="form-control" type="file" id="formFile" name="gambar" />
                    </div>
                    <!-- gambar -->


                    <!-- alamat -->
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-alamat">Alamat</label>
                        <input type="text" class="form-control" id="basic-default-alamat" name="alamat" placeholder="Alamat" value="<?= $data['alamat']; ?>" required />
                    </div>
                    <!-- alamat -->

                    <!-- latitude -->
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-latitude">Latitude</label>
                        <input type="text" class="form-control" id="basic-default-latitude" name="latitude" placeholder="Latitude" value="<?= $data['latitude']; ?>" required />
                    </div>
                    <!-- latitude -->

                    <!-- longtitude -->
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-longtitude">Longitude</label>
                        <input type="text" class="form-control" id="basic-default-longtitude" name="longitude" placeholder="Longitude" value="<?= $data['longitude']; ?>" required />
                    </div>
                    <!-- longtitude -->

                    <button type="submit" name="edit" class="btn btn-warning">Edit</button>
                    <a href="?url=warnet" class="btn btn-secondary">
                        <i class='bx bx-left-arrow-alt me-1'></i>
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>

</div>