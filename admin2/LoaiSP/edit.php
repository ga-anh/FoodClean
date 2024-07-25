<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px;
    }

    form {
        width: 60%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        display: block;
        width: 100%;
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px;
        text-decoration: none;
        margin-top: 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #444;
    }
</style>

<body>
    <?php

    $ma = "";
    $ten = "";
    $home = 0; // Giá trị mặc định cho cột 'home'
    $stt = 0; // Giá trị mặc định cho cột 'stt'
    
    if (isset($_GET['id'])) {
        $ma = $_GET['id'];
        $row = getById_LoaiSP($db, $ma);
        $ten = $row['name'];
        $home = $row['home'];
        $stt = $row['stt'];
    }

    // Xử lý dữ liệu khi nút "Thêm" hoặc "Sửa" được nhấn
    if (isset($_POST["btnThem"]) || isset($_POST["btnSua"])) {
        $ma = $_POST["txtMa"];
        $ten = $_POST["txtTen"];
        $home = $_POST["txtHome"]; // Lấy giá trị từ trường 'home' trong biểu mẫu
        $stt = $_POST["txtStt"]; // Lấy giá trị từ trường 'stt' trong biểu mẫu
        $result = update_LoaiSP($db, $ma, $ten, $home, $stt);
        

        if ($result) {
            echo "<div class='message success'>Thành công</div>";
            header("location: ?ctrl=LoaiSP");
        } else {
            echo "<div class='message error'>Thất bại</div>";
            header("location: ?ctrl=LoaiSP");
        }
    }
    ?>

    <form action="" method="post">
        Mã danh mục: <input type="text" value="<?php echo $ma; ?>" name="txtMa" readonly><br>
        Tên danh mục: <input type="text" name="txtTen" value="<?php echo $ten; ?>" required><br>
        Home:
        <select name="txtHome" required>
            <option value="1" <?php if ($home == 1) echo 'selected'; ?>>Có</option>
            <option value="0" <?php if ($home == 0) echo 'selected'; ?>>Không</option>
        </select><br>
        STT: <input type="number" name="txtStt" value="<?php echo $stt; ?>" required><br>
        <input type="submit" name="btnSua" value="Sửa">
    </form>
</body>

</html>