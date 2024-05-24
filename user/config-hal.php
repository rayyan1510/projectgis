<?php


if (isset($_GET['page'])) {
    # code...
    $page = @$_GET['page'];

    switch ($page) {
            // bagian warnet list
        case 'daftar-warnet':
            # code...
            require_once './daftar_warnet.php';
            break;

            // bagian tentang kami
        case 'tentang-kami':
            # code...
            require_once '../template/tentang_kami.php';
            break;

            // bagian detail warnet
        case 'detail_warnet':
            # code...
            require_once './detail-warnet.php';
            break;

            // bagian tambahkan komentar
        case 'proses_komentar':
            # code...
            require_once './proses_komentar.php';
            break;

        default:
            require_once './konten.php';
            break;
    }
} else {
    # code...
    include './konten.php';
}
