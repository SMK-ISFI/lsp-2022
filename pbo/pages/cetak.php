<?php
session_start();
if (!$_SESSION['id']) {
  header('location: ../index.php');
}
include '../models/Transaksi.php';
// Object dari class Transaksi
$transaksi = new Transaksi();
$results = $transaksi->tampil_transaksi();

$content = '';
$content .= '
  <h1>Daftar Riwayat Transaksi</h1>
  <table border="1" cellspacing="0" cellspadding="0" width="100%">
    <thead>
      <tr>
      <th>No. Transaksi</th>
      <th>Tanggal Transaksi</th>
      <th>Paket Cuci</th>
      <th>Total Harga</th>
      <th>Pembayaran</th>
      <th>Kembalian</th>
      <th>Paket Tambahan</th>
      </tr>
    </thead>
    <tbody>';
while ($data = mysqli_fetch_array($results)) {
  $content .= "
    <tr>
      <td>$data[idtransaksi]</td>
      <td>$data[tgltransaksi]</td>
      <td>$data[namapaket]</td>
      <td>Rp. " . number_format($data['totalharga'], '0', ',', ',') . "</td>
      <td>Rp. " . number_format($data['pembayaran'], '0', ',', ',') . "</td>
      <td>Rp. " . number_format($data['kembalian'], '0', ',', ',') . "</td>
      <td>$data[namapakettambahan]</td>
    </tr>
    ";
}
$content .=  '
    </tbody>
  </table>';

require_once '../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($content);
$mpdf->Output();
