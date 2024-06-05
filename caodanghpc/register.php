<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="./register.css">
</head>
<body>
    
    <?php
    $name = $password = "";
    $nameErr = $passwordErr = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["name"])) {
        $nameErr = "Vui lòng nhập tên tài khoản vào trường này!";
        } else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z]*$/", $name)) {
                $nameErr = "Vui lòng nhập chữ cái, không được nhập số!";
            }   elseif (strlen($name) < 5) {
                $nameErr = "Tên tài khoản phải có ít nhất 5 ký tự!";
            }
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Vui lòng nhập mật khẩu vào trường này!";
    } else {
        $password = test_input($_POST["password"]);
        if (strlen($password) < 5) {
            $passwordErr = "Mật khẩu phải có ít nhất 5 ký tự!";
        }
    }

    // kết nối db
    if (empty($nameErr) && empty($passwordErr)) {
        require 'connect.php';

        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $nameErr = "Tài khoản đã tồn tại!";
        } else {
            
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $password);

        if ($stmt->execute()) {
            echo "Đăng ký tài khoản thành công";
            header("Location: login.php");
            exit();
        } else {
            echo "Lỗi: " . $stmt->error;
        }
        }

        $stmt->close();
        $conn->close();

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>


    <div class="container">
        <h1 class="title">Đăng ký</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form">            
            <label for="">Tên tài khoản:</label>
            <input type="text" name="name" class="text" placeholder="Tên tài khoản">
            <span class="message"><?php echo $nameErr; ?></span>
            <label for="">Mật khẩu:</label>
            <input type="password" name="password" class="text" placeholder="Mật khẩu">
            <span class="message"><?php echo $passwordErr; ?></span>
            <input type="submit" name="submit" value="Đăng ký" class="submit">
            <div>Bạn đã có tài khoản?  <a href="login.php">Đăng nhập ngay</a></div>
        </form>
    </div>
</body>
</html>