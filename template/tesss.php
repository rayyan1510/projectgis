if ($_SESSION['level'] != 'login') {
    header("location:./login.php?pesan=belum_login");
  }

  include './connection.php';