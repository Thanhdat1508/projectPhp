<?php 
$host = "localhost";
$username = "root";
$password = "";
$dpname = "newproject";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dpname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    // Trả về kết nối ($conn)
} catch (PDOException $e) {
    echo "Kết nối không thành công, Mã lỗi: " . $e->getMessage();
}
?>