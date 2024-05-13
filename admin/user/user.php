<div class="row">
    <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User/</span> Horizontal Layouts</h5>
    <div class="col-lg-12 mb-4 order-0s">
        <div class="card">
            <h5 class="card-header fw-bold">Data User</h5>

            <div class="table-responsive text-nowrap">
                <!-- Button trigger modal -->
                <button type="button" class="btn ms-3 mt-2 mb-4 py-2 btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class='bx bx-add-to-queue me-1'></i>
                    Tambah Data
                </button>

                <div class="container">
                    <table class="table table-hover" id="myTable" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody class="table-border-bottom-0">
                            <?php
                            $result = mysqli_query($koneksi, "SELECT * FROM `tbl_user`");



                            // output data of each row
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row["nama"]; ?></td>
                                    <td><?= $row["email"]; ?></td>
                                    <td><?= $row["password"]; ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="?url=edit_user&id=<?= $row["id_user"]; ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="btn btn-danger" href="?url=delete_user&id=<?= $row["id_user"]; ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </td>
                                </tr>

                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" id="exampleModalLabel">Tambah Data
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?url=tambah_user" method="post">
                    <!-- nama user -->
                    <div class="mb-3">
                        <label for="exampleNama" class="form-label fw-semibold">Nama
                            User</label>
                        <input type="text" class="form-control" name="nama" id="exampleNama" aria-describedby="namaHelp" placeholder="Nama" required>
                    </div>
                    <!-- nama user -->

                    <!-- email -->
                    <div class="mb-3">
                        <label for="exampleInputemail1" class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputemail1" aria-describedby="emailHelp" placeholder="Email" required>
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


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-success">Tambah Data</button>
            </div>

            </form>
        </div>
    </div>
</div>
<!-- end modal -->