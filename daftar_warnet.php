<!-- hero section -->
<div class="container mt-4 mb-5">
    <h1 class="text-center mb-4">Daftar Warnet</h1>
    <p class="text-center mb-4">List warnet yang ada di kota medan</p>
</div>
<!-- end hero -->

<!-- card map -->
<div class="card my-5">
    <h5 class="card-header text-center">Table Warnet</h5>

    <div class="container py-3">
        <div class="table-responsive text-nowrap mt-4">
            <table class="table table-hover" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Warnet</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
                    $result = mysqli_query($koneksi, "SELECT * FROM view_detail_warnet");
                    if (mysqli_num_rows($result) > 0) {

                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row["nama_warnet"]; ?></td>
                                <td><?= $row["alamat"]; ?></td>
                                <td><a class="btn btn-info" href="?url=detail_warnet&id=<?= $row["id_warnet"]; ?>"><i class='bx bx-current-location me-1'></i> Detail Warnet</a></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php
                    } else {
                        echo "0 results data tidak ada";
                    }
                    mysqli_close($koneksi);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- card map -->