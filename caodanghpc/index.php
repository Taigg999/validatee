<?php
session_start();
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main.css">
    <title>Cao đẳng Hà Nội</title>
</head>

<body>
    <div id="main">
        <div id="header">
            <div class="header-img">
                <img src="./assets/icon.png" alt="">
            </div>
            <div class="header-title">
                <p>
                    BỘ LAO ĐỘNG - THƯƠNG BINH VÀ XÃ HỘI
                </p>
                <p>
                    TRƯỜNG CAO ĐẲNG CÔNG NGHỆ BÁCH KHOA HÀ NỘI
                </p>
            </div>
        </div>
        
        <div id="menu">
            <ul class="nav">
                <li><a href="#">Trang Chủ</a></li>
                <li><a href="#">Đào tạo</a></li>
                <li><a href="#">Hoạt động sinh viên</a></li>
                <li><a href="#">Tuyển sinh</a></li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                <li><a href="admin.php">Trang quản trị</a></li>
                <?php endif; ?>
            </ul>

            <ul class="nav-login">
                <?php if (isset($_SESSION['username'])): ?>
                <li><a href="./logout.php">Đăng xuất</a></li>
                <?php else: ?>
                <li><a href="./login.php">Đăng nhập</a></li>
                <li><a href="./register.php">Đăng ký</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div id="banner">
            <img src="./assets/cntt.png" alt="" width="100%">
        </div>

        <div id="content">
            <h2 class="title-content">Tin tức học tập</h2>
            <div class="box-flex">
                <div class="content-container">
                    <p class="sub-title">Sinh Viên HPC giành quán quân HPC Hackathon 2024</p>
                    <img src="" alt="">
                    <p class="desc-content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates possimus, aliquam rerum eligendi
                        numquam quas dolor! Provident similique quos doloribus maiores incidunt voluptates odit voluptatem
                        molestiae error, architecto vitae assumenda.
                    </p>
                </div>
                <div class="content-container">
                    <p class="sub-title">Sinh Viên HPC giành quán quân HPC Hackathon 2024</p>
                    <img src="" alt="">
                    <p class="desc-content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates possimus, aliquam rerum eligendi
                        numquam quas dolor! Provident similique quos doloribus maiores incidunt voluptates odit voluptatem
                        molestiae error, architecto vitae assumenda.
                    </p>
                </div>
            </div>
            <div class="box-flex">
                <div class="content-container">
                    <p class="sub-title">Sinh Viên HPC giành quán quân HPC Hackathon 2024</p>
                    <img src="" alt="">
                    <p class="desc-content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates possimus, aliquam rerum eligendi
                        numquam quas dolor! Provident similique quos doloribus maiores incidunt voluptates odit voluptatem
                        molestiae error, architecto vitae assumenda.
                    </p>
                </div>
                <div class="content-container">
                    <p class="sub-title">Sinh Viên HPC giành quán quân HPC Hackathon 2024</p>
                    <img src="" alt="">
                    <p class="desc-content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates possimus, aliquam rerum eligendi
                        numquam quas dolor! Provident similique quos doloribus maiores incidunt voluptates odit voluptatem
                        molestiae error, architecto vitae assumenda.
                    </p>
                </div>
            </div>
            <div class="box-flex">
                <div class="content-container">
                    <p class="sub-title">Sinh Viên HPC giành quán quân HPC Hackathon 2024</p>
                    <img src="" alt="">
                    <p class="desc-content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates possimus, aliquam rerum eligendi
                        numquam quas dolor! Provident similique quos doloribus maiores incidunt voluptates odit voluptatem
                        molestiae error, architecto vitae assumenda.
                    </p>
                </div>
                <div class="content-container">
                    <p class="sub-title">Sinh Viên HPC giành quán quân HPC Hackathon 2024</p>
                    <img src="" alt="">
                    <p class="desc-content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates possimus, aliquam rerum eligendi
                        numquam quas dolor! Provident similique quos doloribus maiores incidunt voluptates odit voluptatem
                        molestiae error, architecto vitae assumenda.
                    </p>
                </div>
            </div>
        </div>

        <div id="footer">
            <h1>TRƯỜNG CAO ĐẲNG CÔNG NGHỆ BÁCH KHOA HÀ NỘI</h1>
        </div>
    </div>
</body>

</html>