<?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
        extract($_SESSION['s_user']);
        $html_account='<a href="index.php?pg=trangcanhan">'.$username.'</a>';
    }else{
        $html_account='<a href="index.php?pg=dangky">ĐĂNG KÝ</a>
        <a href="index.php?pg=dangnhap">ĐĂNG NHẬP</a>';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOD-FC</title>
    <link rel="stylesheet" href="layout/css/style.css">
    <style>
        .dau{
            background-color: #c4551e;
        }

        .col9 {
            float: left;    
            width: 70%;
        }
        .col9 a{
            color: rgb(13, 15, 15);
        }

        .col3 {
            float: left;
            width: 30%;
        }
        .col3 input[type=text]{
            width: 50%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
          
            float: left;
        }
        .col3 input[type=submit] {
            width: 40%;
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
    </style>
</head>

<body>

    <div class="containerfull padd20 dau">
        <div class="container">
            <div class="logo col2"><img src="layout/images/Frame 249.png" alt=""></div>
            <div class="menu col8">
                <div class="col3">
                    <form action="index.php?pg=sanpham" method="post">
                        <input type="text" name="kyw" id="" placeholder="Nhập từ khóa tìm kiếm">
                        <input type="submit" name="timkiem" value="Tìm kiếm">
                    </form>
                </div>
                <div class="col9">
                    <a href="index.php">TRANG CHỦ</a>
                    <!-- <a href="index.php?pg=gioithieu">GIỚI THIỆU</a> -->
                    <a href="index.php?pg=sanpham">SẢN PHẨM</a>
                    <a href="index.php?pg=viewcart">GIỎ HÀNG</a>
                    <!-- <a href="index.php?pg=dichvu">DỊCH VỤ</a>
                    <a href="index.php?pg=lienhe">LIÊN HỆ</a> -->                
                    <?=$html_account?>
                    
                </div>  
                
                
            </div>
        </div>
    </div>

</body>
    