<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin khách hàng</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
        margin: 0;
        padding: 0;
    }

    form {
        width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    form input[type="text"],
    form input[type="email"],
    form input[type="password"],
    form input[type="number"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    form input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    form input[type="submit"]:hover {
        background-color: #444;
    }

    .error-message {
        color: red;
    }
</style>

<body>
    <?php
    

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $row = khachhang_select_by_id($id);
        $username = $row['tendn']; // Updated to use column names
        $password = $row['pass']; // Updated to use column names
        $ten = $row['ten']; // Updated to use column names
        $diachi = $row['diachi']; // Updated to use column names
        $dienthoai = $row['dienthoai']; // Updated to use column names
        $email = $row['email']; // Updated to use column names
        $role = $row['role']; // Updated to use column names
    }

    if (isset($_POST['btnSua'])) {
        $username = $_POST['txtTendn'];
        $password = $_POST['txtPass'];
        $ten = $_POST['txtTen'];

        // Image handling remains the same
        // if ($_FILES['fileHinhAnh']['error'] === UPLOAD_ERR_OK) {
        //     $hinhanh = $_FILES['fileHinhAnh']['name'];
        //     $hinhanh_tmp = $_FILES['fileHinhAnh']['tmp_name'];
        //     $hinhanh = time() . '_' . $hinhanh;
        //     move_uploaded_file($hinhanh_tmp, '../view/images/' . $hinhanh);
        // } else {
        //     $hinhanh = $row['hinhanh']; // Keep the existing image name
        // }

        $diachi = $_POST['txtDiaChi'];
        $dienthoai = $_POST['txtSoDienThoai'];
        $email = $_POST['txtEmail'];
        $role = $_POST['txtRole'];

        // Updated to use the user_update function
        $result = khachhang_update($id, $username, $password, $ten, $diachi, $dienthoai, $email, $role);

        if ($result) {
            echo "Cập nhật thông tin khách hàng thành công";
            header("location: ?ctrl=KhachHang");
        } else {
            echo "Cập nhật thông tin khách hàng thành công";
            header("location: ?ctrl=KhachHang");
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label>Tên đăng nhập:</label>
        <input type="text" value="<?php echo $username; ?>" name="txtTendn" required>

        <label>Mật khẩu:</label>
        <input type="password" value="<?php echo $password; ?>" name="txtPass" required>

        <label>Tên khách hàng:</label>
        <input type="text" value="<?php echo $ten; ?>" name="txtTen" required>

        <label>Địa chỉ:</label>
        <input type="text" value="<?php echo $diachi; ?>" name="txtDiaChi">

        <label>Email:</label>
        <input type="email" value="<?php echo $email; ?>" name="txtEmail" required>

        <label>Số điện thoại:</label>
        <input type="number" value="<?php echo $dienthoai; ?>" name="txtSoDienThoai" maxlength="10" required>

        <label>Vai trò:</label>
        <input type="number" value="<?php echo $role; ?>" name="txtRole" required>

        <input type="submit" name="btnSua" value="Sửa">
    </form>
</body>

</html>