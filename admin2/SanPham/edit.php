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
        $name = $row['name'];
        $price = $row['price'];
        $view = $row['view'];
        $bestseller = $row['bestseller'];
        $iddm = $row['iddm'];
        $img = $row['img'];
        

    }

    if (isset($_POST['btnSua'])) {
        $name = $_POST["txtName"];
        $price = $_POST["txtPrice"];
        $view = $_POST["txtview"];
        $bestseller = $_POST["textBestseller"];
        $iddm = $_POST["txtIddm"];
        $img = $_FILES['fileHinhAnh'];

        if ($_FILES['fileHinhAnh']['error'] === UPLOAD_ERR_OK) {
            $img = $_FILES['fileHinhAnh']['name']; // Tên gốc của file
            $hinhanh_tmp = $_FILES['fileHinhAnh']['tmp_name']; // Tên tạm thời lưu trữ trên server
            $img = time() . '_' . $img; // Đổi tên file để tránh trùng lặp
    
            // Di chuyển file đã upload vào thư mục lưu trữ hình ảnh
            move_uploaded_file($hinhanh_tmp, '../view/images/' . $img);
        } else {
            // If no new image was uploaded, keep the existing image name
            $img = $row[2];
        }


        $result = update_SanPham($db, $id, $name, $img, $price, $view, $bestseller, $iddm);
        if ($result) {
            echo "Sửa thành công";


            header("location: ?ctrl=SanPham");
        } else {
            echo "Sửa thất bại";
        }
    }

    $rows_loai = getAll_LoaiSP($db);
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        Mã sản phẩm: <input type="text" value="<?php echo $id; ?>"><br>
        Tên sản phẩm: <input type="text" value="<?php echo $name; ?>" name="txtName"><br>
        Giá: <input type="text" value="<?php echo $price; ?>" name="txtPrice"><br>
        View: <input type="number" name="txtview" value="<?php echo $view; ?>"><br>
        Danh Mục:
        <select name="txtIddm" value="<?php echo $iddm; ?>" >
            <?php
            // Hiển thị danh sách mã loại trong dropdown list
            foreach ($rows_loai as $loai) {
                echo "<option value='.$loai[0].'>$loai[0]-$loai[1]</option>";
            }
            ?>
        </select><br>
        
        Bestseller: <input type="text" name="textBestseller" value="<?php echo $bestseller; ?>"><br>
        Hình ảnh: <input type="file" name="fileHinhAnh"><br>

        <input type="submit" name="btnSua" value="Sửa">
    </form>

    <!-- List of Mã Loại options using table format -->

</body>

</html>