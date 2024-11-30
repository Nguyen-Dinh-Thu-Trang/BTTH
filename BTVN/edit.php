<?php
session_start();  // Bắt đầu session

// Kiểm tra nếu có yêu cầu sửa sản phẩm
if (isset($_GET['edit'])) {
    $editIndex = $_GET['edit']; // Lấy chỉ mục của sản phẩm cần sửa
    if (isset($_SESSION['products'][$editIndex])) {
        $productToEdit = $_SESSION['products'][$editIndex];
    }
} else {
    header('Location: index.php'); // Nếu không có sản phẩm để sửa, chuyển hướng về trang index
    exit();
}

// Xử lý form sửa sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy thông tin sửa từ form
    if (isset($_POST['name']) && isset($_POST['price'])) {
        // Cập nhật thông tin sản phẩm
        $_SESSION['products'][$editIndex] = [
            'name' => htmlspecialchars($_POST['name']),
            'price' => htmlspecialchars($_POST['price']),
        ];
        // Sau khi sửa xong, chuyển hướng về trang index.php để hiển thị danh sách sản phẩm
        header('Location: index.php');
        exit();
    }
}
?>

<?php include 'header.php'; ?>

<main>
    <div class="container">
        <h2>Sửa sản phẩm</h2>
        <form method="POST">
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" name="name" id="name" value="<?= htmlspecialchars($productToEdit['name']) ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Giá thành:</label>
                <input type="text" name="price" id="price" value="<?= htmlspecialchars($productToEdit['price']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>