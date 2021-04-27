<?php

require('app.php');

if (empty($_SESSION["cart"] || isset($_SESSION["cart"]))) {
    echo "<script>alert('Keranjang kosong, silahkan berbelanja terlebih dahulu');</script>";
    echo "<script>location='index.php';</script>";
}
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


    <div class="container">

        <?php foreach ($_SESSION["cart"] as $id_produk => $hasil) : ?>
            <?php
            $data = queryData("SELECT * FROM produk WHERE id_produk = $id_produk")[0];
            $subtotalHarga = $hasil * $data["price"];

            ?>

            <div class="card-cart">
                <img src="foto/<?php echo $data['foto']; ?>" width="20%" alt="">
                <div class="child-cart">
                    <h4><?php echo $data['id_produk']; ?></h4>
                    <h4>Harga Rp <?= number_format($data["price"]); ?></h4>
                    <h4 style="margin-top: 10px;">Total Harga: Rp <?= number_format($subtotalHarga); ?></h4>

                    <h4 style="margin-top: 10px; margin-bottom: 20px;"><?php echo $_SESSION['username']; ?></h4>

                    <a href="cart-delete.php?id=<?= $data["id"]; ?>" class="cart-delete">Hapus</a>
                    <a href="checkout.php" class="checkout">Checkout Product</a>

                </div>
            </div>
        <?php endforeach; ?>
    </div>




</body>

</html>