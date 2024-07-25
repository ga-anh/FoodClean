<?php
require_once 'pdo.php';

function sanpham_insert($name, $img, $price, $view, $bestseller, $iddm, $decrise)
{
    $sql = "INSERT INTO sanpham(name, img, price,view,bestseller,iddm,decrise) VALUES (?,?,?,?,?,?,?)";
    pdo_execute($sql, $name, $img, $price, $view, $bestseller, $iddm, $decrise);
}

function sanpham_update($name, $img, $price, $view, $bestseller, $iddm, $decrise, $id)
{
    if ($img != "") {
        $sql = "UPDATE sanpham SET name=?,img=?,price=?,view=?,bestseller=?,iddm=?,decrise=? WHERE id=?";
        pdo_execute($sql, $name, $img, $price, $view, $bestseller, $iddm, $decrise, $id);
    } else {
        $sql = "UPDATE sanpham SET name=?,price=?,view=?,bestseller=?,iddm=?,decrise=? WHERE id=?";
        pdo_execute($sql, $name, $price, $view, $bestseller, $iddm, $decrise, $id);
    }
}
function sanpham_update_an($id)
{

    $sql = "UPDATE sanpham SET trangthai=1 WHERE id=?";
    pdo_execute($sql, $id);
}
function sanpham_update_hien($id)
{

    $sql = "UPDATE sanpham SET trangthai=0 WHERE id=?";
    pdo_execute($sql, $id);
}
function sanpham_delete($id)
{
    $sql = "DELETE FROM sanpham WHERE  id=?";
    // if(is_array($ma_hh)){
    //     foreach ($ma_hh as $ma) {
    //         pdo_execute($sql, $ma);
    //     }
    // }
    // else{
    pdo_execute($sql, $id);
    // }
}

function get_dssp_all()
{
    $sql = "SELECT * FROM sanpham";
    return pdo_query($sql);
}
function get_dssp_all_danhmuc($id)
{
    $sql = "SELECT * FROM sanpham WHERE iddm=?";
    return pdo_query($sql, $id);
}
function get_dssp_new($limi)
{
    $sql = "SELECT * FROM sanpham ORDER BY id DESC limit " . $limi;
    return pdo_query($sql);
}
function get_dssp_best($limi)
{
    $sql = "SELECT * FROM sanpham WHERE bestseller=1 ORDER BY id DESC limit " . $limi;
    return pdo_query($sql);
}
function get_dssp_view($limi)
{
    $sql = "SELECT * FROM sanpham ORDER BY view DESC limit " . $limi;
    return pdo_query($sql);
}

function get_dssp_lienquan($iddm, $id, $limi)
{
    $sql = "SELECT * FROM sanpham WHERE iddm=? AND id<>? ORDER BY view DESC limit " . $limi;
    return pdo_query($sql, $iddm, $id);
}

function get_dssp($kyw, $iddm, $limi)
{
    $sql = "SELECT * FROM sanpham WHERE 1";
    if ($iddm > 0) {
        $sql .= " AND iddm=" . $iddm;
    }
    if ($kyw != "") {
        $sql .= " AND name like '%" . $kyw . "%'";
    }
    $sql .= " ORDER BY id DESC limit " . $limi;
    return pdo_query($sql);
}
function showsp($dssp)
{
    $html_dssp = '';
    foreach ($dssp as $sp) {
        extract($sp);
        if ($bestseller == 1) {
            $best = '<div class="best"></div>';
        } else {
            $best = '';
        }
        if ($trangthai == 1) {
            $link = "index.php?pg=sanphamchitiet&idsp=" . $id;
            $html_dssp .= '<div class="box25 box80 mr15">
                            ' . $best . '
                            <a href="' . $link . '">
                            <img src="view/images/' . $img . '" alt="">
                            </a> 
                            <span class="price">' . $name . '</span> 
                            <span class="price">' . number_format($price, 0, ",", ".") . ' đ</span>
                            <span class="price">Hết hàng</span>                        
                            
                        </div>';
        } else {
            $link = "index.php?pg=sanphamchitiet&idsp=" . $id;
            $html_dssp .= '<div class="box25 mr15">
                            ' . $best . '
                            <a href="' . $link . '">
                            <img src="view/images/' . $img . '" alt="">
                            </a> 
                            <span class="price">' . $name . '</span>
                            <span class="price">' . number_format($price, 0, ",", ".") . ' đ</span>
                            <form action="index.php?pg=addcart" method="post">
                                <input type="hidden" name="idpro" value="' . $id . '">
                                <input type="hidden" name="tensp" value="' . $name . '">
                                <input type="hidden" name="img" value="' . $img . '">
                                <input type="hidden" name="price" value="' . $price . '">
                                <input type="hidden" name="soluong" value="1">
                                <button type="submit" name="addcart">Đặt hàng</button>
                            </form>
                        </div>';
        }
    }

    return $html_dssp;
}

function sanpham_select_by_id($id)
{
    $sql = "SELECT * FROM sanpham WHERE id=?";
    return pdo_query_one($sql, $id);
}

function get_img($id)
{
    $sql = "SELECT img FROM sanpham WHERE id=?";
    $getimg = pdo_query_one($sql, $id);
    return $getimg['img'];
}
function sanpham_exist($id)
{
    $sql = "SELECT count(*) FROM sanpham WHERE id=?";
    return pdo_query_value($sql, $id) > 0;
}

// function hang_hoa_tang_so_luot_xem($ma_hh){
//     $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
//     pdo_execute($sql, $ma_hh);
// }

// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }

// function hang_hoa_select_by_loai($ma_loai){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
//     return pdo_query($sql, $ma_loai);
// }

// function hang_hoa_select_keyword($keyword){
//     $sql = "SELECT * FROM hang_hoa hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }
function showsp_admin($dssp)
{
    $html_dssp = '';
    $i = 1;
    foreach ($dssp as $sp) {
        extract($sp);
        if ($trangthai == 0) {
            $html_dssp .= '<tr >
                            <td>' . $i . '</td>
                            <td>' . $name . '</td>
                            <td><img src="' . IMG_PATH_ADMIN . $img . '" alt="' . $name . '" width="50px" height="50px"></td>
                            <td>' . $price . '</td>
                            <td>' . $view . '</td>
                            <td>' . $bestseller . '</td>
                            <td>' . $iddm . '</td>
                            <td>' . $decrise . '</td>
                            <td>
                                <a href="index.php?pg=sanphamupdate&id=' . $id . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                <a href="index.php?pg=an&id=' . $id . '" class="btn btn-danger"><i class="fa-solid fa-folder-closed"></i> Ẩn</a>
                            </td>
                        </tr>';
            $i++;
        } else {
            $html_dssp .= '<tr >
                            <td>' . $i . '</td>
                            <td>' . $name . '</td>
                            <td><img src="' . IMG_PATH_ADMIN . $img . '" alt="' . $name . '" width="50px" height="50px"></td>
                            <td>' . $price . '</td>
                            <td>' . $view . '</td>
                            <td>' . $bestseller . '</td>
                            <td>' . $iddm . '</td>
                            <td>' . $decrise . '</td>
                            <td>
                                <a href="index.php?pg=sanphamupdate&id=' . $id . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                <a href="index.php?pg=hien&id=' . $id . '" class="btn btn-danger"><i class="fa-solid fa-folder-open ico-side"></i> Hiện</a>                              
                            </td>
                        </tr>';
            $i++;
        }
    }

    return $html_dssp;
}
