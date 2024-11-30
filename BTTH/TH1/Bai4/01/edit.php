<?php

    include "db.php";

    $this_id = $_GET['this_id'];

    echo $this_id;

    $sql = "SELECT * FROM flowers_store WHERE id= " .$this_id;

    $query = mysqli_query($conn, $sql);

    $row = mysqLi_fetch_assoc($query);

    if(isset($_POST['btn'])){
        $id = $_POST['id'];
        $ten = $_POST['name'];
        $mota = $_POST['description'];
        $hinhanh = $_FILES['image']['name'];

        $hinhanh_tmp_name = $_FILES['image']['tmp_name'];
        $sql = "UPDATE flowers_store SET ten='$ten', mota ='$mota', hinhanh='$hinhanh' WHERE id =".$this_id;
        mysqli_query($conn, $sql);

        move_uploaded_file($hinhanh_tmp_name, 'images/'.$hinhanh);
        header('location: index.php');
    } 

?>

<?php include 'header.php'; ?>

<main>
    <div class="container">
        <h2>Sửa hoa</h2>
        <form method="POST" action="edit.php?this_id=<?= $this_id ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label style="width: 100px;" for="id">Id:</label>
                <input type="text" name="id" id="id" value="<?= $row['id'] ?>" readonly>
            </div>
            <div class="form-group" style="margin-top: 30px;">
                <label style="width: 100px;" for="name">Tên loài hoa:</label>
                <input type="text" name="name" id="name" value="<?= $row['ten'] ?>" required>
            </div>
            <div style="display: flex; align-items: center; margin-top: 30px;" class="form-group">
                <label style="width: 100px;" for="description">Mô tả:</label>
                <textarea name="description" id="description" required><?= $row['mota'] ?></textarea>
            </div>
            <div class="form-group" style="display: flex; align-items: center; margin-top: 30px;">
                <label style="width: 100px;" for="image">Ảnh loài hoa:</label>
                <input type="file" name="image" id="image">
            </div>
            <div style="display: flex; align-items: center; margin-top: 30px;">
                <p style="width: 100px;">Hình ảnh hiện tại:</p>
                <img src="images/<?= $row['hinhanh'] ?>" alt="<?= $row['ten'] ?>" style="width:100px; height:auto;">
            </div>
            <button type="submit" name="btn" style="margin-top: 30px;" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>