<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Transaksi &mdash; Car Wash</title>
  <link rel="shortcut icon" href="../assets/img/car-wash.png" type="image/x-icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <?php
      session_start();
      if (!$_SESSION['id']) {
        header('location: ../index.php');
      }
      include 'navbar.php';
      include '../config/connect.php';

      $result = mysqli_query($con, "SELECT * FROM tbuser WHERE iduser = '$_SESSION[id]'");
      $data = mysqli_fetch_array($result);
      ?>

      <!-- Main Content -->
      <div class="main-content">
        <div class="card">
          <div class="card-body">
            <h3>Profil</h3>
            <form action="" method="POST" class="col-lg-6">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control">
              </div>
              <button type="submit" name="simpan" class="btn btn-sm btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>

      <?php include 'footer.php' ?>
    </div>
  </div>

  <?php
  if (isset($_POST['simpan'])) {
    $username = $_POST['username'];

    $result = mysqli_query($con, "UPDATE tbuser SET username = '$username' WHERE iduser = '$_SESSION[id]'");

    if ($result) {
      echo "<script>alert('Data berhasil diupdate'); window.location='profil.php'</script>";
    }
  }
  ?>

  <script>
    // Hitung Total Harga
    function hitungTotal() {
      const harga = parseInt(document.querySelector('#harga').value);
      const tambahan = parseInt(document.querySelector('input[name=tambahan]:checked').value);

      const total = harga + tambahan;
      document.querySelector('#total-harga').value = total;
    }

    // Hitung Uang Kembalian
    function hitungKembalian() {
      const total = parseInt(document.querySelector('#total-harga').value);
      const pembayaran = parseInt(document.querySelector('#pembayaran').value);

      if (pembayaran >= total) {
        const kembalian = pembayaran - total;
        document.querySelector('#kembalian').value = kembalian;
      } else {
        alert('Uang tidak cukup!');
      }
    }

    // Simpan Transaksi
    function simpanTransaksi() {
      alert('Transaksi Berhasil');
      window.location = 'home.php';
    }
  </script>
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>

</html>