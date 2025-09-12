<?php
include 'koneksi.php';
$id = intval($_GET['id']); 
mysqli_query($koneksi, "DELETE FROM db_bale WHERE id_hewan = $id");
header("Location: hewan.php");
exit();
?>
