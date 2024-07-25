<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Loại Sản Phẩm</title>
    <script>
        function confirmDelete() {
            return confirm("Bạn có chắc muốn xóa dữ liệu này không?");
        }
    </script>
    <style>
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

        .add-link {
            margin-bottom: 10px;
        }

        .add-link{
            
            color: #fff;
            text-decoration: none;
        }

        

        .confirm-delete {
            
            cursor: pointer;
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

        td a:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_GET["id"])) {
        $ma = $_GET["id"];
        $sql = "DELETE FROM danhmuc WHERE  id = $ma";
        $result = $db->exec($sql);
    }
    $rows_l = getAll_LoaiSP($db);
    ?>
    <div class="heading">Quản Lý Loại Sản Phẩm</div>
    <table>
        <tr>
            <th>Mã loại</th>
            <th>Tên loại</th>
            <th>Home</th>
            <th>STT</th>
            <th><a href="?ctrl=LoaiSP&act=add" class="add-link">Thêm loại</a></th>
        </tr>
        <?php
        foreach ($rows_l as $v) {
            echo ("<tr>
                <td>$v[0]</td>
                <td>$v[1]</td>
                <td>" . ($v[2] == 1 ? "Có" : "Không") . "</td>
                <td>$v[3]</td>
                <td>
                    <a href='?ctrl=LoaiSP&act=edit&id=$v[0]'>Sửa</a>
                    <a href='?ctrl=LoaiSP&id=$v[0]' onclick='return confirmDelete()' class='confirm-delete'>Xóa</a>
                </td>
            </tr>");
        }
        ?>    
    </table>
</body>
</html>