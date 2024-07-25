<?php
require_once 'pdo.php';

function khachhang_insert($id, $username, $password, $ten, $diachi, $dienthoai, $email, $role){
    $sql = "INSERT INTO khachhang(id, tendn, pass, ten, diachi, dienthoai, email, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $id, $username, $password, $ten, $diachi, $dienthoai, $email, $role);
}

function khachhang_update($id, $username, $password, $ten, $diachi, $dienthoai, $email, $role){
    $sql = "UPDATE khachhang SET tendn=?, pass=?, ten=?, diachi=?, dienthoai=?, email=?, role=? WHERE id=?";
    pdo_execute($sql, $username, $password, $ten, $diachi, $dienthoai, $email, $role, $id);
}

function khachhang_delete($id){
    $sql = "DELETE FROM khachhang WHERE id=?";
    if(is_array($id)){
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $id);
    }
}

function khachhang_select_all(){
    $sql = "SELECT * FROM khachhang";
    return pdo_query($sql);
}

function khachhang_select_by_id($id){
    $sql = "SELECT * FROM khachhang WHERE id=?";
    return pdo_query_one($sql, $id);
}

function khachhang_exist($id){
    $sql = "SELECT count(*) FROM khachhang WHERE id=?";
    return pdo_query_value($sql, $id) > 0;
}

function khachhang_select_by_role($role){
    $sql = "SELECT * FROM khachhang WHERE role=?";
    return pdo_query($sql, $role);
}

function khachhang_change_password($id, $new_password){
    $sql = "UPDATE khachhang SET pass=? WHERE id=?";
    pdo_execute($sql, $new_password, $id);
}
?>