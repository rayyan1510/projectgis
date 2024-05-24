<?php

if (isset($_POST['edit']) === true) {
    # code...
    $id = htmlspecialchars($_POST['id_user']);
    $nama_user = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $level = 'User';

    // eksekusi query
    $query = mysqli_query($koneksi, "UPDATE `tbl_user` SET nama = '$nama_user', email = '$email', password = '$password', level = '$level' WHERE id_user = '$id'");

    if (
        $query > 0
    ) {
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Data berhasil diubah!',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '?url=user'; 
                    }
                })
            </script>";
    } else {
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Data gagal diubah!',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '?url=user';
                    }
                })
            </script>";
    }
}
