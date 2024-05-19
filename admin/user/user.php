<div class="row">
    <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User</span></h5>
    <div class="col-lg-12 mb-4 order-0s">
        <div class="card">
            <h5 class="card-header fw-bold">Data User</h5>

            <div class="table-responsive text-nowrap">
                <!-- button -->
                <a href="?url=tambah_user" class="btn ms-3 mt-2 mb-4 py-2 btn-dark"><i class='bx bx-add-to-queue me-1'></i>Tambah Data</a>

                <div class="container mb-4">
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
                                        <a class="btn btn-danger" href="?url=delete_user&id=<?= $row["id_user"]; ?>" onclick="return confirm('Apakah kamu yakin mau menghapus data ini?')"><i class="bx bx-trash me-1"></i> Delete</a>
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