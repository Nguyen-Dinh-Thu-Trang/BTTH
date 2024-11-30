<?php
include 'products.php';  
session_start();  


if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = $products;  
}

if (isset($_GET['delete'])) {
    $deleteIndex = $_GET['delete']; 
    if (isset($_SESSION['products'][$deleteIndex])) {
        unset($_SESSION['products'][$deleteIndex]); 
        $_SESSION['products'] = array_values($_SESSION['products']); 
    }
    header('Location: index.php');
    exit();
}

if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
    $_SESSION['products'] = $products;
    header('Location: index.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && isset($_POST['price'])) {
        $newProduct = [
            'name' => htmlspecialchars($_POST['name']),
            'price' => htmlspecialchars($_POST['price']),
        ];
        $_SESSION['products'][] = $newProduct;
        header('Location: index.php');
        exit();
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
        <?php if (empty($_SESSION['products'])): ?>
            <p>Không có sản phẩm nào.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá thành</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['products'] as $index => $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= htmlspecialchars($product['price']) ?> VND</td>
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