<?php

    function cart_insert($idpro,$price,$name,$img,$soluong,$thanhtien,$idbill){
        $sql = "INSERT INTO cart(idpro,price,name,img,soluong,thanhtien,idbill) VALUES (?, ?, ?, ?, ?, ?, ?)";
        pdo_execute($sql, $idpro,$price,$name,$img,$soluong,$thanhtien,$idbill);
    }
    
    function cart_select_all_id($idbill){
        $sql = "SELECT * FROM cart WHERE idbill=?";
        return pdo_query($sql,$idbill);
    }

    function cart_select_all_id_sanpham($id){
        $sql = "SELECT * FROM cart WHERE idpro=?";
        return pdo_query($sql,$id);
    }

    function viewcart(){
        $html_cart='';
        $i=0;
        $j=$i +1;
        $tong=0;
        foreach($_SESSION["giohang"] as $sp){
            extract($sp);          
            $tt=(int)$price*(int)$soluong;
            $tong+=$tt;
            
            $link="index.php?pg=viewcart&delete=".$i;
            

            $html_cart.='<tr>
                            <td>'.$j.'</td>
                            
                            <td><img src="view/images/'.$img.'" alt="" style="width:100px"></td>
                            
                            <td>'.$name.'</td>
                            
                            <td>'.number_format($price,0,",",".").'</td>
                            <td class="quantify">   
                                <form action="index.php?pg=viewcart&tangsl=1" method="post">      
                                    <input type="hidden" name="sodem" value="'.$i.'">
                                    <input type="number" name="soluong" min="1" max="10" value="'.$soluong.'" >
                                    <button name="suasl" style="width:50%; cursor:pointer; border: 1px #993300 solid; padding:5px 5px; font-size: 10pt;">Xác nhận</button>   
                                </form>         
                            </td>
                            
                            <td>'.number_format($tt,0,",",".").'</td>
                            <td><a href="'.$link.'">Xóa</a></td><br>
                        </tr>';
            $i++;
        }
        
        return $html_cart;  
    }
    function get_tongdonhang(){
        $tong=0;
        
        foreach($_SESSION["giohang"] as $sp){
            extract($sp);
            $tt=(int)$price*(int)$soluong;
            $tong+=$tt;
        }
        return $tong;
    }
    function viewcart_bill(){
        $html_carts='';
        $i=0;
        $j=$i +1;
        $tong=0;
        foreach($_SESSION["giohang"] as $sp){
            extract($sp);          
            $tt=$price*$soluong;
            $tong+=$tt;
            
            $html_carts.='
                        <table>
                          
                                <tr>
                                    <td>'.$j.'</td>
                                    <td><img src="view/images/'.$img.'" alt="" style="width:100px"></td>
                                    
                                    <td>'.$name.'</td>
                                    
                                    <td>'.number_format($price,0,",",".").'</td>
                                    <td >   
                                        '.$soluong.' 
                                    </td>
                                    
                                    <td>'.number_format($tt,0,",",".").'</td>
                                    
                                </tr>
                           
                        </table>';
            $i++;
        }
        
        return $html_carts;  
    }

?>