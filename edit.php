<?php
session_start();
include "koneksi.php";

// Cek login & level (hanya admin & operator yang bisa edit)
if (!isset($_SESSION['username']) || !in_array($_SESSION['level'], ['admin','operator'])) {
    header("Location: hewan.php");
    exit();
}

// Ambil ID dari URL dan validasi
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    header("Location: hewan.php");
    exit();
}

// Ambil data hewan berdasarkan ID
$result = $koneksi->query("SELECT * FROM db_bale WHERE id_hewan=$id");
if ($result->num_rows == 0) {
    header("Location: hewan.php");
    exit();
}
$data = $result->fetch_assoc();

// Proses update saat form disubmit
if (isset($_POST['simpan'])) {
    $nama_hewan  = $koneksi->real_escape_string($_POST['nama_hewan']);
    $jenis_hewan = $koneksi->real_escape_string($_POST['jenis_hewan']);
    $asal        = $koneksi->real_escape_string($_POST['asal']);
    $jumlah      = intval($_POST['jumlah']);

    $query = "UPDATE db_bale SET 
                nama_hewan='$nama_hewan', 
                jenis_hewan='$jenis_hewan', 
                asal='$asal',
                jumlah=$jumlah
              WHERE id_hewan=$id";

    if ($koneksi->query($query)) {
        header("Location: hewan.php?status=success");
        exit();
    } else {
        $error = "Gagal update: " . $koneksi->error;
    }
}
?>

<?php include "page/header.php"; ?>
<?php include "page/navbar.php"; ?>
<?php include "page/sidebar.php"; ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Hewan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="hewan.php">Data Hewan</a></li>
              <li class="breadcrumb-item active">Edit Hewan</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php if (isset($error)) { ?>
          <div class="alert alert-danger"><?= $error ?></div>
        <?php } ?>

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Edit Hewan</h3>
          </div>
          <div class="card-body">
            <form method="post">
              <div class="form-group">
                <label for="nama_hewan">Nama Hewan</label>
                <input type="text" name="nama_hewan" id="nama_hewan" class="form-control" 
                       value="<?= htmlspecialchars($data['nama_hewan']) ?>" required>
              </div>
              <div class="form-group">
                <label for="jenis_hewan">Jenis Hewan</label>
                <input type="text" name="jenis_hewan" id="jenis_hewan" class="form-control" 
                       value="<?= htmlspecialchars($data['jenis_hewan']) ?>" required>
              </div>
              <div class="form-group">
                <label for="asal">Asal</label>
                <input type="text" name="asal" id="asal" class="form-control" 
                       value="<?= htmlspecialchars($data['asal']) ?>" required>
              </div>
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" 
                       value="<?= htmlspecialchars($data['jumlah']) ?>" required>
              </div>
              <button type="submit" name="simpan" class="btn btn-primary">💾 Simpan</button>
              <a href="hewan.php" class="btn btn-secondary">🔙 Batal</a>
            </form>
          </div>
        </div>
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
