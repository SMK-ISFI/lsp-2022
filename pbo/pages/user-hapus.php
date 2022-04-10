<?php
session_start();
if (!$_SESSION['id']) {
  header('location: ../index.php');
}
include '../models/User.php';
$user = new User();
$result = $user->hapus_user($_GET['id']);

if ($result) {
  echo "<script>alert('Data berhasil dihapus'); window.location='user.php'</script>";
} else {
  echo "<script>alert('Data gagal dihapus'); window.location='user.php'</script>";
}
