<?php
$html_cart = viewcart_bill();

if (isset($_SESSION['s_user']) && ($_SESSION['s_user'] > 0)) {
    extract($_SESSION['s_user']);
    $html_users1 = '
            <label for="hoten"><b>Họ và tên</b></label>
            <input type="text" name="hoten" id="hoten" value="' . $ten . '" readonly>
    
            <label for="diachi"><b>Địa chỉ</b></label>
            <input type="text" name="diachi" id="diachi" value="' . $diachi . '" readonly>
    
            <label for="email"><b>Email</b></label>     
            <input type="text" name="email" id="email" value="' . $email . '" readonly>

            <label for="dienthoai"><b>Điện thoại</b></label>
            <input type="text" name="dienthoai" id="dienthoai" value="' . $dienthoai . '" readonly>';
} else {
    $html_users1 = '
        <label for="hoten"><b>Họ và tên</b></label>
        <input type="text" placeholder="Nhập họ tên đầy đủ" name="hoten" id="hoten" >
    
        <label for="diachi"><b>Địa chỉ</b></label>
        <input type="text" placeholder="Nhập địa chỉ" name="diachi" id="diachi" >
    
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Nhập email" name="email" id="email" >

        <label for="dienthoai"><b>Điện thoại</b></label>
        <input type="text" placeholder="Nhập điện thoại" name="dienthoai" id="dienthoai" >
        <a href="index.php?pg=dangnhap" style="cursor: pointer;">
                    &rArr; Bạn đã có tài khoản? 
                    </a>
    ';
}
?>
<style>
    .col83 {
        margin-top: 10px;
        float: left;
        width: 40%;
    }

    .col89 {
        margin-top: 10px;
        float: left;
        width: 60%;
    }

    td {
        padding: 10px;
        border: 1px #666666 solid;
        text-align: left;
    }

    .boxcart {
        border: 1px #ccc solid;
        padding: 10px;
        margin-bottom: 20px;
    }

    table {
        width: 60%;
    }
    .layouthome{
        margin-bottom: 20px;
    }
</style>

<div class="containerfull">
    <div class="bgbanner">ĐƠN HÀNG</div>
</div>

<section class="containerfull layouthome">
    <div class="container">
        <form action="index.php?pg=donhangsubmit" method="post">
            <div class="col89 viewcart">
                <div class="ttdathang">
                    <h2>Thông tin người đặt hàng</h2>
                    <?= $html_users1 ?>
                    <!-- <label for="hoten"><b>Họ và tên</b></label>
                      <input type="text" placeholder="Nhập họ tên đầy đủ" name="hoten" id="hoten" readonly>
                  
                      <label for="diachi"><b>Địa chỉ</b></label>
                      <input type="text" placeholder="Nhập địa chỉ" name="diachi" id="diachi" required>
                  
                      <label for="email"><b>Email</b></label>
                      <input type="text" placeholder="Nhập email" name="email" id="email" required>

                      <label for="dienthoai"><b>Điện thoại</b></label>
                      <input type="text" placeholder="Nhập điện thoại" name="dienthoai" id="dienthoai" required> -->
                </div>
                <div class="ttdathang">
                    <a onclick="showttnhanhang()" style="cursor: pointer;">
                        &rArr; Thay đổi địa chỉ nhận hàng
                    </a>
                    <!-- <a href="index.php?pg=dangnhap" style="cursor: pointer;">
                    &rArr; Bạn đã có tài khoản? 
                    </a> -->
                </div>
                <div class="ttdathang" id="ttnhanhang">
                    <h2>Thông tin người nhận hàng</h2>

                    <label for="hoten"><b>Họ và tên</b></label>
                    <input type="text" placeholder="Nhập họ tên đầy đủ" name="hoten_nguoinhan" id="hoten_nguoinhan">

                    <label for="diachi"><b>Địa chỉ</b></label>
                    <input type="text" placeholder="Nhập địa chỉ" name="diachi_nguoinhan" id="diachi_nguoinhan">

                    <label for="dienthoai"><b>Điện thoại</b></label>
                    <input type="text" placeholder="Nhập điện thoại" name="dienthoai_nguoinhan" id="dienthoai_nguoinhan">
                </div>



            </div>
            <div class="col83">
                <h2>ĐƠN HÀNG</h2>
                <div class="total">
                    <div class="boxcart">

                        <?= $html_cart ?>

                        <h3>Tổng: <?= $tongdonhang ?></h3>
                    </div>
                </div>

                <div class="coupon">
                    <div class="boxcart">
                        <h3>Voucher: -<?= $giatrivoucher ?>|<?= $voucher ?></h3>
                    </div>
                </div>
                <div class="pttt">
                    <div class="boxcart">
                        <h3>Phương thức thanh toán: </h3>
                        <input type="radio" name="pttt" value="<?= $pttt ?>" id="" checked> Tiền mặt<br>
                        <input type="radio" name="pttt" value="<?= $pttt ?>" id=""> Chuyển khoản<br>
                        <input type="radio" name="pttt" value="<?= $pttt ?>" id=""> Ví điện tử<br>
                    </div>
                </div>
                <div class="total">
                    <div class="boxcart bggray">
                        <h3>Tổng thanh toán: <?= $thanhtoan ?></h3>
                    </div>
                </div>
                <button type="submit" name="donhangsubmit" style="cursor:pointer">Thanh toán</button>
            </div>
        </form>

    </div>
</section>
<script>
    var ttnhanhang = document.getElementById("ttnhanhang");
    ttnhanhang.style.display = "none";

    function showttnhanhang() {
        if (ttnhanhang.style.display == "none") {
            ttnhanhang.style.display = "block";
        } else {
            ttnhanhang.style.display = "none";
        }
    }
</script>