<?php

class User
{
  public function __construct()
  {
    $this->con = mysqli_connect("localhost", "root", "", "db_carwash");
  }

  public function login($username)
  {
    return mysqli_query($this->con, "SELECT * FROM tbuser WHERE username = '$username'");
  }

  public function tampil_user($id = null)
  {
    if ($id !== null) {
      return mysqli_query($this->con, "SELECT * FROM tbuser WHERE iduser = '$id'");
    } else {
      return mysqli_query($this->con, "SELECT * FROM tbuser");
    }
  }

  public function tambah_user($username, $password)
  {
    return mysqli_query($this->con, "INSERT INTO tbuser(username, password) VALUES ('$username','$password')");
  }

  public function edit_user($id, $username)
  {
    return mysqli_query($this->con, "UPDATE tbuser SET username = '$username' WHERE iduser = '$id'");
  }

  public function hapus_user($id)
  {
    return mysqli_query($this->con, "DELETE FROM tbuser WHERE iduser = '$id'");
  }
}
