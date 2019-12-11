<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="shortcut icon" href="https://codelatte.org/wp-content/uploads/2018/07/fixcil.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<body class="bg-primary">
<?php
if(isset($_SESSION['noback'])){
    unset($_SESSION['noback']);
?>
<script>
    swal("Anda bukan admin","","error");
</script>
<?php
}
?>

<?php
if(isset($_SESSION['pesan'])){
    unset ($_SESSION['pesan']);
?>
<script>
    swal("username dan password salah!","","info");
</script>
<?php
}
?>
<br>
<br>
<div class="text-center">
<form id="form" action="cek_login.php" method="post" class="form-group jumbotron">
    <img src="https://pngimage.net/wp-content/uploads/2018/06/logo-login-png-7.png" width="125px" height="125px">
    <br><label>Username</label>
    <input type="text" name="username" placeholder="Username" class="form-control">
    <label>Password</label>
    <input type="password" name="password" placeholder="Password" class="form-control">
    <br><input type="submit" class="btn btn-success" value="LOGIN">
</form><br>
</div>
<style>
#form {
    padding-top: 0;
    position: relative;
    margin: auto;
    width: 400px;
    margin-top:100px
}
</style>
</body>
</html>