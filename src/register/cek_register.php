<?php

require '../koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$nama_user = $_POST['nama_user'];
$role = $_POST['role'];

$query = mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$username', '$password', '$nama_user', '$role')");

if ($query) {
    echo '
    <script type="text/javascript">
    alert("Register berhasil, silahkan login!");
    window.location = "../login/index.php";
    </script>
    ';
}
