<?php
// var_dump($_GET);

if (isset($_GET['page'])) {
    # code...
    $page = @$_GET['page'];

    switch ($page) {
            // bagian warnet list
        case 'daftar-warnet':
            # code...
            require_once './daftar_warnet.php';
            break;

        case 'tentang-kami':
            # code...
            require_once '../template/tentang_kami.php';
            break;

        default:
            require_once '../template/konten.php';
            break;
    }
} else {
    # code...
    include '../template/konten.php';
}
