<?php
    $html_user=showkh_admin($userlist);
?>
<div class="main-content">
                <h3 class="title-page">
                    Khách hàng
                </h3>
                
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                        <th>STT</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Vai trò</th>
                        <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                          <?=$html_user?>     
                    </tbody>
                    <tfoot>
                        
                        <tr>
                        <th>STT</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Vai trò</th>
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