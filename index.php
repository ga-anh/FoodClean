<?php
// include_once 'model/config.php';
// include_once 'model/product.php';

session_start();
ob_start();
if (!isset($_SESSION["giohang"])) {
    $_SESSION["giohang"] = [];
}



include "dao/pdo.php";
include "dao/danhmuc.php";
include "dao/sanpham.php";
include "dao/khachhang.php";
include "dao/donhang.php";
include "dao/voucher.php";
include "dao/giohang.php";

include "view/header.php";



//data danh cho trang chu

$dssp_new = get_dssp_new(12);
$dssp_best = get_dssp_best(6);
$dssp_view = get_dssp_view(8);
// if(!isset($_SESSION['admin'])){
//     header('location:dangnhap.php');
// }else{
//     $useradmin=$_SESSION['username'];
//     $emailadmin=$_SESSION['email'];

// }


if (!isset($_GET['pg'])) {
    include "view/home.php";
} else {
    switch ($_GET['pg']) {
        case 'sanpham':
            $dsdm = danhmuc_select_all();

            $kyw = "";
            $titlepage = "";

            if (!isset($_GET['iddm'])) {
                $iddm = 0;
            } else {
                $iddm = $_GET['iddm'];
                $titlepage = get_name_dm($iddm);
            }
            //kiem tra co phai form search
            if (isset($_POST["timkiem"]) && ($_POST["timkiem"])) {
                $kyw = $_POST["kyw"];
                $titlepage = "Ket qua tim kiem voi tu khoa: <span>" . $kyw . "</span>";
            }

            $dssp = get_dssp($kyw, $iddm, 24);
            include "view/sanpham.php";
            break;
        case 'addcart':
            //lay du lieu tu form
            if (isset($_POST["addcart"])) {
                $idpro = $_POST["idpro"];
                $name = $_POST["tensp"];
                $img = $_POST["img"];
                $price = $_POST["price"];
                $soluong = $_POST["soluong"];
                $thanhtien = (int)$soluong * (int)$price;
                $sp = array("idpro" => $idpro, "name" => $name, "img" => $img, "price" => $price, "soluong" => $soluong, "thanhtien" => $thanhtien);
       
                $product_exists = false;
                foreach ($_SESSION['giohang'] as $key => $cart_item) {
                    if ($cart_item['name'] === $name) {
                        $product_exists = true;
                        
                        $_SESSION['giohang'][$key]['soluong'] += $soluong;
                        break;
                    }
                }

               
                if (!$product_exists) {
                    array_push($_SESSION['giohang'], $sp);

                }
                header('location: index.php?pg=viewcart');
            }

            // include "view/addcart.php";
            break;

        case 'viewcart':


            if (isset($_GET['delete']) && ($_GET['delete'] >= 0)) {
                array_splice($_SESSION["giohang"], $_GET['delete'], 1);
                header('location: index.php?pg=viewcart');
            }
            if (isset($_GET['del']) && ($_GET['del'] == 1)) {
                unset($_SESSION["giohang"]);
                // $_SESSION["giohang"]=[];
                header('location: index.php?pg=viewcart');
            } else {
                if (isset($_SESSION["giohang"])) {
                    $tongdonhang = get_tongdonhang();
                }
                $giatrivoucher = 0;
                if (isset($_GET['voucher']) && ($_GET['voucher'] == 1)) {
                    $voucher = $_POST['mavoucher'];
                    $vcgt = voucher_select_by_id($voucher);
                    $_SESSION['voucher_big'] = $vcgt;
                    if (isset($_SESSION['voucher_big']) && (count($_SESSION['voucher_big']) > 0)) {
                        unset($_SESSION['voucher_big']);
                        $voucher = $_POST['mavoucher'];
                        $giamgia = voucher_select_by_id($voucher);
                        $_SESSION['voucher_big'] = $giamgia;
                    } else {
                        $voucher = $_POST['mavoucher'];
                        $giamgia = voucher_select_by_id($voucher);
                        $_SESSION['voucher_big'] = $giamgia;
                    }
                    $giatrivoucher = $_SESSION['voucher_big']['giatri'];
                }
                $thanhtoan = $tongdonhang - $giatrivoucher;

                include "view/viewcart.php";
            }
            if (isset($_GET['tangsl']) && ($_GET['tangsl'] == 1)) {
                if (isset($_POST["suasl"])) {
                    $soluong = $_POST['soluong'];
                    if ($soluong > 0) {
                        $sodem = $_POST['sodem'];
                        $_SESSION['giohang'][$sodem]['soluong'] = $soluong;
                    }
                }
                header('location: index.php?pg=viewcart');
            }

            break;
        case 'sanphamchitiet':

            if (isset($_GET['idsp'])) {
                $id = $_GET['idsp'];
                $spchitiet = sanpham_select_by_id($id);
                $dsdm = danhmuc_select_all();
                $iddm = $spchitiet['iddm'];
                $splienquan = get_dssp_lienquan($iddm, $id, 4);
                include "view/sanphamchitiet.php";
            } else {
                include "view/home.php";
            }


            break;


        case 'login':
            //input
            if (isset($_POST["dangnhap"]) && ($_POST["dangnhap"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                
                //xu ly:kiem tra
                $kq = khachhang_check($username, $password);
                if (is_array($kq) && (count($kq))) {
                    $_SESSION['s_user'] = $kq;
                    if ($bill == 1) { // click dang nhap tu gio hang 
                        header('location: index.php?pg=donhang');
                    } else if ($_SESSION['trang'] == "sanphamchitiet") { //click dang nhap tu binh luan
                        header('location: index.php?pg=sanphamchitiet&idsp=' . $_SESSION['idpro'] . '#binhluan');
                    } else {
                        header('location: index.php');
                    }
                } else {
                    $tb = "Tai khoan khong ton tai hoac nhap sai thong tin";
                    $_SESSION['tb_dangnhap'] = $tb;
                    header('location: index.php?pg=dangnhap');
                }
            }
            break;
        case 'dangnhap':



            include "view/dangnhap.php";
            break;
        case 'donhang':

            $giatrivoucher = 0;
            if (isset($_SESSION['voucher_big']) && (count($_SESSION['voucher_big']))) {
                $giatrivoucher = ($_SESSION['voucher_big']['giatri']);
                $voucher = ($_SESSION['voucher_big']['voucher']);
            } else {
                $giatrivoucher = 0;
                $voucher = "";
            }



            if (isset($_SESSION["giohang"])) {
                $tongdonhang = get_tongdonhang();
            }

            // if (isset($_GET['voucher']) && ($_GET['voucher'] == 1)) {
            //     $tongdonhang = $_POST['tongdonhang'];
            //     $mavoucher = $_POST['mavoucher'];
            //     // so sanh voi db de lay gia tri ve
            //     $giatrivoucher = 0;

            // }
            $thanhtoan = $tongdonhang - $giatrivoucher;

            include "view/donhang.php";
            break;


        case 'donhangsubmit':


            if (isset($_POST['donhangsubmit'])) {
                $hoten = $_POST['hoten'];
                $diachi = $_POST['diachi'];
                $email = $_POST['email'];
                $dienthoai = $_POST['dienthoai'];
                $nguoinhan_ten = $_POST['hoten_nguoinhan'];
                $nguoinhan_diachi = $_POST['diachi_nguoinhan'];
                $nguoinhan_tell = $_POST['dienthoai_nguoinhan'];
                $pttt = $_POST['pttt'];
                //insert user moi
                $username = "guest" . rand(1, 999);
                $password = "123456";
                if (isset($_SESSION['s_user'])) {
                    $iduser = $_SESSION['s_user']['id'];
                } else {
                    $iduser = khachhang_insert_id($username, $password, $hoten, $diachi, $email, $dienthoai);
                }

                //tao don hang
                $madh = "FOOD-FC" . $iduser . "-" . date("His-dmY");
                $total = get_tongdonhang();
                $status = "Chờ xác nhận";
                if (isset($_SESSION['giatrivoucher'])) {
                    $voucher = $_SESSION['giatrivoucher'];
                } else {
                    $voucher = 0;
                }

                $tongthanhtoan = ($total - $voucher);
                $idbill = bill_insert_id($madh, $iduser, $hoten, $email, $dienthoai, $diachi, $nguoinhan_ten, $nguoinhan_diachi, $nguoinhan_tell, $total, $voucher, $tongthanhtoan, $pttt, $status);
                //insert gio hang tu session vao table cart
                foreach ($_SESSION['giohang'] as $sp) {
                    extract($sp);
                    cart_insert($idpro, $price, $name, $img, $soluong, $thanhtien, $idbill);
                }
                $_SESSION['giohang'] = null;
                header('location: index.php?pg=donhangsubmit&madh=' . $madh);
            }
            include "view/donhang_confirm.php";
            break;
        case 'myaccount':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                include "view/myaccount.php";
            }
            break;

        case 'logout':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                unset($_SESSION['s_user']);
            }
            header('location: index.php');
            break;
        case 'adduser':
            //xac dinh gia tri input
            if (isset($_POST["dangky"]) && ($_POST["dangky"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                //xu ly
                khachhang_insert($username, $password, $email);
            }
            include "view/dangnhap.php";
            break;
        case 'updateuser':
            //xac dinh gia tri input
            if (isset($_POST["capnhat"]) && ($_POST["capnhat"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $ten = $_POST["ten"];
                $email = $_POST["email"];
                $diachi = $_POST['diachi'];
                $dienthoai = $_POST["dienthoai"];
                $id = $_POST["id"];
                $role = 0;
                //xu ly
                khachhang_update($username, $password, $ten, $email, $diachi, $dienthoai, $role, $id);
                include "view/myaccount_confirm.php";
            }

            break;
        case 'dangky':
            include "view/dangky.php";
            break;
        case 'trangcanhan':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                include "view/trangcanhan.php";
            }

            break;
        case 'theodoidh':


            if (isset($_GET['huydon'])) {
                $id = $_GET['huydon'];

                $tdbill = bill_select_all_id_admin($id);


                $status = $tdbill['status'];
                if ($status == "Chờ xác nhận") {
                    bill_update_user($id);
                } else {

                    echo '<script type="text/javascript">

                    window.onload = function () {
                         alert("Bạn không thể hủy đơn hàng"); 
                        }
                    
                    </script>';
                }
            }
            $iddh = "";
            include "view/theodoidh.php";

            break;
        case 'chitietdh':
            if (isset($_GET['iddh'])) {
                $idbill = $_GET['iddh'];

                include "view/chitietdh.php";
            } else {
                include "view/home.php";
            }

            break;
        case 'gioithieu':
            include "view/gioithieu.php";
            break;

        default:
            include "view/home.php";
            break;
    }
}

include "view/footer.php";
