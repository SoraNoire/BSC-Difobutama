<?php
//melakukan koneksi ke database
$conn = new mysqli("localhost","dmballan","SR@DM-bsc$123","dmballan_ballancescorecard");
if ($conn->connect_errno) {
    echo die("Failed to connect to MySQL: " . $conn->connect_error);
}
?>