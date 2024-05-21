<?php

include './connection.php';
// $queryLocation = mysqli_query($koneksi, "SELECT id_warnet, nama_warnet, latitude, longitude FROM tbl_warnet");
$result = $koneksi->query("SELECT id_warnet, nama_warnet, latitude, longitude FROM tbl_warnet");
// $resultquery = mysqli_fetch_assoc($queryLocation);

// numrows berapa banyak data
// $result = mysqli_num_rows($queryLocation);

$locations = [];
if ($result->num_rows  > 0) {
    while ($row = $result->fetch_assoc()) {
        # code...
        $locations[] = $row;
    }
    // $data = json_encode(array('results' => $locations));
    // echo $data;
} else {
    echo json_encode(["error" => "No locations found"]);
    exit;
    // echo "0 Hasil";
}
$koneksi->close();

header('Content-Type: application/json');
echo json_encode($locations);

// echo $data;
// var_dump($locations);
// echo $locations;


// mysqli_close($koneksi);
