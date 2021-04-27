<?php
require('app.php');
if (!isset($_SESSION['username'])) {
    die("Anda belum login!");
}
if ($_SESSION['role'] != "user") {
    die("Anda bukan user");
}

if (empty($_SESSION["cart"] || isset($_SESSION["cart"]))) {
    echo "<script>alert('Keranjang kosong, silahkan berbelanja terlebih dahulu');</script>";
    echo "<script>location='index.php';</script>";
}

$totalBelanja = 0; ?>
<?php foreach ($_SESSION['cart'] as $name_produk => $result) : ?>

    <?php $data = queryData("SELECT * FROM product WHERE id = '$nama_produk'")[0];
    $totalHarga =  $result * $data["price"];
    ?>

<?php endforeach;





?>

<!DOCTYPE html>
<html lang=" en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link rel="stylesheet" href="user.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container-navbar">

        <div class="navbar">
            <div class="nav-logo">
                <h4>Store</h4>
            </div>
            <div class="nav-links" id="mobile-menu">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="cart.php">Cart</a>
                    </li>
                    <li>
                        <a>Welcome, <?php echo $_SESSION['username'] ?></a>
                    </li>
                    <li>
                        <a href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>







    </div>
    <div class="container">

        <div class="card-checkout" style="margin-top: 50px">
            <form action="" method="POST">
                <label>Nama Penerima</label>
                <input type="text" name="name" class="form-control" value="<?= $_SESSION['name']; ?>">

                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat">

                <label>No Telp</label>
                <input type="text" name="no_telp" class="form-control" id="no_telp">

                <label>Produk</label>
                <input type="text" name="name_product" value=" <?= $data["name_product"]; ?>" class="form-control">

                <label>Sub Total Harga</label>
                <input type="text" name="price" class="form-control" value="<?= $totalHarga =  $result * $data["price"]; ?>">

                <button type="submit" name="checkout" class="btn-checkout">Kirim</button>
            </form>
        </div>

    </div>
    <?php
    if (isset($_POST['checkout'])) {
        if (checkoutProduct($_POST) > 0) {
            echo "
                <script>
                    alert('Pembelian sukses!');
                    location='index.php';
                </script>
            ";
        } else {
            echo mysqli_error($dbconnect);
        }
    }

    ?>


    </div>





</body>

</html>