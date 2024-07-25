<?php
    $html_bill=showdh_admin($donhanglist);
?>
<style>
    .btn-warning2{
        margin-top: 5px;
        color: white;
        background-color:#dc3545;
        border-color: #dc3545;
    }
</style>
<div class="main-content">
                <h3 class="title-page">
                    Đơn hàng 
                </h3>
                
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Mã người dùng</th>
                        <th>Tên người đặt</th>
                        <th>Email người đặt</th>
                        <th>Số điện thoai người đặt</th>
                        <th>Địa chỉ người đặt</th>
                        <th>Trạng thái </th>
                        <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                          <?=$html_bill?>         
                    </tbody>
                    <tfoot>
                        
                        <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Mã người dùng</th>
                        <th>Tên người đặt</th>
                        <th>Email người đặt</th>
                        <th>Số điện thoai người đặt</th>
                        <th>Địa chỉ người đặt</th>
                        <th>Trạng thái </th>
                        <th>Thao tác</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
        new DataTable('#example');
    </script>