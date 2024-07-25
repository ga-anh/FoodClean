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
   
   if(isset($_POST["btnThem"])){
    // Lấy dữ liệu được nhập từ biểu mẫu
    $ten = $_POST["txtTen"];

    // Thực hiện thêm loại sản phẩm vào cơ sở dữ liệu
    $result = add_LoaiSP($db, $ten);

    if($result == false){
        
        echo "<div class='message error'>Thêm thất bại</div>";
    } else {
        echo "<div class='message success'>Thêm thành công</div>";
        header("location: ?ctrl=LoaiSP");
    }
}
?>

<form action="" method="post">
    Tên Loại: <input type="text" name="txtTen" required><br>
    <input type="submit" name="btnThem" value="Thêm">
</form>
</body>
</html>