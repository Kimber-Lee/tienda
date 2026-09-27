<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $desdeCarrito = isset($_SERVER['HTTP_REFERER']) && str_contains($_SERVER['HTTP_REFERER'], 'carrito.php');

    if ($desdeCarrito) {
        unset($_SESSION['carrito'][$id]);
        header('Location: ../carrito.php');
    } else {
        $_SESSION['carrito'][$id] = ($_SESSION['carrito'][$id] ?? 0) + 1;
        header('Location: ../index.php');
    }
    exit();
}

if (isset($_GET['vaciar'])) {
    unset($_SESSION['carrito']);
    header('Location: ../index.php');
    exit();
}

header('Location: ../index.php');
exit();