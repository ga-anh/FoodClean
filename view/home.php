<?php
    $html_dssp_new=showsp($dssp_new);
    $html_dssp_best=showsp($dssp_best);
    
    $html_dssp_view=showsp($dssp_view);
    
?>
<style>
    .layouthome{
        margin-bottom: 20px;
    }
    .mr30{
        margin-top: 10px;
    }
    .box80{
        background-color: black;
        border-radius:5px ;
    }
</style>
<div class="containerfull">
        <img src="layout/images/banner.webp" alt="">
    </div>

    <section class="containerfull layouthome">
        <div class="container ">
            <h1>SẢN PHẨM HOT</h1><br><br>
            <div class="containerfull ">
                <div class="box50 mr15">
                    <img src="layout/images/z4126856196548_6d15d0d8c75584c5a33f27b48a6e2106-1024x512.jpg" alt="">
                </div>
                <?=$html_dssp_best?>
                <!-- <div class="box25 mr15">
                    <div class="best"></div>
                    <img src="layout/images/sp1.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <div class="best"></div>
                    <img src="layout/images/sp2.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div> -->
            </div>
            <div class="containerfull mr30">
                <h1>SẢN PHẨM MỚI</h1>
                <?=$html_dssp_new;?>
                <!-- <div class="box25 mr15">
                    <img src="layout/images/sp1.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/images/sp2.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/images/sp3.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/images/sp4.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div> -->
            </div>

            <div class="containerfull mr30">
                <h1>SẢN PHẨM NHIỀU NGƯỜI XEM </h1>
                <?=$html_dssp_view;?>
                <!-- <div class="box25 mr15">
                    <img src="layout/images/sp1.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/images/sp2.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/images/sp3.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/images/sp4.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div> -->
            </div>

        </div>
    </section>


    
            
   