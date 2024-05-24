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

        case 'detail_warnet':
            # code...
            require_once './detail-warnet.php';
            break;

            // bagian tentang kami
        case 'tentang-kami':
            # code...
            require_once './template/tentang_kami.php';
            break;

        default:
            require_once './template/konten.php';
            break;
    }
} else {
    # code...
    include './template/konten.php';
}
