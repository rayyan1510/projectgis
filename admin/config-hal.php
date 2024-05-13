<?php

if (isset($_GET['url'])) {
    # code...
    $url = @$_GET['url'];

    switch ($url) {
            // bagian table brand
        case 'user':
            # code...
            require_once './user/user.php';
            break;

        case 'tambah_user':
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

        default:
            require_once './template/dashboard.php';
            break;
    }
} else {
    # code...
    include './template/dashboard.php';
}
