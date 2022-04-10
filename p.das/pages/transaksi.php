<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Transaksi &mdash; Car Wash</title>

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
      include 'navbar.php';

      session_start();
      if (isset($_POST['pilih'])) {
        $_SESSION['post'] = [$_POST['paket'], $_POST['harga']];
      }
      ?>

      <!-- Main Content -->
      <div class="main-content">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label>No. Transaksi</label>
                  <input type="text" class="form-control" name="no-transaksi" value="<?= mt_rand() ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Tanggal Transaksi</label>
                  <input type="date" class="form-control" name="tanggal">
                </div>
                <div class="form-group">
                  <label>Nama Customer</label>
                  <input type="text" class="form-control" name="nama-customer">
                </div>
                <div class="form-group">
                  <label>Pilihan Paket</label>
                  <input type="text" class="form-control" name="pilihan-paket" value="<?= $_SESSION['post'][0] ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Harga Paket</label>
                  <input type="text" class="form-control" name="harga" id="harga" value="<?= $_SESSION['post'][1] ?>" readonly>
                </div>
                <div class="form-group">
                  <div class="form-check mt-3">
                    <input class="form-check-input" type="radio" name="tambahan" value="0" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      Tidak ada tambahan - Rp. 0
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="tambahan" value="10000">
                    <label class="form-check-label" for="exampleRadios2">
                      Wax - Rp. 10.000
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="tambahan" value="20000">
                    <label class="form-check-label" for="exampleRadios2">
                      Fogging - Rp. 20.000
                    </label>
                  </div>
                </div>
                <button type="button" class="btn btn-md btn-primary" onclick="hitungTotal()">Hitung Total</button>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Total Harga</label>
                  <input type="text" class="form-control" name="total-harga" id="total-harga" readonly>
                </div>
                <div class="form-row align-items-center">
                  <div class="col-sm-6 my-1">
                    <label>Pembayaran</label>
                    <input type="text" class="form-control" name="pembayaran" id="pembayaran">
                  </div>
                  <div class="col-sm-6 my-1">
                    <label>Kembalian</label>
                    <input type="text" class="form-control" name="kembalian" id="kembalian" readonly>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <button type="button" class="btn btn-md btn-primary mr-2" onclick="hitungKembalian()">Hitung Kembalian</button>
                  <button type="button" class="btn btn-md btn-primary" onclick="simpanTransaksi()">Simpan Transaksi</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">

          </div>
        </div>
      </div>

      <?php include 'footer.php' ?>
    </div>
  </div>

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