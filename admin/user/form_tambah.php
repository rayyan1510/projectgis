<h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User/</span> Tambah</h5>

<!-- row -->
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Tambah Data</h5>
            </div>

            <div class="card-body">
                <form action="?url=proses_tambah_user" method="post">

                    <!-- nama  -->
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama User</label>
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama" placeholder="Nama" required />
                    </div>
                    <!-- nama -->

                    <!-- email -->
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-Email">Email</label>
                        <input type="email" class="form-control" id="basic-default-Email" name="email" placeholder="Email" required />
                    </div>
                    <!-- email -->

                    <!-- password -->
                    <div class="mb-3">
                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-password12">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="basic-default-password12" placeholder="Password" aria-describedby="basic-default-password2" / required>
                                <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- password -->

                    <button type="submit" name="tambah" class="btn btn-success">Tambah Data</button>
                    <a href="?url=user" class="btn btn-secondary">
                        <i class='bx bx-left-arrow-alt me-1'></i>
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>

</div>