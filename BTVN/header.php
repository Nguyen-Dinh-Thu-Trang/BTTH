<!DOCTYPE html>
<html>
<head>
 <title>Trang Sản Phẩm</title>
 <link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
 <script type="text/javascript" src="./bootstrap.bundle.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <style>
    .product-list {
        list-style: none;
    }
    .header-list {
        display: flex;
        gap: 30px;
        padding-left: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        align-items: center;
    }
    .text {
        text-decoration: none;
        color: black;
        font-size: 20px;
        font-weight: normal;
        margin: 0;
        padding: 20px;
    }
    .text.text-large {
        font-size: 20px;
        font-weight: 600;
        color: black;
    }
    table {
        width: 100%;
        text-align: center;
    }
    th {
        border: 1px solid #cccc;
    }
    tr {
        border: 1px solid #cccc;
        height: 50px;
    }
    td {
        border: 1px solid #cccc;
        text-align: center;
    }
    .container {
        padding: 40px 30px 40px 30px;
        max-width: 1110px;
        width: 100%;
        margin: 0 auto;
    }
    .btn-add {
        margin: 40px 0px 0px 40px;
    }
    .fa-solid {
        color: blue;
    }
    button {
        outline: none;
        border: none;
        background-color: white;
    }
 </style>
</head>
<body>
    <header>
        <div class="header-list">
            <p class="text text-large">Administration</p>
            <a href="home.php" class="text">Trang chủ</a>
            <a href="external.php" class="text">Trang ngoài</a>
            <a href="index.php" class="text">Thể loại</a>
            <a href="author.php" class="text">Tác giả</a>
            <a href="article.php" class="text">Bài viết</a>
        </div>
    </header>