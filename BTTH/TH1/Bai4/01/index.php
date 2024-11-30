

<?php include 'header.php';

?>

<main>
    <div class="btn-add">
        <a href="add.php">
            <button type="button" class="btn btn-success">Thêm mới</button>
        </a>
    </div>

    <div class="container">
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
                    <?php
                        include "db.php";

                        $sql = "SELECT * FROM flowers_store";

                        $result = mysqli_query($conn, $sql);

                        while($row = mysqLi_fetch_array($result)){
                    ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['ten'] ?></td>
                            <td style="padding: 20px; width: 1000px"><?= $row['mota'] ?></td>
                            <td><img src="images/<?= $row['hinhanh'] ?>" alt="<?= $row['ten'] ?>" style="width:100px;height:auto;"></td>
                            <td>
                            <a href="edit.php?this_id=<?= $row['id']?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            </td>
                            <td>
                            <a href="delete.php?this_id=<?= $row['id']?>">
                                    <button><i class="fa-solid fa-trash"></i></button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>

    <div class="btn-reset" style="margin-left: 40px">
        <a href="index.php?reset=true">
            <button type="button" class="btn btn-danger">Đặt lại</button>
        </a>
    </div>
</main>

<?php include 'footer.php'; ?>