<?php
header('Content-Type: application/json');

$targetDir = "uploads/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileName = uniqid() . '-' . basename($_FILES['image']['name']);
        $targetFile = $targetDir . $fileName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // ตรวจสอบประเภทไฟล์
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedTypes)) {
            echo json_encode(['success' => false, 'message' => 'Only JPG, JPEG, PNG, and GIF files are allowed.']);
            exit;
        }

        // ตรวจสอบขนาดไฟล์ (ไม่เกิน 5MB)
        if ($_FILES['image']['size'] > 5 * 1024 * 1024) {
            echo json_encode(['success' => false, 'message' => 'File size must not exceed 5MB.']);
            exit;
        }

        // อัปโหลดไฟล์
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            echo json_encode([
                'success' => true,
                'file_url' => $targetFile
            ]);
            exit;
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to upload the file.']);
            exit;
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No file uploaded.']);
        exit;
    }
    error_reporting(E_ALL);
ini_set('display_errors', 1);

}
?>
