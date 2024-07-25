<?php
    $html_voucher=showvc_adm($voucherlist);
?>
<div class="main-content">
                <h3 class="title-page">
                    Voucher
                </h3>
                <div class="d-flex justify-content-end">
                    <a href="index.php?pg=voucheradd" class="btn btn-primary mb-2">Thêm voucher</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th>STT</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?=$html_voucher;?>
                        
                    </tbody>
                    <tfoot>
                        <tr>    
                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th>STT</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>