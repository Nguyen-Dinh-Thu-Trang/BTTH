<?php
include 'flowers.php';  
session_start();  


if (!isset($_SESSION['flowers'])) {
    $_SESSION['flowers'] = $flowers;  
}

if (isset($_GET['delete'])) {
    $deleteIndex = $_GET['delete']; 
    if (isset($_SESSION['flowers'][$deleteIndex])) {
        unset($_SESSION['flowers'][$deleteIndex]); 
        $_SESSION['flowers'] = array_values($_SESSION['flowers']); 
    }
    header('Location: index.php');
    exit();
}

if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
    $_SESSION['flowers'] = $products;
    header('Location: index.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['id']) &&
        isset($_POST['name']) && 
        isset($_POST['description']) && 
        isset($_FILES['image'])
    ) {
        // Xử lý file ảnh
        $uploadDir = 'images/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $newflower = [
                'id' => htmlspecialchars($_POST['id']),
                'name' => htmlspecialchars($_POST['name']),
                'image' => basename($_FILES['image']['name']),
                'description' => htmlspecialchars($_POST['description']),
            ];
            $_SESSION['flowers'][] = $newflower;

            header('Location: index.php');
            exit();
        } else {
            echo "<p style='color:red;'>Lỗi: Không thể tải ảnh lên!</p>";
        }
    }
}

?>

<?php include 'header.php'; ?>

<main>
    <div class="btn-add">
        <a href="add.php">
            <button type="button" class="btn btn-success">Thêm mới</button>
        </a>
    </div>

    <div class="container">
        <?php if (empty($_SESSION['flowers'])): ?>
            <p>Không có sản phẩm nào.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Loài Hoa</th>
                        <th>Mô tả</th>
                        <th>Hình ảnh</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['flowers'] as $index => $flowers): ?>
                        <tr>
                            <td><?= htmlspecialchars($flowers['id']) ?></td>
                            <td><?= htmlspecialchars($flowers['name']) ?></td>
                            <td style="padding: 20px; width: 1000px"><?= htmlspecialchars($flowers['description']) ?></td>
                            <td><img src="images/<?= htmlspecialchars($flowers['image']) ?>" alt="<?= htmlspecialchars($flowers['name']) ?>" style="width:50px;height:auto;"></td>
                            <td>
                                <a href="edit.php?edit=<?= $index ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="index.php?delete=<?= $index ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                    <button><i class="fa-solid fa-trash"></i></button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <div class="btn-reset" style="margin-left: 40px">
        <a href="index.php?reset=true">
            <button type="button" class="btn btn-danger">Đặt lại</button>
        </a>
    </div>
</main>

<?php include 'footer.php'; ?>
