<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="admin.css">
  <link rel="stylesheet" type="text/css" href="./fontawesome/css/all.min.css">
  <title>ADMINISTRATOR</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
    <a class="navbar-brand" href="#">SELAMAT DATANG ADMIN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0 ml-auto">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <div class="icon ml-4">
        <h5>
          <i class="fas fa-envelope-square mr-3"></i>
          <i class="fas fa-bell-slash mr-3"></i>
          <i class="fas fa-sign-out-alt mr-3"></i>
        </h5>
      </div>
    </div>
  </nav>
  <div class="row no-gutters mt-5">
    <div class="col-md-2 bg-dark mt-4 pr-3 pt-4">
      <ul class="nav flex-column ml-3 mb-5">
        <li class="nav-item">
          <a class="nav-link active text-white" href=""><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href=""><i class="fas fa-user-graduate mr-2"></i>Daftar
            Mahasiswa</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href=""><i class="fas fa-users mr-2"></i>Daftar Pegawai</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href=""><i class="far fa-calendar-alt mr-2"></i>Jadwal Kuliah</a>
          <hr class="bg-secondary">
        </li>
      </ul>
    </div>
    <div class="col-md mt-5 p-2">
      <h1 class="text-center">Tambah Data Mahasiswa</h1>
      <table class="table table-striped table-bordered bg-primary">
        <thead>
          <tr>
            <td scope="col">NO</td>
            <td scope="col">NIM</td>
            <td scope="col">NAMA MAHASISWA</td>
            <td scope="col">ALAMAT</td>
            <td scope="col">JURUSAN</td>
            <td colspan="5" scope="col">AKSI</td>
          </tr>
        </thead>
        <?php
        include 'koneksi.php';
        $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) { ?>
          <tr>
            <td>
              <?php echo $no++ ?>
            </td>
            <td>
              <?php echo $data['nim'] ?>
            </td>
            <td>
              <?php echo $data['nama'] ?>
            </td>
            <td>
              <?php echo $data['alamat'] ?>
            </td>
            <td>
              <?php echo $data['jurusan'] ?>
            </td>
            <td>
              <i class="fa fa-edit bg-success p-2 text-white rounded"></i>
              <a href="#" data-bs-toggle="modal" data-bs-target="#nim<?php echo $data['nim']; ?>">
                edit</a>
              <i class="fa fa-trash-alt bg-danger p-2 text-white rounded"></i>
              <a href="hapus_mhs.php" data-bs-toggle="modal" data-bs-target="#deletemhs<?php echo $data['nim']; ?>"> delete</a>
            </td>
          </tr>

          <!-- Update Modal -->
          <div class="modal fade" id="nim<?php echo $data['nim']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Edit Data Mahasiswa</h3>
                </div>
                <div class="modal-body">
                  <form action="update_mhs.php" method="post">
                    <?php
                    $nim = $data['nim'];
                    $query1 = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
                    $data = mysqli_fetch_assoc($query1);
                    ?>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">NIM </label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="nim" value="<?php echo
                          $data['nim']; ?>" readonly></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">Nama Mahasiswa</label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="nama" value="<?php echo
                          $data['nama']; ?>"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">Alamat </label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="alamat" value="<?php echo
                          $data['alamat']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">Jurusan </label>
                        <div class="col-sm-8"><input type="text" name="jurusan" class="form-control" value="<?php echo
                          $data['jurusan']; ?>">
                          </input>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Delete modal -->
          <div class="modal fade" id="deletemhs<?php echo $data['nim']; ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                </div>
                <div class="modal-body">
                  <h5 align="center">Apakah anda yakin ingin menghapus
                    <?php echo
                      $data['nama']; ?><strong><span class="grt"></span></strong> ?
                  </h5>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <a href="hapus_mhs.php?nim=<?php echo $data['nim']; ?>" class="btn btn-primary">Delete</a>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
      </table>

      <a href="tambah_mhs.php" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahmhs"><i
          class="fa fa-plus-circle mr-2"></i> Tambah Mahasiswa</a>

      <!-- Simpan Modal -->
      <div class="modal fade" id="tambahmhs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Tambah Data Baru</h3>
            </div>
            <div class="modal-body">
              <form action="simpan_mhs.php" method="post" role="form">
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-3 control-label text-right">NIM</label>
                    <div class="col-sm-8"><input type="text" class="form-control" name="nim" placeholder="NIM" value="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-3 control-label text-right">Nama Mahasiswa</label>
                    <div class="col-sm-8"><input type="text" class="form-control" name="nama"
                        placeholder="NamaMahasiswa" value=""></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-3 control-label text-right">Alamat</label>
                    <div class="col-sm-8"><input type="text" class="form-control" name="alamat" placeholder="Alamat"
                        id="alamat" value="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-3 control-label text-right">Jurusan </label>
                    <div class="col-sm-8"><input type="text" name="jurusan" class="form-control" placeholder="Jurusan">
                      </input>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script src="js/bootstrap.min.js"></script>
    </div>
  </div>
</body>

</html>