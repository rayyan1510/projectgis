<?php
include './connection.php';


session_start();
if (isset($_SESSION['level'])) {
    // cek level
    if ($_SESSION['level'] == "Admin") {
        # jika ada session level = admin redirect ke halaman admin
        header("Location: ./admin/index.php");
        exit();
    } else {
        # code...
        # jika ada session level = users redirect ke halaman users
        header("Location: ./user/index.php");
        exit();
    }

    exit();
}

if (isset($_POST['submit'])) {
    # code...
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars(hash('sha256', $_POST['password']));
    $level = "User";


    // cek jika ada email yang sama
    $queryCekEmail = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE email = '$email'");
    $result = mysqli_num_rows($queryCekEmail);

    if (!$result > 0) {
        // jika tidak ditemukan data yang sama maka lakukan proses registrasi
        $sql = mysqli_query($koneksi, "INSERT INTO tbl_user VALUES ('', '$name', '$email', '$password', '$level')");

        if ($sql) {
            # code...
            echo "<script>
                alert('Berhasil Registrasi!');
                window.location.href = './login.php';
            </script>";
        } else {
            echo "<script>
                alert('Whoops Terjadi kesalahan!');
                window.location.href = './register.php';
            </script>";
        }
    } else {
        echo "<script>
                alert('Whoops Email Sudah Terdaftar!');
                window.location.href = './register.php';
            </script>";
    }
}

mysqli_close($koneksi);
exit();
