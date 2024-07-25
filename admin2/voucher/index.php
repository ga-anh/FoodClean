<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <script>
        function confirmDelete() {
            return confirm("Bạn có chắc muốn xóa sản phẩm này không?");
        }
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid gray;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
            width: 10%;
        }

        .box {
            width: 100px;
        }

        td img {
            max-width: 60px;
            max-height: 50px;
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

        .heading {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    
    if (isset($_GET["id"])) {
        $ma = $_GET["id"];
        $sql = "delete from voucher where id=$ma";
        $result = $db->exec($sql);
    }

    $rows_sp = getAllVouchers($db);
    ?>
    <div class="heading">Quản Lý Voucher</div>
    <table>
        <tr>
            <th>Mã Voucher</th>
            <th>Voucher</th>
            <th>Giá Trị</th>
           
            <th><a href="?ctrl=voucher&act=add" style="color: white;text-decoration: none;">Thêm Voucher</a></th>
        </tr>
        <?php
        foreach ($rows_sp as $row) {
            echo ("<tr>
                <td>{$row[0]}</td>
                <td>{$row[1]}</td>
                <td>{$row[2]}</td>
                <td>
                    <a href='?ctrl=SanPham&act=edit&id={$row[0]}'>Sửa</a>
                    <a href='?ctrl=SanPham&id={$row[0]}' onclick='return confirmDelete()'>Xóa</a>
                </td>
            </tr>");
        }
        ?>
    </table>
</body>

</html>