<?php
session_start();

$name_produk = $_GET["id"];


if (isset($_SESSION["cart"][$name_produk])) {
    $_SESSION["cart"][$name_produk] += 1;
} else {
    $_SESSION["cart"][$name_produk] = 1;
}
echo "<script>alert('Produk telah ditambahkan ke keranjang belanja')</script>";
echo "<script>location='cart.php'</script>";
