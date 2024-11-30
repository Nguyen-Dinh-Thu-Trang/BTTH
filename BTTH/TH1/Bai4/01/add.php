<?php include 'header.php';
    include "db.php";

    if( isset($_POST['btn']) ){
        
        $name = $_POST['name'];

        $image = $_FILES['image']['name'];

        $image_tmp_name = $_FILES['image']['tmp_name'];

        $mota = $_POST['description'];

        $sql = "INSERT INTO flowers_store (id,ten,mota,hinhanh)
        VALUE('','$name','$mota','$image')
        ";

        mysqli_query($conn, $sql);

        move_uploaded_file($image_tmp_name, 'images/'.$image);

        $reorder_sql = "
        SET @count = 0; 
        UPDATE flowers_store SET id = (@count:=@count+1); 
        ALTER TABLE flowers_store AUTO_INCREMENT = 1;
        ";
        mysqli_multi_query($conn, $reorder_sql);

        header('location: index.php');

    }
?>

<div><h2 style="margin-top: 40px; margin-left: 40px;">THÊM LOÀI HOA</h2></div>
<form style="margin-left: 40px;" action="add.php" method="post" enctype="multipart/form-data">
    <label style="margin-top: 30px;width: 100px" for="name">Tên loài hoa:</label>
    <input type="text" id="name" name="name" placeholder="Nhập tên loài hoa" >
    <br>
    <label style="margin-top: 30px;width: 100px" for="image">Tải ảnh:</label>
    <input type="file" id="image" name="image" accept="image/*" >
    <br>
    <div style="display: flex; margin-top: 30px; align-items: center;"> 
        <label style="width: 100px" for="description">Mô tả sản phẩm:</label>
        <textarea id="description" name="description" placeholder="Nhập mô tả sản phẩm" rows="4" ></textarea>
    </div>
    <button class="btn btn-info" style="margin-top: 30px" name="btn" type="submit">Thêm loài hoa</button>
</form>

<?php include 'footer.php'; ?>

