<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// hanya admin & operator yang bisa akses tambah
if ($_SESSION['level'] != "admin" && $_SESSION['level'] != "operator") {
    echo "❌ Anda tidak punya akses ke halaman ini!";
    exit;
}

include "page/header.php";
include "page/navbar.php";
include "page/sidebar.php";
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Hewan</h1>
          </div>
          <div class="col-sm-6 text-right">
            <a href="hewan.php" class="btn btn-secondary">⬅ Kembali</a>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header bg-success text-white">
          <h3 class="card-title">Form Tambah Hewan</h3>
        </div>

        <form action="" method="POST">
          <div class="card-body">
            <div class="form-group">
              <label>Nama Hewan</label>
              <input type="text" name="nama_hewan" class="form-control" placeholder="Masukkan Nama Hewan" required>
            </div>
            <div class="form-group">
              <label>Jenis Hewan</label>
              <input type="text" name="jenis_hewan" class="form-control" placeholder="Masukkan Jenis Hewan" required>
            </div>
            <div class="form-group">
              <label>Asal</label>
              <input type="text" name="asal" class="form-control" placeholder="Masukkan Asal" required>
            </div>
            <div class="form-group">
              <label>Jumlah</label>
              <input type="number" name="jumlah" class="form-control" placeholder="Masukkan Jumlah" required>
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" name="simpan" class="btn btn-success">💾 Simpan</button>
            <a href="hewan.php" class="btn btn-danger">❌ Batal</a>
          </div>
        </form>
      </div>
    </section>
  </div>
</div>

<?php include "page/footer.php"; ?>
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>
<script src="assets/dist/js/demo.js"></script>
</body>
</html>

<?php
// proses simpan data
include "koneksi.php";
if (isset($_POST['simpan'])) {
  $nama   = $_POST['nama_hewan'];
  $jenis  = $_POST['jenis_hewan'];
  $asal   = $_POST['asal'];
  $jumlah = $_POST['jumlah'];

  $query = "INSERT INTO db_bale (nama_hewan, jenis_hewan, asal, jumlah) 
            VALUES ('$nama','$jenis','$asal','$jumlah')";
  mysqli_query($koneksi, $query);

  echo "<script>alert('Data berhasil disimpan!');window.location='hewan.php';</script>";
}
?>
