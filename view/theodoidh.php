<?php
   
    $showdh=bill_select_all_id($_SESSION['s_user']['id']);
    $html_showdh='';
    foreach($showdh as $dh){
        extract($dh);
        if($status=="Đã hủy"){
            $iddh="<div class='tbdh'></div>";
        }else{
            $iddh="";
        }
        $html_showdh.='
                        <tr id='.$iddh.'>
                            
                            <td>'.$madh.'</td>
                            <td>'.$nguoidat_ten.'</td>
                            <td>'.$nguoidat_tell.'</td>
                            <td>'.$nguoidat_diachi.'</td>
                            <td>'.$status.'</td>
                            <td>
                            <a href="index.php?pg=chitietdh&iddh='.$id.'"  class="btn-alt3">Xem chi tiết</a>
                            </td>
                            <td>
                           
                            <a href="index.php?pg=theodoidh&huydon='.$id.'"  name="status" class="btn-alt3">Hủy đơn</a>
                            </td>
                           
                        </tr>';
    }
    
?>
<style>
h1{
    margin-top: 10px; 
}    
.btn {
    display: inline-block;
    padding: .5rem 1rem;
    background-color:#1e1f26 ;
    border-radius: 2rem;
    color: #cd8c38;
    transition: .3s;
}

.btn:hover {
    background-color: #cd8c38;
}
.tbdh{
    color: red;
}
.btn-l {
    width: 100%;
    text-align: center;
}
/* category container */
.order-container a{
   
    margin-top: 20px;
    margin-left: 20px;
}
.btn-alt {
    background-color: #1e1f26;
    color: #cd8c38;
    border: 1px solid #cd8c38;
    margin-left: 1rem;
}
td .btn-alt3{
    
    color: #cd8c38;
    margin-left: 0;
    text-align: center;
    font-size: 1em;
}
td .btn-alt3:hover{
    
    color: #1e1f26;
    margin-left: 0;
    
}
.btn-alt:hover {
    color: #1e1f26;
    background-color: #cd8c38;
}
    /* order-container  */
.order-container{
    
    position: relative;
    text-align: center;
    height: 400px;
    width: 100%;
    border: 2px solid #1e1f26;
    border-radius: 1rem;
    overflow: hidden;
    margin-bottom: 1.5rem;
    height: 600px;
    background-color: rgb(255, 255, 255)
}
.boxleft {
    float: left;
    width: 20%;
}
.boxright3{
    height: 700px;
}
.tbloidh{
    color: red;
}
</style>
<div class="containerfull">
    <div class="bgbanner">ĐƠN MUA</div>
</div>
<section class="containerfull">
        <div class="container">
            <div class="boxleft mr2pt menutrai">
                <h1>DÀNH CHO BẠN</h1><br><br>
                <a href="index.php?pg=myaccount">Cập nhật thông tin</a>
                <a href="index.php?pg=theodoidh">Lịch sử mua hàng</a>
                <a href="index.php?pg=logout">Thoát hệ thống</a>
            </div>
            <div class="boxright boxright3">
                <h1>LỊCH SỬ MUA HÀNG</h1><br>
                <div class="containerfull mr30">
                    
                    <div class="category-container">
                            
                        <div class="order-container">
                                
                                <table>
                                    <thead>
                                        <tr>
                                            <td>Mã đơn hàng</td>
                                            <td>Tên</td>
                                            <td>Số điện thoại</td>
                                            <td>Địa chỉ</td>
                                            <td>Trạng thái</td>
                                            <td>Xem chi tiết</td>
                                            <td>Hủy đơn</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?=$html_showdh;?>
                                    </tbody>
                                </table>
                                
                                  
                        </div>
                                    
                    </div>
                </div>


        </div>
        
    </section>
    