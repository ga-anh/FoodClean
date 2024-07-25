<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css_1/index.css">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        nav{
            display: flex;
            flex-direction: column;
        }
        nav a{
            text-decoration: none;
            color: blue;
            font-weight: bold;
            border:2px solid black ;
            margin-top: 3px;
            width: 500px;
            font-size: 2em;
            
        }
    </style>
</head>

<body>
    <header>
        <h1>Trang Quản Lý</h1>
    </header>
    <nav>
        <a href="?ctrl=LoaiSP">Quản Lý Loại Sản Phẩm</a>
        <a href="?ctrl=SanPham">Quản Lý Sản Phẩm</a>
        <a href="?ctrl=KhachHang">Quản Lý Khách Hàng</a>
        <a href="?ctrl=voucher">Voucher</a>
    </nav>
    <article>
        <?php
        include_once("model/connect.php");
        include_once("model/sanpham.php");
        include_once("model/LoaiSP.php");
        include_once("model/pdo.php");
        include_once("model/khachHang.php");
        include_once("model/voucher.php");
        // include_once("../dao/pdo.php");
        
        // include_once("../dao/danhmuc.php");
        
        
        if (isset($_GET['ctrl'])) {
            $ctrl = $_GET['ctrl'];
        } else {
            $ctrl = "";
        }
        if (isset($_GET['act'])) {
            $act = $_GET['act'];
        } else {
            $act = "";
        }
        if ($act != "") {
            include_once("./$ctrl/$act.php");
        } else {
            if ($ctrl != "") {
                include_once("./$ctrl/index.php");
            } else {
                // include_once("./SanPham/index.php");
                echo "<h1>Đây Là Trang Mặc Định</h1>";
            }
        };


        ?>

    </article>


</body>

</html>