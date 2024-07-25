<?php
$html_dm = showdm($dsdm);
extract($spchitiet);
    $html_sp_lienquan = showsp($splienquan);
$html_dssp = '';


if ($bestseller == 1) {
    $best = '<div class="best"></div>';
} else {
    $best = '';
}
if ($trangthai == 1) {
   
    $html_dssp = '
                        
                        <div class="containerfull mr30">
                <div class="col6 imgchitiet">
                    <img src="view/images/'.$img.'" alt="">
                </div>
                <div class="col6 textchitiet">
                    <h2>'.$name.'</h2>
                    <p>'.number_format($price, 0, ",", ".").'  đ</p>
                    <p>'.$decrise.' đ</p>
                    <button type="submit">Hết hàng</button>
                </div>

            </div>';
} else {
    
            $html_dssp = '<div class="containerfull mr30">
                <div class="col6 imgchitiet">
                    <img src="view/images/'.$img.'" alt="">
                </div>
                <div class="col6 textchitiet">
                    <h2>'.$name.'</h2>
                    <p>'.number_format($price, 0, ",", ".").'  đ</p>
                    <p>'.$decrise.' đ</p>
                    <form action="index.php?pg=addcart" method="post">
                        <input type="hidden" name="tensp" value="'.$name.'">
                        <input type="hidden" name="img" value="'.$img.'">
                        <input type="hidden" name="price" value="'.$price.'">
                        <input type="number" name="soluong" id="" min="1" value="1" max="10">
                        <button type="submit" name="addcart">Đặt hàng</button>
                    </form>
                </div>

            </div>';
}

?>
<style>
    .layouthome {
        margin-bottom: 20px;
    }

    .boxleft {
        margin-top: 10px;
    }

    .boxright {
        margin-top: 10px;
    }
</style>
<div class="containerfull ">
    <div class="bgbanner">SẢN PHẨM CHI TIẾT</div>
</div>

<section class="containerfull layouthome">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h1>DANH MỤC</h1><br><br>
            <?= $html_dm; ?>
        </div>
        <div class="boxright">
            <h1>SẢN PHẨM CHI TIỂT</h1><br>
            <?=$html_dssp;?>
            <hr>
            <div id="binhluan">
                <iframe src="view/binhluan.php?idpro=<?= $id ?>" width="100%" height="400px" frameborder="0"></iframe>
            </div>
            <hr>
            <h1>SẢN PHẨM LIÊN QUAN</h1>
            <div class="containerfull mr30">
                <?= $html_sp_lienquan; ?>
                <!-- <div class="box25 mr15 mb">
                        <div class="best"></div>
                        <img src="images/sp1.webp" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div>
                    <div class="box25 mr15 mb">
                        <img src="images/sp2.webp" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div>
                    <div class="box25 mr15 mb">
                        <img src="images/sp3.webp" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div>
                    <div class="box25 mr15 mb">
                        <img src="images/sp4.webp" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div>
                     -->
            </div>
        </div>


    </div>
</section>