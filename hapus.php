<?php
// Koneksi database
$koneksi = new mysqli("localhost", "root", "", "db_ti2b");
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

// Proses hapus data
$id = $_GET['id'];
$query = "DELETE FROM db_ilham WHERE id_portofolio = $id";

if ($koneksi->query($query)) {
  header("Location: index.php#Portofolio");
} else {
  echo "Error deleting record: " . $koneksi->error;
}

$koneksi->close();
?>