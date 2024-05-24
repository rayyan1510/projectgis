<?php
// Cek jika session level user ada, maka tampilkan navbar khusus user
if (isset($_SESSION['level']) && $_SESSION['level'] == 'User') {
?>
    <!-- Navbar untuk user -->
    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <div class="">
                <a class="navbar-brand fw-bold" href="?page=index.php">CyberWave Net</a>
            </div>
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <li class="nav-item pe-3">
                    <a class="nav-link" href="?page=daftar-warnet">List Warnet</a>
                </li>
                <li class="nav-item pe-3">
                    <a class="nav-link" href="?page=tentang-kami">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- / Navbar -->
<?php
} else {
?>
    <!-- Navbar untuk tamu -->
    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <div class="">
                <a class="navbar-brand fw-bold" href="?page=index.php">CyberWave Net</a>
            </div>
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <li class="nav-item pe-3">
                    <a class="nav-link" href="?page=daftar-warnet">List Warnet</a>
                </li>
                <li class="nav-item pe-3">
                    <a class="nav-link" href="?page=tentang-kami">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- / Navbar -->
<?php
}
?>