<?php
if (is_array($kh)) {
    extract($kh);
}
?>
<div class="main-content">
    <h3 class="title-page">
        Cập nhật khách hàng
    </h3>

    <form class="addPro" action="index.php?pg=updateuser" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Mã khách hàng:</label>
            <input type="text" class="form-control" name="id" value="<?php echo $id ?>" readonly>
        </div>
        <div class="form-group">
            <label for="name">Vai trò:</label>
            <select class="form-select" name="role" aria-label="Default select example">
                <option value="0">0:User</option>
                <option value="1">1:Admin</option>
            </select>
        </div>
        <div class="form-group">

            <button type="submit" name="updateuser" class="btn btn-primary">Cập nhật khách hàng</button>
        </div>
    </form>
</div>

<script>
    new DataTable('#example');
</script>