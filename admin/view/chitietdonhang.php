<?php
    $html_showctdh='';
    $showctdh=cart_select_all_id($idbill);
   
    
    foreach($showctdh as $dh){
        
        extract($dh);
        $tt=$price*$soluong;
        $html_showctdh.='
                        <tr>
                        
                            <td><img src="'.IMG_PATH_ADMIN.$img.'" alt="'.$name.'" width="50px" height="50px"></td>
                            <td >   
                                '.$name.' 
                            </td>
                            <td>'.number_format($price,0,",",".").'</td>
                            <td >   
                                '.$soluong.' 
                            </td>
                            <td>'.number_format($tt,0,",",".").'</td>
                           
                        </tr>';
    }
?>
<div class="main-content">
                <h3 class="title-page">
                    Chi tiết đơn hàng
                </h3>
                
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?=$html_showctdh?>
                        
                    </tbody>
                    <tfoot>
                        <tr>    
                            <th>Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
        new DataTable('#example');
    </script>