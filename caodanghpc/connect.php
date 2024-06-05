<?php
$servername = "localhost";  
$username = "root";         
$dbpassword = "";          
$dbname = "validate"; 

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
} else {
    echo "<h1>Kết nối thành công!</h1>";
}
?>