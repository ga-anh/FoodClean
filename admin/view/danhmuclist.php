<?php
    $html_dsdanhmuc=showdm_adm($danhmuclist);
?>
<div class="main-content">
                <h3 class="title-page">
                    Danh mục
                </h3>
                <div class="d-flex justify-content-end">
                    <a href="index.php?pg=danhmucadd" class="btn btn-primary mb-2">Thêm danh mục</a>
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
                        <?=$html_dsdanhmuc;?>
                        
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
    <script src="assets/js/main.js"></script>
    <script>
        new DataTable('#example');
    </script>