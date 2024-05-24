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
}

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars(hash('sha256', $_POST['password']));

//query
$query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password'");
$result = mysqli_fetch_assoc($query);

$cek = mysqli_num_rows($query);

// cek jika data ditemukan atau tidak
if ($cek > 0) {
    // cek apakah itu admin atau user
    if ($result['level'] == 'Admin') {
        # code...
        $_SESSION['nama'] = $result['nama'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['level'] = $result['level'];
        $_SESSION['status'] = 'login';
        header('location: admin/index.php');
    } else {
        # code...
        $_SESSION['nama'] = $result['nama'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['level'] = $result['level'];
        $_SESSION['status'] = 'login';
        header('location: user/index.php');
    }
} else {
    echo "<script>
                alert('Email atau Password salah');
                window.location.href = 'login.php';
            </script>";
}
