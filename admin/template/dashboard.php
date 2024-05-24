<div class="row">
    <div class="col-lg-8 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Hi <?= $_SESSION['nama']; ?>! 🎉</h5>
                        <p class="mb-4">
                            Semoga harimu menyenangkan
                        </p>

                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Data -->
    <div class="col-12 col-lg-8 order-2 order-md-0 order-lg-2 mb-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <span class="avatar-initial rounded bg-label-success rounded"><i class='bx bx-laptop'></i></span>
                            </div>
                        </div>
                        <?php
                        $queryCountWarnet = mysqli_query($koneksi, "SELECT * FROM tbl_warnet");
                        $warnet = mysqli_num_rows($queryCountWarnet);
                        ?>
                        <span class="fw-semibold d-block mb-1">List Warnet</span>
                        <h3 class="card-title mb-2"><?= $warnet; ?></h3>
                        <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> -->
                    </div>
                </div>
            </div>
            <!-- user -->
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <span class="avatar-initial rounded bg-label-info rounded"><i class='bx bxs-user'></i></span>
                            </div>
                        </div>
                        <?php
                        $queryCountUser = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE level='User'");
                        $user = mysqli_num_rows($queryCountUser);
                        ?>
                        <span class="fw-semibold d-block mb-1">List User</span>
                        <h3 class="card-title mb-2"><?= $user; ?></h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Datat -->

</div>