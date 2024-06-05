<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php"); 
    exit();
}

require 'connect.php'; 

// Xử lý xóa tài khoản
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_sql = "DELETE FROM users WHERE id = $delete_id";
    $conn->query($delete_sql);
    header("Location: admin.php");
    exit();
}

// Xử lý thay đổi vai trò
if (isset($_POST['change_role'])) {
    $user_id = $_POST['user_id'];
    $new_role = $_POST['role'];
    $update_sql = "UPDATE users SET role = '$new_role' WHERE id = $user_id";
    $conn->query($update_sql);
    header("Location: admin.php");
    exit();
}

// Truy xuất danh sách tài khoản
$sql = "SELECT id, username, role FROM users";
$result = $conn->query($sql);

if (isset($_POST['add_user'])) {
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];

   
    if (strlen($new_username) > 5 && strlen($new_password) > 5) {
 
        $check_sql = "SELECT username FROM users WHERE username = '$new_username'";
        $result = $conn->query($check_sql);

        if ($result->num_rows == 0) {
            // $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, password, role) VALUES ('$new_username', '$hashed_password', 'user')";
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Tài khoản đã được thêm thành công!"); window.location.href="admin.php";</script>';
                exit();
            } else {
                echo "Lỗi khi thêm tài khoản: " . $conn->error; 
            }
        } else {
            echo '<script>alert("Tên đăng nhập đã tồn tại. Vui lòng chọn tên đăng nhập khác.");</script>';
        }
    } else {
        echo '<script>alert("Tên đăng nhập và mật khẩu phải có ít nhất 5 ký tự.");</script>';

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
</head>
<body>
    <div id="main">
        
        <h1>Chào mừng, quản trị viên <?php echo $_SESSION['username']; ?>!</h1>
        <p>Đây là trang quản trị.</p>
        <a href="logout.php">Đăng xuất</a>

        <h2>Quản lý tài khoản</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Tài khoản</th>
                <th>Quyền</th>
                <th>Thay đổi</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["role"] . "</td>";
                    echo "<td>";
                    echo "<a href='admin.php?delete=" . $row["id"] . "' onclick=\"return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');\">Xóa</a>";
                    echo " | ";
                    echo "<form method='POST' action='admin.php' style='display:inline;'>";
                    echo "<input type='hidden' name='user_id' value='" . $row["id"] . "'>";
                    echo "<select name='role'>";
                    echo "<option value='user'" . ($row["role"] == 'user' ? " selected" : "") . ">User</option>";
                    echo "<option value='admin'" . ($row["role"] == 'admin' ? " selected" : "") . ">Admin</option>";
                    echo "</select>";
                    echo "<input type='submit' name='change_role' value='Thay đổi'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Không có tài khoản nào.</td></tr>";
            }
            ?>
        </table>
        <h2>Thêm tài khoản mới</h2>
        <form method="post" action="">
            <label for="new_username">Tài khoản:</label>
            <input type="text" id="new_username" name="new_username" required><br><br>

            <label for="new_password">Mật khẩu:</label>
            <input type="password" id="new_password" name="new_password" required><br><br>

            <input type="submit" name="add_user" value="Thêm tài khoản">
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
