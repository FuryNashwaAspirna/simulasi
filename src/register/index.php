<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page | Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container-box">
        <h3>Register</h3>

        <form action="cek_register.php" method="POST">
            <label>Username</label>
            <input type="text" name="username" id="username" class="form-control"><br /> <br />

            <label>Password</label>
            <input type="password" name="password" id="password" class="form-control"><br /> <br />

            <label>Nama Lengkap</label>
            <input type="text" name="nama_user" id="nama_user" class="form-control"> <br /> <br />

            <label>Role</label>
            <select name="role" id="role" class="form-control">
                <option value="pembeli">Pembeli</option>
            </select> <br /> <br />


            <button type="submit">Daftar</button>
        </form>
    </div>



</body>

</html>