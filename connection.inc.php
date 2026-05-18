<?php
    session_start();
    $con = mysqli_connect("127.0.0.1", "root", "", "ecom", 3310);
    define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'].'/ecom/');
    define('SITE_PATH', 'http://localhost:8084/ecom/');
    define("TITLE", "ONLINE STORE");
    define('PRODUCT_IMAGE_SERVER_PATH', SERVER_PATH.'media/product/');
    define('PRODUCT_IMAGE_SITE_PATH', SITE_PATH.'media/product/');
?>