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
} else {
    echo json_encode(["error" => "No locations found"]);
    exit;
}
$koneksi->close();

header('Content-Type: application/json');
echo json_encode($locations);


// mysqli_close($koneksi);
