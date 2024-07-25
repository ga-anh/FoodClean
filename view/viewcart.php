<?php

$html_cart = viewcart();
if (!isset($_SESSION['voucher'])) {
    $voucher = "";
}

if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
    extract($_SESSION['giohang']);
    $html_gh = '<a href="index.php?pg=donhang">
                    <form action="index.php?pg=donhang"  method="post">
                        
                        <button id="" name="dat">Thanh toán</button>
                    </form> 
                </a>';
} else {
    $html_gh = '<a href="index.php?pg=viewcart&tb=1">
                    <form action="index.php?pg=viewcart&tb=1"  method="post">
                        
                        <button id="" name="dat">Thanh toán</button>
                    </form> 
                </a>';
}
?>
<style>
    .tb {
        color: red;
    }

    .col9 {
        margin-top: 10px;
    }

    .col3 {
        margin-top: 10px;
    }

    .layouthome {
        margin-bottom: 20px;
    }
</style>

<div class="containerfull">
    <div class="bgbanner">GIỎ HÀNG</div>
</div>

<section class="containerfull layouthome">
    <div class="container">
        <div class="col9 viewcart">
            <h2>ĐƠN HÀNG</h2>
            <table class="rowtotal">
                <tr>

                    <th>STT</th>
                    <th>Hình</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
                <?= $html_cart; ?>
                <?php
                if (isset($_GET['tb']) && ($_GET['tb'] == 1)) {
                    $_SESSION['tb'] = "<div class='tb'>Không có sản phẩm để thanh toán</div>";
                    echo $_SESSION['tb'];
                    unset($_SESSION['tb']);
                }
                ?>

            </table>
            <a href="index.php?pg=viewcart&del=1">Xóa rỗng đơn hàng</a>
        </div>
        <div class="col3">
            <h2>ĐƠN HÀNG</h2>
            <div class="total">
                <h3>Tổng: <?= $tongdonhang ?></h3>
            </div>
            <div class="coupon">
                <form action="index.php?pg=viewcart&voucher=1" method="post">
                    <input type="hidden" name="tongdonhang" value="<?= $tongdonhang ?>">
                    <input type="text" name="mavoucher" value="<?= $voucher ?>" placeholder="Nhập voucher">
                    <button type="submit">Áp mã</button>
                </form>

            </div>
            <div class="total">
                <h3>Tổng thanh toán: <?= $thanhtoan ?></h3>
            </div>
            <?= $html_gh ?>
        </div>


    </div>
</section>