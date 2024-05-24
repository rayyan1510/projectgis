<?php


if (isset($_POST['tambah']) === true) {
    # code...
    $nama_user = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $level = 'User';


    // eksekusi query
    $query = mysqli_query($koneksi, "INSERT INTO tbl_user VALUES ('', '$nama_user', '$email', '$password', '$level')");

    if (
        $query > 0
    ) {
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Data berhasil ditambahkan!',
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
                    text: 'Data gagal ditambahkan!',
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
