<?php
session_start();
include 'akses.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="https://codelatte.org/wp-content/uploads/2018/07/fixcil.png">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<body>
<?php
if($_SESSION['status'!="login"]){
    header("location:../index.php?pesan=belum_login");
}
?>
<?php 
if(isset($_SESSION['suksesupdate'])){
    unset($_SESSION['suksesupdate']);
 ?>
 <script type="text/javascript">
     swal("Sukses","Data Berhasil Diubah!","success");
 </script>
<?php } ?>

<?php 
if(isset($_SESSION['berhasil'])){
    unset($_SESSION['berhasil']);
 ?>
<script type="text/javascript">
    swal("Berhasil","","success");
</script>
 <?php } ?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a href="#" class="navbar-brand mb-0 h1"><span style="height: 7px; border-left: 3px solid green; margin-right: 7px"></span>Dashboard, <?php echo $_SESSION['username'] ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#kharisNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="kharisNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="../home/index.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<hr>
<p style="padding-left: 127px;">
<button class="btn btn-primary" id="tambahdata" data-toggle="modal" data-target="#exampleModalLong">Tambah</button>
</p>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<?php 
include '../koneksi.php';
 ?>
      <div class="modal-body">
        <form method="post" action="tambah_aksi.php">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl" class="form-control">
            </div>
            <div class="form-group">
                <label>Pendidikan</label>
                <input type="text" name="pendidikan" class="form-control">
            </div>
            <div class="form-group">
                <label>Pengalaman</label>
                <input type="text" name="pengalaman" class="form-control">
            </div>
            <div class="form-group">
                <label>Divisi</label>
                <select name="divisi" class="form-control">
                    <option value="">
                        Pilih Divisi
                    </option>
                <?php $jem = mysqli_query($koneksi,"SELECT * FROM divisi");
                while($jrem = mysqli_fetch_array($jem)){
                    echo "<option value= '$jrem[0]''>$jrem[1]</option>";
                }
                ?>
                </select>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<br>
<div class="container">
<table class="table table-striped table-bordered" id="data">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>TTL</th>
        <th>Pendidikan</th>
        <th>Pengalaman</th>
        <th>Divisi</th>
        <th>Action</th>
    </tr>
    </thead>
    <?php
    include '../koneksi.php';
    $no = 1;
    $data = mysqli_query($koneksi,"SELECT * from karyawan,divisi WHERE karyawan.id_divisi = divisi.id_divisi");
    while($d = mysqli_fetch_array($data)){
        ?>
        <tbody>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['nama']; ?></td>
            <td><?php echo $d['alamat']; ?></td>
            <td><?php echo $d['tgl']; ?></td>
            <td><?php echo $d['pendidikan']; ?></td>
            <td><?php echo $d['pengalaman']; ?></td>
            <td><?php echo $d['divisi']; ?></td>
            <td><a href="#" data-toggle="modal" data-target="#editmodal<?php echo $d['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
            <a href="hapus.php?ris=<?php echo $d['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
        </tr>

        <div class="modal fade" id="editmodal<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<?php 
include '../koneksi.php';
 ?>
      <div class="modal-body">
        <form method="post" action="edit_aksi.php">
            <?php 
            $id = $d['id'];
            $queryupdate = mysqli_query($koneksi,"SELECT id,nama,alamat,tgl,pendidikan,pengalaman,divisi.id_divisi,divisi.divisi FROM karyawan,divisi WHERE karyawan.id = '$id' AND karyawan.id_divisi = divisi.id_divisi ");
            while($kharis = mysqli_fetch_array($queryupdate)){
             ?>
             <input type="hidden" name="id_edit" value="<?php echo $kharis['id']; ?>">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama_edit" value="<?php echo $kharis['nama'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat_edit" value="<?php echo $kharis['alamat'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_edit" value="<?php echo $kharis['tgl'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Pendidikan</label>
                <input type="text" name="pendidikan_edit" value="<?php echo $kharis['pendidikan'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Pengalaman</label>
                <input type="text" name="pengalaman_edit" value="<?php echo $kharis['pengalaman'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Divisi</label>
                <select class="form-control" name="divisi_edit" value="<?php echo $kharis['id_divisi'] ?>">
                    <option><?php echo $kharis['divisi']?></option>
                <?php 
                $queryris = mysqli_query($koneksi,"SELECT * FROM divisi");
                    while($risquery = mysqli_fetch_array($queryris)){
                        echo "<option value='$risquery[0]'>$risquery[1]</option>";
                    }
                 ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <?php } ?>
        </form>
    
      </div>
    </div>
  </div>
</div>

        </tbody>
    <?php 
    }
    ?>
</table>
</div>
</body>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#data').DataTable();
    });
</script>
</html>