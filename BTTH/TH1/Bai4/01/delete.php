<?php

    include "db.php";

    $this_id = $_GET['this_id'];

    $sql = "DELETE FROM flowers_store WHERE id='$this_id'";
    mysqli_query($conn, $sql);

    // Đặt lại AUTO_INCREMENT sau khi xóa
    mysqli_query($conn, "SET @new_id = (SELECT IFNULL(MAX(id), 0) + 1 FROM flowers_store)");
    mysqli_query($conn, "ALTER TABLE flowers_store AUTO_INCREMENT = @new_id");

    header('location: index.php');

?>