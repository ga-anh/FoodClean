<?php
$html_dsbinhluan = showbl_adm($binhluanlist);
?>
<div class="main-content">
    <h3 class="title-page">
        Danh mục
    </h3>

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Mã bình luận</th>
                <th>Nội dung</th>
                <th>Ngày bình luận</th>
                <th>Tên</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?= $html_dsbinhluan; ?>

        </tbody>
        <tfoot>
            <tr>
                <th>Mã bình luận</th>
                <th>Nội dung</th>
                <th>Ngày bình luận</th>
                <th>Tên</th>
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