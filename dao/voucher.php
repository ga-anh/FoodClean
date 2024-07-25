<?php
    function voucher_select_by_id($voucher){
        $sql = "SELECT * FROM voucher WHERE voucher=?";
        return pdo_query_one($sql, $voucher);
    }
    function voucher_select_by_id_vc($id){
        $sql = "SELECT * FROM voucher WHERE id=?";
        return pdo_query_one($sql, $id);
    }
    function getAllVouchers(){
        $sql = "SELECT * FROM voucher ";
        return pdo_query($sql);
    }

function addVoucher($voucher, $giatri)
{
    $sql = "INSERT INTO voucher(voucher,giatri) VALUES(?,?)";
    pdo_execute($sql, $voucher,$giatri);
}

function updateVoucher(  $voucher, $giatri,$id)
{
    $sql = "UPDATE voucher SET voucher=?,giatri=? WHERE id=?";
    pdo_execute($sql, $voucher,$giatri,$id);
}
function showvc_adm($dsvc){
    $html_vc='';
    foreach($dsvc as $vc){
        extract($vc);   
        $html_vc.='<tr>
                        <td>'.$id.'</td>
                        <td>'.$voucher.'</td>
                        <td>'.number_format($giatri,0,",",".").'</td>
                        <td>
                            <a href="index.php?pg=voucherupdate&id='.$id.'" class="btn btn-warning"><i
                                    class="fa-solid fa-pen-to-square"></i> Sửa</a>
                            <a href="index.php?pg=delvoucher&id='.$id.'" class="btn btn-danger"><i
                                    class="fa-solid fa-trash"></i> Xóa</a>
                        </td>
                    </tr>';
                   
    }
    return $html_vc;
}
function voucher_delete($id){
    $sql = "DELETE FROM voucher WHERE id=?";
    pdo_execute($sql, $id);
}
?>