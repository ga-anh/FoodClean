<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_loai là tên loại
 * @throws PDOException lỗi thêm mới
 */
function danhmuc_insert($name,$stt){
    $sql = "INSERT INTO danhmuc(name,stt) VALUES(?,?)";
    pdo_execute($sql, $name,$stt);
}


// /**
//  * Cập nhật tên loại
//  * @param int $ma_loai là mã loại cần cập nhật
//  * @param String $ten_loai là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
function danhmuc_update($id, $name,$stt){
    $sql = "UPDATE danhmuc SET name=?,stt=? WHERE id=?";
    pdo_execute($sql,$id, $name,$stt);
}
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_loai là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
function danhmuc_delete($id){
    $sql = "DELETE FROM danhmuc WHERE id=?";
    // if(is_array($id)){
    //     foreach ($id as $ma) {
    //         pdo_execute($sql, $ma);
    //     }
    // }
    // else{
        pdo_execute($sql, $id);
    // }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_select_all(){
    $sql = "SELECT * FROM danhmuc ";
    return pdo_query($sql);
}
function showdm($dsdm){
    $html_dm='';
    foreach($dsdm as $dm){
        extract($dm); 
        $link='index.php?pg=sanpham&iddm='.$id;
        $html_dm.='<a href="'.$link.'">'.$name.'</a>';
    }
    return $html_dm;
}
function get_name_dm($id){
    $sql = "SELECT name FROM danhmuc WHERE id=".$id;
    $kq=pdo_query_one($sql);
    return $kq["name"];
}
// /**
//  * Truy vấn một loại theo mã
//  * @param int $ma_loai là mã loại cần truy vấn
//  * @return array mảng chứa thông tin của một loại
//  * @throws PDOException lỗi truy vấn
//  */
function danhmucselect_by_id($id){
    $sql = "SELECT * FROM danhmuc WHERE id=?";
    return pdo_query_one($sql, $id);
}
// /**
//  * Kiểm tra sự tồn tại của một loại
//  * @param int $ma_loai là mã loại cần kiểm tra
//  * @return boolean có tồn tại hay không
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_exist($id){
//     $sql = "SELECT count(*) FROM danhmuc WHERE id=?";
//     return pdo_query_value($sql, $id) > 0;
// }

//admin
function showdm_admin($dsdm,$iddm){
    $html_dm='';
    foreach($dsdm as $dm){
        extract($dm); 
        if($id===$iddm){
            $s="selected";
        }else{
            $s="";
        }  
        $html_dm.='<option value="'.$id.'" '.$s.'>'.$name.'</option>';
    }
    return $html_dm;
}
function showdm_ad($dsdm){
    $html_dm='';
    foreach($dsdm as $dm){
        extract($dm);   
        $html_dm.='<option value="'.$id.'">'.$name.'</option>';
    }
    return $html_dm;
}
function showdm_adm($dsdm){
    $html_dm='';
    foreach($dsdm as $dm){
        extract($dm);   
        $html_dm.='<tr>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$stt.'</td>
                        <td>
                            <a href="index.php?pg=danhmucupdate&id='.$id.'" class="btn btn-warning"><i
                                    class="fa-solid fa-pen-to-square"></i> Sửa</a>
                            <a href="index.php?pg=deldanhmuc&id='.$id.'" class="btn btn-danger"><i
                                    class="fa-solid fa-trash"></i> Xóa</a>
                        </td>
                    </tr>';
                   
    }
    return $html_dm;
}