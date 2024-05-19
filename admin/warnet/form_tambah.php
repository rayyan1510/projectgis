<h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warnet/</span> Tambah</h5>

<!-- row -->
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Tambah Data</h5>
            </div>

            <div class="card-body">
                <form action="?url=proses_tambah_warnet" method="post" enctype="multipart/form-data">

                    <!-- nama  -->
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Warnet</label>
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama" placeholder="Nama warnet" required />
                    </div>
                    <!-- nama -->

                    <!-- deskripsi -->
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="basic-default-deskripsi" name="deskripsi" placeholder="Deskripsi" required />
                    </div>
                    <!-- deskripsi -->

                    <!-- gambar -->
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Gambar</label>
                        <input class="form-control" type="file" id="formFile" name="gambar" required />
                    </div>
                    <!-- gambar -->


                    <!-- alamat -->
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-alamat">Alamat</label>
                        <input type="text" class="form-control" id="basic-default-alamat" name="alamat" placeholder="Alamat" required />
                    </div>
                    <!-- alamat -->

                    <!-- latitude -->
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-latitude">Latitude</label>
                        <input type="text" class="form-control" id="basic-default-latitude" name="latitude" placeholder="Latitude" required />
                    </div>
                    <!-- latitude -->

                    <!-- longtitude -->
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-longtitude">Longitude</label>
                        <input type="text" class="form-control" id="basic-default-longtitude" name="longtitude" placeholder="Longitude" required />
                    </div>
                    <!-- longtitude -->

                    <button type="submit" name="tambah" class="btn btn-success">Tambah Data</button>
                    <a href="?url=warnet" class="btn btn-secondary">
                        <i class='bx bx-left-arrow-alt me-1'></i>
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>

</div>