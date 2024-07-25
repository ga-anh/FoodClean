
<?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
        extract($_SESSION['s_user']);
    }
    
?>
<style>
    h1{
        margin-top: 10px; 
    } 
    .layouthome{
        margin-bottom: 20px;
    }
</style>

<div class="containerfull">
    <div class="bgbanner">CẬP NHẬT THÀNH VIÊN</div>
</div>
<section class="containerfull layouthome">
        <div class="container">
            <div class="boxleft mr2pt menutrai">
                <h1>DÀNH CHO BẠN</h1><br><br>
                <a href="index.php?pg=myaccount">Cập nhật thông tin</a>
                <a href="index.php?pg=theodoidh">Lịch sử mua hàng</a>
                <a href="index.php?pg=logout">Thoát hệ thống</a>
                
            </div>
            <div class="boxright">
                <h1>CẬP NHẬT THÀNH VIÊN</h1><br>
                <div class="containerfull mr30">
                    <form action="index.php?pg=updateuser" method="post">
                        <div class="row">
                            <div class="col-25">
                            <label for="username">Tên đăng nhập</label>
                            </div>
                            <div class="col-75">
                            <input type="text" id="username" value="<?=$username?>" name="username" placeholder="Nhap ten">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="password">Mật khẩu</label>
                            </div>
                            <div class="col-75">
                            <input type="password" id="password" value="<?=$password?>" name="password" placeholder="Nhập mật khẩu">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-25">
                            <label for="email">Email</label>
                            </div>
                            <div class="col-75">
                            <input type="text" id="email" value="<?=$email?>" name="email" placeholder="Nhập email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="email">Ten</label>
                            </div>
                            <div class="col-75">
                            <input type="text" id="ten" value="<?=$ten?>" name="ten" placeholder="Nhập tên">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="email">Địa chỉ</label>
                            </div>
                            <div class="col-75">
                            <input type="text" id="diachi" value="<?=$diachi?>" name="diachi" placeholder="Nhập địa chỉ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="email">Điện thoại</label>
                            </div>
                            <div class="col-75">
                            <input type="text" id="dienthoai" value="<?=$dienthoai?>" name="dienthoai" pattern="\d{9,10}" title="Vui lòng nhập từ 9 đến 10 chữ số" placeholder="Nhập điện thoại">
                            </div>
                        </div>
                        
                        
                        <br>
                        <div class="row1">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <input type="submit" name="capnhat" value="Cập nhật">
                        </div>
                    </form>
                    
                </div>
            </div>


        </div>
    </section>