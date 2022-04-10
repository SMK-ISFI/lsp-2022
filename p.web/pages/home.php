<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Home &mdash; Car Wash</title>
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
      ?>

      <!-- Main Content -->
      <div class="main-content">
        <section id="hero">
          <div class="row">
            <div class="col-lg-6">
              <h1 class="mt-5">Car Wash <br>SMK ISFI Banjarmasin</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam cum id consequuntur cupiditate dignissimos minus at totam ab blanditiis neque facilis, molestiae beatae veniam quo.</p>

              <a href="#paket" class="btn btn-md btn-primary px-5">Pilih Paket</a>
            </div>
            <div class="col-lg-6">
              <img src="../assets/img/car-wash.png" alt="" class="img-fluid mx-auto d-block" width="400">
            </div>
          </div>
        </section>

        <section id="paket">
          <h3 class="my-2">Daftar Paket Cuci Mobil</h3>
          <div class="row">
            <?php
            require '../config/connect.php';

            $results = mysqli_query($con, "SELECT * FROM tbpaketcuci");

            while ($data = mysqli_fetch_array($results)) {
              echo "
            <div class='col-md-3'>
              <div class='card card-primary my-2 h-100'>
                <div class='card-body'>
                  <h6>$data[namapaket]</h6>
                  <p>$data[deskripsi]</p>
                </div>
                <div class='card-footer'>
                  <h5>Rp. " . number_format($data['harga'], '0', ',', ',') . "</h5>
                  <form action='transaksi.php' method='POST'>
                    <input type='hidden' name='id' value='$data[idpaket]'>
                    <input type='hidden' name='paket' value='$data[namapaket]'>
                    <input type='hidden' name='harga' value='$data[harga]'>
                    <button type='submit' name='pilih' class='btn btn-sm btn-primary w-100'>Pilih</button>
                  </form>
                </div>
              </div>
            </div>";
            }
            ?>

          </div>
        </section>
      </div>




      <?php include 'footer.php' ?>
    </div>
  </div>

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