<?php include 'header.php'; ?>

<div><h2 style="margin-top: 40px; margin-left: 40px;">THÊM LOÀI HOA</h2></div>
<form style="margin-left: 40px;" action="index.php" method="post" enctype="multipart/form-data">
    <label style="width: 100px; margin-top: 20px" for="id">Id: </label>
    <input type="text" id="id" name="id" placeholder="Nhập vào id" required><br>
    <label style="margin-top: 30px;width: 100px" for="name">Tên loài hoa:</label>
    <input type="text" id="name" name="name" placeholder="Nhập tên loài hoa" required>
    <br>
    <label style="margin-top: 30px;width: 100px" for="image">Tải ảnh:</label>
    <input type="file" id="image" name="image" accept="image/*" required>
    <br>
    <div style="display: flex; margin-top: 30px; align-items: center;"> 
        <label style="width: 100px" for="description">Mô tả sản phẩm:</label>
        <textarea id="description" name="description" placeholder="Nhập mô tả sản phẩm" rows="4" required></textarea>
    </div>
    <button class="btn btn-info" style="margin-top: 30px" type="submit">Thêm loài hoa</button>
</form>

<?php include 'footer.php'; ?>


