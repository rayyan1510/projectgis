<?php


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['tambah']) === true) {
    # code...

    $nama_warnet = htmlspecialchars($_POST['nama']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $latitude = htmlspecialchars($_POST['latitude']);
    $longtitude = htmlspecialchars($_POST['longtitude']);


    $namaFile = $_FILES['gambar']['name'];
    $errorFile = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah gambar diupload atau tidak
    if ($errorFile === 4) {
        # jika ketahuan gk upload gambar
        echo "<script>
                Swal.fire({
                    title: 'Warning!',
                    text: 'Silahkan Upload Gambar!',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '?url=tambah_warnet';
                    }
                })
            </script>";
    }

    // set rules ekstensi file yang dapat diupload
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    // nama file baru untuk mencegah nama gambar yang sama
    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

    // cek yang diupload adalah bukan gambar? (.png, .jpg, .jpeg)
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                Swal.fire({
                    title: 'Warning!',
                    text: 'Yang anda Upload bukan gambar, Silahkan upload dengan file gambar yang benar (.jpg, .png, .jepg)!',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '?url=tambah_warnet';
                    }
                })
            </script>";
    } else {
        move_uploaded_file($tmpName, $_SERVER['DOCUMENT_ROOT'] . '/projectgis/assets/img/upload/' . $namaFileBaru);

        $gambar = $namaFileBaru;

        // lakukan insert eksekusi query
        $query = mysqli_query($koneksi, "INSERT INTO tbl_warnet VALUES ('', '$nama_warnet', '$deskripsi', '$gambar', '$alamat', '$latitude', '$longtitude')");

        if ($query > 0) {
            echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Data berhasil ditambahkan!',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '?url=warnet'; 
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
                        window.location = '?url=warnet';
                    }
                })
            </script>";
        }
        exit;
    }
}
