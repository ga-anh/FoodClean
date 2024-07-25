<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
        margin: 0;
        padding: 0;
    }

    form {
        width: 60%;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    form input[type="text"],
    form input[type="number"],
    form select,
    form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    form input[type="file"] {
        margin-bottom: 20px;
    }

    form input[type="submit"] {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    form input[type="submit"]:hover {
        background-color: #444;
    }
</style>

<body>
    <?php
    // include_once("../model/sanpham.php");
    // include_once("../test/connect.php");
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $row = getById_SanPham($db, $id);
        $voucher = $row['voucher'];
        $giatri = $row['giatri'];

    }

    if (isset($_POST['btnSua'])) {
        $voucher = $_POST["txtvoucher"];
        $giatri = $_POST["txtgiatri"];


        $result = updateVoucher($db, $id, $voucher, $giatri);
        if ($result) {
            echo "Sửa thành công";


            header("location: ?ctrl=voucher");
        } else {
            echo "Sửa thất bại";
        }
    }

    ?>

    <form action="" method="post" enctype="multipart/form-data">
        Mã sản phẩm: <input type="text" value="<?php echo $id; ?>"><br>
        Tên sản phẩm: <input type="text" value="<?php echo $voucher; ?>" name="txtvoucher"><br>
        Giá: <input type="text" value="<?php echo $price; ?>" name="txtgiatri"><br>
       

        <input type="submit" name="btnSua" value="Sửa">
    </form>


</body>

</html>