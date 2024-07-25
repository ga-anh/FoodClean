<?php
function getAll_SanPham($db){
    $sql = "SELECT * FROM sanpham";
    $result = $db->query($sql);
    $rows = $result->fetchAll();
    return $rows;
}

function add_SanPham($db, $name, $img, $price, $view, $bestseller, $iddm){
    $sql = "INSERT INTO sanpham (name, img, price, view, bestseller, iddm) VALUES (:name, :img, :price, :view, :bestseller, :iddm)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':view', $view);
    $stmt->bindParam(':bestseller', $bestseller);
    $stmt->bindParam(':iddm', $iddm);

    $result = $stmt->execute();
    return $result;
}

function update_SanPham($db, $id, $name, $img, $price, $view, $bestseller, $iddm){
    $sql = "UPDATE sanpham SET name=:name, img=:img, price=:price, view=:view, bestseller=:bestseller, iddm=:iddm WHERE id=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':view', $view);
    $stmt->bindParam(':bestseller', $bestseller);
    $stmt->bindParam(':iddm', $iddm);
    $stmt->bindParam(':id', $id);


    $result = $stmt->execute();
    return $result;
}

// function delete_SanPham($db, $id){
//     $sql = "DELETE FROM sanpham WHERE id=:id";
//     $stmt = $db->prepare($sql);
//     $stmt->bindParam(':id', $id);

//     $result = $stmt->execute();
//     return $result;
// }

function getById_SanPham($db, $id){
    $sql = "SELECT * FROM sanpham WHERE id=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);

    $stmt->execute();
    $row = $stmt->fetch();
    return $row;
}

// function getById_CauHinh($db, $id){
//     $sql = "SELECT * FROM mota WHERE id=:id";
//     $stmt = $db->prepare($sql);
//     $stmt->bindParam(':id', $id);

//     $stmt->execute();
//     $row = $stmt->fetch();
//     return $row;
// }
?>