<?php
require_once 'pdo.php';

function binhluan_insert($iduser, $idpro, $noidung, $ngaybl, $ten){
    $sql = "INSERT INTO binhluan(iduser, idpro, noidung, ngaybl, ten) VALUES (?,?,?,?,?)";
    pdo_execute($sql, $iduser, $idpro, $noidung, $ngaybl, $ten);
}

// function binhluan_update($ma_bl, $ma_kh, $ma_hh, $noi_dung, $ngay_bl){
//     $sql = "UPDATE binhluan SET ma_kh=?,ma_hh=?,noi_dung=?,ngay_bl=? WHERE ma_bl=?";
//     pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl, $ma_bl);
// }

function binhluan_delete($id){
    $sql = "DELETE FROM binhluan WHERE id=?";
    
        pdo_execute($sql, $id);
    
}

function binhluan_select_all(){
    $sql = "SELECT * FROM binhluan bl ORDER BY id DESC";
    return pdo_query($sql);
}

function get_all_products_by_idpro($idpro) {
    $sql = "SELECT * FROM binhluan WHERE idpro = ? ORDER BY id DESC";
    return pdo_query($sql, $idpro);
}
// function binhluan_select_by_id($ma_bl){
//     $sql = "SELECT * FROM binhluan WHERE ma_bl=?";
//     return pdo_query_one($sql, $ma_bl);
// }

// function binhluan_exist($ma_bl){
//     $sql = "SELECT count(*) FROM binhluan WHERE ma_bl=?";
//     return pdo_query_value($sql, $ma_bl) > 0;
// }
//-------------------------------//
// function binhluan_select_by_hang_hoa($ma_hh){
//     $sql = "SELECT b.*, h.ten_hh FROM binhluan b JOIN hang_hoa h ON h.ma_hh=b.ma_hh WHERE b.ma_hh=? ORDER BY ngay_bl DESC";
//     return pdo_query($sql, $ma_hh);
// }
function showbl_adm($dsbl){
    $html_bl='';
    foreach($dsbl as $bl){
        extract($bl);   
        $html_bl.='<tr>
                        <td>'.$id.'</td>
                        <td>'.$noidung.'</td>
                        <td>'.$ngaybl.'</td>
                        <td>'.$ten.'</td>
                        <td>
                            <a href="index.php?pg=delbinhluan&id='.$id.'" class="btn btn-danger"><i
                                    class="fa-solid fa-trash"></i> Xóa</a>
                        </td>
                    </tr>';
                   
    }
    return $html_bl;
}