<?php
session_start();  


if (isset($_GET['edit'])) {
    $editIndex = $_GET['edit']; 
    if (isset($_SESSION['flowers'][$editIndex])) {
        $flowerToEdit = $_SESSION['flowers'][$editIndex];
    }
} else {
    header('Location: index.php'); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && isset($_POST['description'])) {
        $updatedFlower = [
            'id' => htmlspecialchars($_POST['id']),
            'name' => htmlspecialchars($_POST['name']),
            'description' => htmlspecialchars($_POST['description']),
        ];
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $uploadDir = 'images/';
            $uploadFile = $uploadDir . basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $updatedFlower['image'] = basename($_FILES['image']['name']);
            } else {
                echo "<p style='color:red;'>Lỗi: Không thể tải ảnh lên!</p>";
            }
        } else {
            $updatedFlower['image'] = $flowerToEdit['image'];
        }
        $_SESSION['flowers'][$editIndex] = $updatedFlower;
        header('Location: index.php');
        exit();
    }
}
?>

<?php include 'header.php'; ?>

<main>
    <div class="container">
        <h2>Sửa hoa</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label style="width: 100px;" for="id">Id:</label>
                <input type="text" name="id" id="id" value="<?= htmlspecialchars($flowerToEdit['id']) ?>" required>
            </div>
            <div class="form-group">
                <label style="width: 100px;" for="name">Tên loài hoa:</label>
                <input type="text" name="name" id="name" value="<?= htmlspecialchars($flowerToEdit['name']) ?>" required>
            </div>
            <div style="display: flex; align-items: center; margin-top: 30px;" class="form-group">
                <label style="width: 100px;" for="description">Mô tả:</label>
                <textarea name="description" id="description" required><?= htmlspecialchars($flowerToEdit['description']) ?></textarea>
            </div>
            <div class="form-group" style="display: flex; align-items: center; margin-top: 30px;" >
                <label style="width: 100px;" for="image">Ảnh loài hoa:</label>
                <input type="file" name="image" id="image">
            </div>
            <div style="display: flex; align-items: center; margin-top: 30px;">
                <p style="width: 100px;">Hình ảnh hiện tại:</p>
                <img src="images/<?= htmlspecialchars($flowerToEdit['image']) ?>" alt="<?= htmlspecialchars($flowerToEdit['name']) ?>" style="width:100px;height:auto;">
            </div>
            <button type="submit" style="margin-top: 30px;" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
