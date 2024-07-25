<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
        margin: 0;
        padding: 0;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
    }

    form input[type="text"],
    form input[type="number"],
    form select,
    form textarea,
    form input[type="file"],
    form input[type="submit"] {
        display: block;
        width: 100%;
        margin-bottom: 10px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    form textarea {
        resize: vertical;
    }

    form select {
        height: 35px;
    }

    form input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        cursor: pointer;
    }

    form input[type="submit"]:hover {
        background-color: #45a049;
    }

    .message {
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 3px;
    }

    .success {
        background-color: #d4edda;
        color: #155724;
    }

    .error {
        background-color: #f8d7da;
        color: #721c24;
    }
</style>

<body>
    <?php
    // include_once("../model/sanpham.php");
    // include_once("../test/connect.php");
    
    if (isset($_POST["btnThem"])) {
        $name = $_POST["txtName"];
        $price = $_POST["txtPrice"];
        $view = $_POST["txtview"];
        $bestseller = $_POST["txtBestseller"];
        $iddm = $_POST["txtIddm"];


        // Xử lý file hình ảnh upload
        $img = $_FILES['fileHinhAnh']['name']; // Tên gốc của file
        $hinhanh_tmp = $_FILES['fileHinhAnh']['tmp_name']; // Tên tạm thời lưu trữ trên server
        $img = time() . '_' . $img; // Đổi tên file để tránh trùng lặp
    
        // Di chuyển file đã upload vào thư mục lưu trữ hình ảnh
        move_uploaded_file($hinhanh_tmp, '../view/images/' . $img);

        $result = add_SanPham($db, $name, $img, $price, $view, $bestseller, $iddm);
        if ($result == false) {
            echo "Thêm thất bại";
        } else {
            echo "Thêm thành công";
            header("location: ?ctrl=SanPham");
        }
    }

    $rows_loai = getAll_LoaiSP($db);
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        Tên sản phẩm: <input type="text" name="txtName"><br>
        Giá: <input type="text" name="txtPrice"><br>
        View: <input type="text" name="txtview"><br>
        Danh Mục:
        <select name="txtIddm">
            <?php
            // Hiển thị danh sách mã loại trong dropdown list
            foreach ($rows_loai as $loai) {
                echo "<option value=\"$loai[0]\">$loai[0] - $loai[1]</option>";
            }
            ?>
        </select><br>
        Bestseller: <input type="text" name="txtBestseller"><br>
        Hình ảnh: <input type="file" name="fileHinhAnh"><br>
        <input type="submit" name="btnThem" value="Thêm">
    </form>

    <!-- List of Mã Loại options using table format -->
</body>

</html>