<?php

// create connection
$koneksi = mysqli_connect('localhost', 'root', '', 'cyberwave');

// cek berhasil koneksi atau tidak?
if ($koneksi) {
    // echo "berhasil";
} else {
    die('Connection failed!: ' . mysqli_connect_error());
}
