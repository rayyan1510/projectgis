<div class="row">
    <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warnet</span></h5>
    <div class="col-lg-12 mb-4 order-0s">
        <div class="card">
            <h5 class="card-header fw-bold">Data Warnet</h5>

            <!-- button tambah -->
            <div class="container-xs">
                <a href="?url=tambah_warnet" class="btn ms-3 mt-2 mb-4 py-2 btn-dark"><i class='bx bx-add-to-queue me-1'></i>Tambah Data</a>
            </div>

            <div class="table-responsive text-nowrap">
                <div class="container mb-4">
                    <table class="table table-hover" id="myTable" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Warnet</th>
                                <th>Deskripsi</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody class="table-border-bottom-0">
                            <?php
                            $result = mysqli_query($koneksi, "SELECT * FROM `tbl_warnet`");
                            $numrows = mysqli_num_rows($result);

                            // output data of each row
                            $no = 1;
                            if ($numrows == true) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row["nama_warnet"]; ?></td>
                                        <td><?= $row["deskripsi"]; ?></td>
                                        <td><?= $row["alamat"]; ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="?url=detail_warnet&id=<?= $row["id_warnet"]; ?>"><i class="bx bx-show-alt me-1"></i> Detail Warnet</a>
                                                    <a class="dropdown-item" href="?url=edit_warnet&id=<?= $row["id_warnet"]; ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item" href="?url=delete_warnet&id=<?= $row["id_warnet"]; ?>" onclick="return confirm('Apakah kamu yakin mau menghapus data ini?')"><i class="bx bx-trash me-1"></i> Delete</a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                            <?php
                                } //endwhile
                            } //endif
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>