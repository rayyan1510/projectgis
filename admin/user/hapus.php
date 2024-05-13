<?php

$id_user = $_GET['id'];
$result = mysqli_query($koneksi, "DELETE FROM tbl_user WHERE id_user = '$id_user'");

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
                window.location = '?url=table_user'; 
            }
        })
    </script>";
} else {
    echo "<script>
        alert('Data Gagal di hapus');
        window.location.href = '?url=table_user';
    </script>";
}

mysqli_close($koneksi);
