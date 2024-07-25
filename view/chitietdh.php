<?php
    
    $html_showctdh='';
    $showctdh=cart_select_all_id($idbill);
   
    
    foreach($showctdh as $dh){
        
        extract($dh);
        $tt=$price*$soluong;
        $html_showctdh.='
                        <tr>
                        <td>'.$id.'</td>
                            <td><img src="view/images/'.$img.'" alt="" style="width:100px"></td>
                            
                            <td>'.$name.'</td>
                            
                            <td>'.number_format($price,0,",",".").'</td>
                            <td >   
                                '.$soluong.' 
                            </td>
                            <td>'.number_format($tt,0,",",".").'</td>
                           
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

.btn-alt:hover {
    color: #1e1f26;
    background-color: #cd8c38;
}

    /* order-container  */
.order-container{
    
    position: relative;
    text-align: center;
    height: 500px;
    width: 100%;
    border: 2px solid #1e1f26;
    border-radius: 1rem;
    overflow: hidden;
    margin-bottom: 1.5rem;
    
    background-color: rgb(255, 255, 255)
}
.boxleft {
    float: left;
    width: 20%;
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
            <div class="boxright">
                <h1>LỊCH SỬ MUA HÀNG</h1><br>
                <div class="containerfull mr30">
                    
                    <div class="category-container">
                            
                        <div class="order-container">
                                <a href="#" class="btn-alt btn">Chờ xác nhận</a>
                                <a href="#" class="btn-alt btn">Chờ lấy hàng</a>
                                <a href="#" class="btn-alt btn">Chờ giao hàng</a>
                                <a href="#" class="btn-alt btn">Hoàn thành</a>
                                <a href="#" class="btn-alt btn">Đã hủy</a>
                                <a href="#" class="btn-alt btn">Trả hàng</a>
                                <table>
                                    <thead>
                                        <tr>
                                            <td>Ảnh sản phẩm</td>
                                            <td>Tên sản phẩm</td>
                                            <td>Giá </td>
                                            <td>Số lượng</td>
                                            <td>Thành tiền</td>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?=$html_showctdh;?>
                                    </tbody>
                                </table>
                                
                                    
                        </div>
                                    
                    </div>
                </div>


            </div>
        </div>
</section>