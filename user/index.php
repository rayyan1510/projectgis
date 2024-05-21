<?php
session_start();
if ($_SESSION['status'] != 'login') {
  header("location:../login.php?pesan=belum_login");
}

include '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Dashboard Admin" />
  <meta name="author" content="Muhammad Rayyan Imani">

  <!-- Favicon -->
  <link rel="icon" href="" type="image/icon type">

  <title>Cyberwave</title>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />
  <!-- <link rel="stylesheet" href="../assets/vendor/css/pages/front-page.css"> -->

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />


  <!-- dataTables -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css" /> -->

  <!-- sweetalert -->
  <script src="../assets/vendor/libs/sweetalert2/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

  <!-- Page CSS -->
  <!-- <link rel="stylesheet" href="../assets/vendor/css/pages/front-page-landing.css"> -->

  <!-- <link rel="stylesheet" href="../assets/css/my.css"> -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>

</head>

<body>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar layout-without-menu">
    <div class="layout-container">
      <!-- Layout container -->
      <div class="layout-page">

        <!-- Navbar -->
        <?php require_once '../template/navbar.php'; ?>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- ISI KONTEN -->
            <?php require_once './config-hal.php'; ?>
            <!-- END ISI KONTEN -->
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <?php include_once '../template/footer.php'; ?>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
  </div>
  <!-- / Layout wrapper -->


  <script>
    // Initialize and add the map
    // let map;

    async function initMap() {
      // Set Posisi awal karena ini mau nampilkan daftar warnet yang ada di kota medan jadi set ke daerah yang ada di kota medan
      const position = {
        lat: 3.5919266196621003,
        lng: 98.67737096460594
      };


      // set map 
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: position
      });

      // fungsi ambil data
      fetch('http://localhost/projectgis/getLokasi.php')
        .then(response => response.json())
        .then(locations => {
          locations.forEach(locations => {
            // buat marker berdasarkan urutan index data
            const marker = new google.maps.Marker({
              position: {
                lat: parseFloat(locations.latitude),
                lng: parseFloat(locations.longitude)
              },
              map: map,
              // title: locations.nama_warnet,
            });

            // buat keterangan isi konten ketika marker ditekan/click
            const infoWindow = new google.maps.InfoWindow({
              content: locations.nama_warnet
            });

            // buat event listener ketika marker ditekan
            marker.addListener('click', () => {
              infoWindow.open(map, marker)
            });
          });

        })
        .catch(error => console.log('Error fetching location data: ', error));


      // =============================================
    }

    window.initMap = initMap;
  </script>

  <!--Google maps -->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9z-1e_MOB6wjXVRrp5-01ejzAdxTXffg&callback=initMap">
  </script>

  <!-- my js -->
  <!-- <script src="../assets/js/my.js"></script> -->
  <!-- end my js -->

  <!-- datatables -->
  <!-- <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script> -->
  <!-- datatables -->


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->
  <!-- <script src="../assets/js/front-page-landing.js"></script> -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

</body>

</html>