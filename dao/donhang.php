<?php
    function bill_select_all(){
        $sql = "SELECT * FROM bill ORDER BY id DESC";
        return pdo_query($sql);
    }
    function bill_select_all_id($iduser){
        $sql = "SELECT * FROM bill WHERE iduser=? ORDER BY id DESC";
        return pdo_query($sql,$iduser);
    }
    function bill_select_all_id_admin($id){
        $sql = "SELECT * FROM bill WHERE id=?";
        return pdo_query_one($sql,$id);
    }

    function bill_update( $status,$id){
        $sql = "UPDATE bill SET status=? WHERE id=?";
        pdo_execute($sql, $status,$id);
    }
    function bill_update_user($id){
        $sql = "UPDATE bill SET status='Đã hủy' WHERE id=?";
        pdo_execute($sql,$id);
    }

function bill_insert_id($madh,$iduser,$nguoidat_ten,$nguoidat_email,$nguoidat_tell,$nguoidat_diachi,$nguoinhan_ten,$nguoinhan_diachi,$nguoinhan_tell,$total,$voucher,$tongthanhtoan,$pttt,$status){
    $sql = "INSERT INTO bill(madh,iduser,nguoidat_ten,nguoidat_email,nguoidat_tell,nguoidat_diachi,nguoinhan_ten,nguoinhan_diachi,nguoinhan_tell,total,voucher,tongthanhtoan,pttt,status) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?)";
    return pdo_execute_id($sql, $madh,$iduser,$nguoidat_ten,$nguoidat_email,$nguoidat_tell,$nguoidat_diachi,$nguoinhan_ten,$nguoinhan_diachi,$nguoinhan_tell,$total,$voucher,$tongthanhtoan,$pttt,$status);
    
}
function showdh_admin($dsdh){
    $html_dsdh='';
    $i=1;
    foreach ($dsdh as $dh){
        extract($dh);     
        $html_dsdh.='<tr>
                            <td>'.$i.'</td>
                            <td>'.$madh.'</td>
                            <td>'.$iduser.'</td>
                            <td>'.$nguoidat_ten.'</td>
                            <td>'.$nguoidat_email.'</td>
                            <td>'.$nguoidat_tell.'</td>
                            <td>'.$nguoidat_diachi.'</td>
                            <td>'.$status.'</td>
                            <td>
                                <a href="index.php?pg=donhangupdate&id='.$id.'" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                <a href="index.php?pg=donhangct&id='.$id.'" class="btn btn-warning2"><i class="fa-solid fa-pen-to-square"></i> Xem</a>
                            </td>
                        </tr>';
                        $i++;
    }

    return $html_dsdh;
}
function showdh_admin2($dsdh){
    $html_dsdh='';
    $i=1;
    foreach ($dsdh as $dh){
        extract($dh);     
        $html_dsdh.='<tr>
                            <td>'.$i.'</td>
                            <td>'.$madh.'</td>
                            <td>'.$status.'</td>
                        </tr>';
                        $i++;
    }

    return $html_dsdh;
}
?>