<?php

$id_warnet = $_GET['id'];

$queryCariGambar = mysqli_query($koneksi, "SELECT * FROM `tbl_warnet` WHERE id_warnet = '$id_warnet'");
$resultCariGambar = mysqli_fetch_assoc($queryCariGambar);
$dataGambar = $resultCariGambar['gambar'];
$path = $_SERVER['DOCUMENT_ROOT'] . '/projectgis/assets/img/upload/' . $dataGambar;


$result = mysqli_query($koneksi, "DELETE FROM tbl_warnet WHERE id_warnet = '$id_warnet'");
unlink($path);


if ($result > 0) {
    echo "<script>
        Swal.fire({
            title: 'Success!',
            text: 'Data berhasil dihapus!',
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
        alert('Data Gagal di hapus');
        window.location.href = '?url=warnet';
    </script>";
}

mysqli_close($koneksi);
