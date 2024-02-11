<?php
include('../config/db_connect.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $short_description = $_POST['short_description'];
    $date = time();
    // Xử lý tệp ảnh
    $targetDirectory = "img/"; // Thư mục lưu trữ tệp ảnh
    $targetFile = $targetDirectory . basename($_FILES['image']['name']); // Đường dẫn đến tệp ảnh trên máy chủ

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $url_img = $targetFile; // Lưu URL của tệp ảnh vào biến $url_img
    } else {
        echo "Error uploading image file.";
        exit;
    }

    $sql = "INSERT INTO article (title, description, img, abstract, created_at) VALUES (?, ?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("sssss", $name, $description, $url_img, $short_description, $date);

        if ($stmt->execute()) {
            header("Location: index.php");
        } else {
            header("Location: 404.php");
        }

        $stmt->close();
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }

    // Đóng kết nối
    $conn->close();
}

?>

