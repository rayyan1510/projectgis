<?php

// var_dump($_GET);

if (isset($_GET['url'])) {
    # code...
    $url = @$_GET['url'];

    switch ($url) {
            // bagian table warnet
        case 'user':
            # code...
            require_once './user/user.php';
            break;

        case 'tambah_user':
            # code...
            require_once './user/form_tambah.php';
            break;

        case 'proses_tambah_user':
            # code...
            require_once './user/proses_tambah.php';
            break;

        case 'edit_user':
            # code...
            require_once './user/form_edit.php';
            break;

        case 'proses_edit_user':
            # code...
            require_once './user/proses_edit.php';
            break;

        case 'delete_user':
            # code...
            require_once './user/hapus.php';
            break;
            // ====================================

            // bagian table warnet
        case 'warnet':
            # code...
            require_once './warnet/warnet.php';
            break;

        case 'tambah_warnet':
            # code...
            require_once './warnet/form_tambah.php';
            break;

        case 'proses_tambah_warnet':
            # code...
            require_once './warnet/proses_tambah.php';
            break;

        case 'detail_warnet':
            # code...
            require_once './warnet/detail_warnet.php';
            break;

        case 'edit_warnet':
            # code...
            require_once './warnet/form_edit.php';
            break;

        case 'proses_edit_warnet':
            # code...
            require_once './warnet/proses_edit.php';
            break;

        case 'delete_warnet':
            # code...
            require_once './warnet/hapus.php';
            break;
            // ====================================


        default:
            require_once './template/dashboard.php';
            break;
    }
} else {
    # code...
    include './template/dashboard.php';
}
