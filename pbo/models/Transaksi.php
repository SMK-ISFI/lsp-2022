<?php

class Transaksi
{
  public function __construct()
  {
    $this->con = mysqli_connect("localhost", "root", "", "db_carwash");
  }

  public function tampil_transaksi()
  {
    return mysqli_query($this->con, "SELECT * FROM tbtransaksi INNER JOIN tbpaketcuci ON tbtransaksi.idpaketcuci = tbpaketcuci.idpaket");
  }
}
