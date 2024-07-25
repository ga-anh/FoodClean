<?php
    $tongsp=0;
    $spall=get_dssp_all();
    foreach($spall as $sp){
        $tongsp++;
    }
    $tongdm=0;
    $spell= danhmuc_select_all();
    foreach($spell as $dm){
        $tongdm++;
    }
    $tongkh=0;
    $spull= khachhangselect_all();
    foreach($spull as $kh){
        $tongkh++;
    }
    $tongdh=1;
    $spill=bill_select_all();
    $html_dsdh='';
    foreach($spill as $dh){
        extract($dh);
        $html_dsdh.='<tr>
                            <td>'.$tongdh.'</td>
                            <td>'.$madh.'</td>
                            <td>'.$status.'</td>
                        </tr>';
                        $tongdh++;
    }
    $tongdtdh=1;
    $dtdh=bill_select_all();
    $html_dsdtdh='';
    foreach($dtdh as $dh){
        extract($dh);
        $html_dsdtdh.='<tr>
                            <td>'.$tongdtdh.'</td>
                            <td>'.$madh.'</td>
                            <td>'.$tongthanhtoan.'</td>
                        </tr>';
                        $tongdtdh++;
    }
    $tongdt=0;
    $dt=bill_select_all();
    foreach($dt as $dh){
        $tongdt+=$tongthanhtoan;
    }
?>
<style>
    .col-xl-2{
        width: 50%;
    }
</style>
<div class="main-content">
            <h1>Bạn đang đăng nhập trang: <?=$admin["username"]?> </h1>
                <h3 class="title-page">
                    Thống kê
                </h3>
                <section class="statistics row">
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <a href="products.html">
                            <div class="card mb-3 widget-chart">
                                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                                    <h5>
                                        Tổng sản phẩm
                                    </h5>
                                </div>
                                <span class="widget-numbers">
                                    <?=$tongsp?>
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <a href="user.html">
                            <div class="card mb-3 widget-chart">

                                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                                    <h5>
                                        Tổng thành viên
                                    </h5>
                                </div>
                                <span class="widget-numbers">
                                    <?=$tongkh?>
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <a href="caterogies.html">
                            <div class="card mb-3 widget-chart">
                                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                                    <h5>
                                        Tổng danh mục
                                    </h5>
                                </div>
                                <span class="widget-numbers">
                                    <?=$tongdm?>
                                </span>
                            </div>
                        </a>
                    </div>
                    
                </section>
                <section class="row">
                    <div class="col-sm-12 col-md-6 col xl-6">
                        <div class="card chart">
                            <!-- <form action="#" method="post">
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" placeholder="Username"
                                        aria-label="Username">
                                    <span class="input-group-text">Đến ngày</span>
                                    <input type="date" class="form-control" placeholder="Server" aria-label="Server">
                                    <button type="button" class="btn btn-primary">Xem</button>
                                </div>
                            </form> -->
                            <p>Tổng doanh thu: <span><?=number_format($tongdt,0,",",".")?></span></p>
                            <table class="revenue table table-hover">
                                <thead>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Doanh thu</th>
                                </thead>
                                <tbody>
                                    <?=$html_dsdtdh?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-2">
                        <div class="card chart">
                            <h4>Đơn hàng mới</h4>
                            <table class="revenue table table-hover">
                                <thead>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Trạng thái</th>
                                </thead>
                                <tbody>
                                    <?=$html_dsdh?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="col-sm-12 col-md-6 col-xl-3">
                        <div class="card chart">
                            <h4>Khách hàng mới</h4>
                            <table class="revenue table table-hover">
                                <thead>
                                    <th>#</th>
                                    <th>Username</th>
                                </thead>
                                <tbody>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div> -->
                </section>
            </div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
        new DataTable('#example');
    </script>