
<?php
    // session_start();
    // include_once "dao/pdo.php";
    // include_once "dao/khachhang.php";
    // $thongbao="";
    // if(isset($_POST['dangnhap'])){
    //     $username=$_POST['username'];
    //     $password=$_POST['password'];
    //     $userone=khachhang_check($username,$password);

    //     // if(is_array($userone)){
    //         extract($userone);
    //         if($role==1){
    //             $_SESSION['admin']=1;
    //             $_SESSION['username']=$username;
    //             $_SESSION['email']=$email;
    //             header('location: index.php');
    //         }else{
    //             $thongbao="Tai khoan khong ton tai";
    //         }
    //     // }
    // }
    
?>
<div class="containerfull">
    <div class="bgbanner">ĐĂNG NHẬP</div>
</div>
<section class="containerfull">
        <div class="container">
            <div class="boxleft mr2pt menutrai">
                <h1>DÀNH CHO BẠN</h1><br><br>
                <a href="#">Cập nhật thông tin</a>
                <a href="#">Lịch sử mua hàng</a>
                <a href="logout.php">Thoát hệ thống</a>
              
            </div>
            <div class="boxright">
                <h1>ĐĂNG NHẬP</h1><br>
                <div class="containerfull mr30">
                    <h2 style="color:red">
                    <?php
                        if(isset($_SESSION['tb_dangnhap'])&&($_SESSION['tb_dangnhap']!="")){
                            echo $_SESSION['tb_dangnhap'];
                            unset($_SESSION['tb_dangnhap']);
                        } 
                        
                    ?>
                    </h2>
                    <form action="index.php?pg=login" method="post">
                        <div class="row">
                            <div class="col-25">
                            <label for="username">TÊN ĐĂNG NHẬP</label>
                            </div>
                            <div class="col-75">
                            <input type="text" id="username" name="username" placeholder="Nhap ten">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="password">MẬT KHẨU </label>
                            </div>
                            <div class="col-75">
                            <input type="password" id="password" name="password" placeholder="Nhap mat khau">
                            </div>
                        </div>
                        
                        
                        
                        <br>
                        <div class="row1">
                            <input type="submit" name="dangnhap" value="Đăng nhập">
                        </div>
                        
                    </form>
                    
                </div>
            </div>


        </div>
    </section>