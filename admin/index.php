<?php
session_start();
ob_start();
if (isset($_SESSION['s_user']) && (is_array($_SESSION['s_user'])) && (count($_SESSION['s_user']) > 0)) {
    $admin = $_SESSION['s_user'];
} else {
    header('location: login.php');
}
include "../dao/global.php";
include "../dao/pdo.php";
include "../dao/sanpham.php";
include "../dao/danhmuc.php";
include "../dao/donhang.php";
include "../dao/khachhang.php";
include "../dao/voucher.php";
include "../dao/giohang.php";
include "../dao/binhluan.php";
include "view/header.php";
if (isset($_GET['pg'])) {
    $pg = $_GET['pg'];
    switch ($pg) {
        case 'danhmuclist':
            $danhmuclist = danhmuc_select_all();
            include "view/danhmuclist.php";
            break;
        case 'danhmucadd':
            include "view/danhmucadd.php";
            break;
        case 'adddanhmuc':
            if (isset($_POST['adddanhmuc'])) {
                $name = $_POST['name'];
                $stt = $_POST['stt'];
                danhmuc_insert($name, $stt);
                $danhmuclist = danhmuc_select_all();
                include "view/danhmuclist.php";
            } else {
                $danhmuclist = danhmuc_select_all();
                include "view/danhmucadd.php";
            }
            break;
        case 'danhmucupdate':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $dm = danhmucselect_by_id($id);
            }
            //tro ve danh sach san pham
            $danhmuclist = danhmuc_select_all();
            include "view/danhmucupdate.php";
            break;
        case 'updatedanhmuc':
            //kiem tra va lay du lieu
            if (isset($_POST['updatedanhmuc'])) {
                $name = $_POST['name'];
                $stt = $_POST['stt'];
                $id = $_POST['id'];
                danhmuc_update($id, $name, $stt);
            }
            $danhmuclist = danhmuc_select_all();
            include "view/danhmuclist.php";
            break;
        case 'deldanhmuc':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $inspdm =  get_dssp_all_danhmuc($id);
                if (count($inspdm) > 0) {
                    echo '<script type="text/javascript">

                    window.onload = function () {
                         alert("Bạn không thể xóa danh mục"); 
                        }
                    
                    </script>';
                } else {

                    danhmuc_delete($id);
                }
            }

            $danhmuclist = danhmuc_select_all();
            include "view/danhmuclist.php";
            break;
        case 'sanphamlist':
            $sanphamlist = get_dssp_new(30);
            include "view/sanphamlist.php";
            break;
        case 'sanphamadd':
            $danhmuclist = danhmuc_select_all();
            include "view/sanphamadd.php";
            break;
        case 'addproduct':
            if (isset($_POST['addproduct'])) {
                //lay du lieu ve
                $name = $_POST['name'];
                $price = $_POST['price'];
                $iddm = $_POST['iddm'];
                $img = $_FILES['img']['name'];
                $view = $_POST['view'];
                $bestseller = $_POST['bestseller'];
                $decrise = $_POST['decrise'];
                //insert into
                sanpham_insert($name, $img, $price, $view, $bestseller, $iddm, $decrise);
                //upload file
                $target_file = IMG_PATH_ADMIN . $img;
                move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                //tro ve danh sach san pham
                $sanphamlist = get_dssp_new(30);
                include "view/sanphamlist.php";
            } else {
                $danhmuclist = danhmuc_select_all();
                include "view/sanphamadd.php";
            }

            break;
        case 'delproduct':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $img = IMG_PATH_ADMIN . get_img($id);


                $inspgh = cart_select_all_id_sanpham($id);
                if (count($inspgh) > 0) {
                    echo '<script type="text/javascript">

                    window.onload = function () {
                         alert("Sản phẩm có trong giỏ hàng không thể xóa"); 
                        }
                    
                    </script>';
                } else {

                    if (is_file($img)) {
                        unlink($img);
                    }
                    try {
                        sanpham_delete($id);
                    } catch (\Throwable $th) {
                        echo "<h3 style='color:red;text-align:center'> sản phẩm đã có trong giỏ hàng không được quyền xóa</h3>";
                    }
                }
            }
            //tro ve danh sach san pham
            $sanphamlist = get_dssp_new(30);
            include "view/sanphamlist.php";
            break;
        case 'sanphamupdate':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $sp = sanpham_select_by_id($id);
            }
            //tro ve danh sach san pham
            $danhmuclist = danhmuc_select_all();
            include "view/sanphamupdate.php";
            break;
        case 'updateproduct':
            //kiem tra va lay du lieu
            if (isset($_POST['updateproduct'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $iddm = $_POST['iddm'];
                $id = $_POST['id'];
                $view = $_POST['view'];
                $bestseller = $_POST['bestseller'];
                $decrise = $_POST['decrise'];
                $img = $_FILES['img']['name'];
                if ($img != "") {
                    //upload file
                    $target_file = IMG_PATH_ADMIN . $img;
                    move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                } else {
                    $img = "";
                }
                //insert into
                sanpham_update($name, $img, $price, $view, $bestseller, $iddm, $decrise, $id);
            }
            $sanphamlist = get_dssp_new(30);
            include "view/sanphamlist.php";
            break;
        case 'binhluanlist':
            $binhluanlist = binhluan_select_all();
            include "view/binhluanlist.php";
            break;
        case 'delbinhluan':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                binhluan_delete($id);
            }
            $binhluanlist = binhluan_select_all();
            include "view/binhluanlist.php";
            break;
        case 'donhanglist':
            $donhanglist = bill_select_all();
            include "view/donhanglist.php";
            break;
        case 'donhangupdate':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $dh = bill_select_all_id_admin($id);
            }
            $donhanglist = bill_select_all();
            include "view/donhangupdate.php";
            break;
        case 'updatedonhang':
            if (isset($_POST['updatedonhang'])) {
                $id = $_POST['id'];
                $status = $_POST['status'];
                bill_update($status, $id);
            }
            $donhanglist = bill_select_all();
            include "view/donhanglist.php";
            break;
        case 'donhangct':
            if (isset($_GET['id'])) {
                $idbill = $_GET['id'];
            }

            include "view/chitietdonhang.php";
            break;
        case 'user':
            $userlist = khachhangselect_all();
            include "view/userlist.php";
            break;
        case 'userupdate':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $kh = get_user($id);
            }
            $userlist = khachhangselect_all();
            include "view/userupdate.php";
            break;
        case 'updateuser':
            if (isset($_POST['updateuser'])) {
                $id = $_POST['id'];
                $role = $_POST['role'];
                khachhang_update_admin($role, $id);
            }
            $userlist = khachhangselect_all();
            include "view/userlist.php";
            break;
        case 'voucher':
            $voucherlist = getAllVouchers();
            include "view/voucherlist.php";
            break;
        case 'voucheradd':
            include "view/voucheradd.php";
            break;
        case 'addvoucher':
            if (isset($_POST['addvoucher'])) {
                $voucher = $_POST['voucher'];
                $giatri = $_POST['giatri'];
                addVoucher($voucher, $giatri);
                $voucherlist = getAllVouchers();
                include "view/voucherlist.php";
            } else {
                $voucherlist = getAllVouchers();
                include "view/voucheradd.php";
            }
            break;
        case 'voucherupdate':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $vc = voucher_select_by_id_vc($id);
            }
            //tro ve danh sach san pham
            $voucherlist = getAllVouchers();
            include "view/voucherupdate.php";
            break;
        case 'updatevoucher':
            //kiem tra va lay du lieu
            if (isset($_POST['updatevoucher'])) {
                $voucher = $_POST['voucher'];
                $giatri = $_POST['giatri'];
                $id = $_POST['id'];
                updateVoucher($voucher, $giatri, $id);
            }
            $voucherlist = getAllVouchers();
            include "view/voucherlist.php";
            break;
        case 'delvoucher':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                voucher_delete($id);
            }
            $voucherlist = getAllVouchers();
            include "view/voucherlist.php";
            break;
        case 'logout':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                unset($_SESSION['s_user']);
            }
            header('location: login.php');
            break;
        case 'an':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                sanpham_update_an($id);
            }
            $sanphamlist = get_dssp_new(30);
            include "view/sanphamlist.php";
            break;
        case 'hien':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                sanpham_update_hien($id);
                
            }
            $sanphamlist = get_dssp_new(30);
            include "view/sanphamlist.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
