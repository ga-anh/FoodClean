
<?php
//them loai sp
// xoa loai sp
//show tat ca loai sp
function getAll_LoaiSP($db){
    #code
    $sql="select* from danhmuc";
    $result=$db->query($sql);
    $rows=$result->fetchAll();
    return $rows;
}
function add_LoaiSP($db, $ten){
    $sql = "INSERT INTO danhmuc (name, home, stt) VALUES ('$ten', 0, 0)";
    $result = $db->exec($sql);
    return $result;
}
function update_LoaiSP($db, $id, $ten, $home, $stt){
    $sql = "UPDATE danhmuc SET name = '$ten', home = $home, stt = $stt WHERE id = $id";
    $result = $db->exec($sql);
    return $result;
}
function delete_LoaiSP($db,$ma){
    $sql="delete danhmuc set where maloai=$ma";
    $result=$db->exec($sql);
    return $result;
}
//sua lai du lieu trong bang loaisp

//lay loai sp theo id
function getById_LoaiSP($db,$ma){
    $sql="select * from danhmuc where id=$ma";
        $result=$db->query($sql);
        $row=$result->fetch();
        return $row;
}
