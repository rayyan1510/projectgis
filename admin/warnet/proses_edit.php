<?php


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['edit']) === true) {
    # code...
    $id_warnet = htmlspecialchars($_POST['id_warnet']);
    $gambarLama = htmlspecialchars($_POST['gambarLama']);

    $nama_warnet = htmlspecialchars($_POST['nama']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $latitude = htmlspecialchars($_POST['latitude']);
    $longitude = htmlspecialchars($_POST['longitude']);

    // var_dump($_POST);
    // var_dump($_FILES);
    $namaFile = $_FILES['gambar']['name'];
    $errorFile = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah gambar mau diubah
    if ($errorFile === 4) {

        // jika gambar tidak mau diubah
        $gambar = $gambarLama;
    } else {
        # jika gambarnya mau diubah.
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
                        window.location = '?url=edit_warnet&id=$id_warnet';
                    }
                })
            </script>";
            exit;
        } else {
            // jika yang dipilih adalah gambar
            move_uploaded_file($tmpName, $_SERVER['DOCUMENT_ROOT'] . '/projectgis/assets/img/upload/' . $namaFileBaru);
            $gambar = $namaFileBaru;
        }
    }

    // setelah melakukan pengcekan
    // lakukan insert eksekusi query
    $query = mysqli_query($koneksi, "UPDATE `tbl_warnet` SET nama_warnet = '$nama_warnet', deskripsi = '$deskripsi', gambar = '$gambar', alamat = '$alamat', latitude = '$latitude', longitude = '$longitude' WHERE id_warnet = '$id_warnet'");

    if ($query > 0) {
        echo "<script>
                    Swal.fire({
                        title: 'Success!',
                        text: 'Data berhasil diubah!',
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
                        text: 'Data gagal diubah!',
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
