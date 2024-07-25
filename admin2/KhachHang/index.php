<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khách hàng</title>
    <script>
        function confirmDelete() {
            return confirm("Bạn có chắc muốn xóa khách hàng này không?");
        }
    </script>
    <style>
        /* Đặt kiểu cho bảng và các ô trong bảng */
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .heading {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td, th {
            border: 1px solid gray;
            padding: 10px;
            text-align: center;
        }
        td a {
            display: inline-block;
            padding: 5px 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        th a {
            display: inline-block;
            padding: 5px 10px;
            text-decoration: none;
            color: #333;
            border: 1px solid #333;
            border-radius: 5px;
            font-size: 1em;
        }

        th a:hover {
            background-color: #333;
            color: coral;
            
        }

        

        

        

        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        
        .delete-link {
            color: red;
        }
        .message {
            padding: 10px;
            font-weight: bold;
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
</head>
<body>
    <?php
    $rows_kh = khachhang_select_all();
    ?>
    <div class="heading">Quản Lý Khách Hàng</div>
    <table>
        <tr>
            <th>Mã khách hàng</th>
            <th>Tên Đăng Nhập</th>
            <th>Mật Khẩu</th>
            <th>Tên</th>

            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Role</th>
            <th>Thao tác</th>
        </tr>
        <?php
        foreach ($rows_kh as $kh) {
            $id = $kh['id'];
            $username = $kh['username'];
            $password = $kh['password'];
            $ten = $kh['ten'];
            $diachi = $kh['diachi'];
            $email = $kh['email'];
            $sodienthoai = $kh['dienthoai'];
            $role = $kh['role'];


            // You can display the image here if needed

            echo ("<tr>
                <td>$id</td>
                <td>$username</td>
                <td>$password</td>
                <td>$ten</td>
                <td>$email</td>
                <td>$diachi</td>
                <td>$sodienthoai</td>
                <td>$role</td>
                <td>
                    <a href='?ctrl=KhachHang&act=edit&id=$id'>Sửa</a>
                </td>
            </tr>");
        }
        ?>
    </table>
</body>
</html>