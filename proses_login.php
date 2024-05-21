<?php

session_start();

var_dump($_POST);

include './connection.php';

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

//query
$query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password'");
$result = mysqli_fetch_assoc($query);

var_dump($result);

$cek = mysqli_num_rows($query);

// cek jika data ditemukan atau tidak
if ($cek > 0) {
    // cek apakah itu admin atau user
    if ($result['level'] == 'Admin') {
        # code...
        $_SESSION['email'] = $result['email'];
        $_SESSION['level'] = $result['level'];
        $_SESSION['status'] = 'login';
        header('location: admin/index.php');
    } else {
        # code...
        $_SESSION['email'] = $result['email'];
        $_SESSION['level'] = $result['level'];
        $_SESSION['status'] = 'login';
        header('location: user/index.php');
        // echo "selemat datang user";
    }
} else {
    echo "<script>
                alert('Email atau Password salah');
                window.location.href = 'login.php';
            </script>";

    // echo "gagal";
}
