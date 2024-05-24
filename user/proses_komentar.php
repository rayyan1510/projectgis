<?php

include '../connection.php';




if (isset($_POST['tambah'])) {
    # code...
    $id_warnet = htmlspecialchars($_POST['id_warnet']);
    $komentar = htmlspecialchars($_POST['komentar']);
    $nama_user = htmlspecialchars($_SESSION['nama']);
    $email = htmlspecialchars($_SESSION['email']);

    // mengambil id dengan nama user yg diinputkan
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE nama = '$nama_user' AND email = '$email'");
    $result = mysqli_fetch_assoc($query);
    $id_user = $result['id_user'];


    if ($hasil = mysqli_num_rows($query) > 0) {

        $queryInsert = mysqli_query($koneksi, "INSERT INTO `tbl_detail_warnet` VALUES ('$id_warnet', '$id_user', '$komentar')");
        if ($queryInsert > 0) {
            echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Kometar berhasil ditambahkan!',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '?page=daftar-warnet'; 
                    }
                })
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Komentar gagal ditambahkan!',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '?page=daftar-warnet';
                    }
                })
            </script>";
        }
    } else {
        # code...
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Komentar gagal ditambahkan dan terjadi masalah!',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '?page=daftar-warnet';
                    }
                })
            </script>";
    }
}
