<?php
session_start();
require "../config/garish-connect.php";

// Ensure admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

// Validate id
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: manage-rooms.php?msg=" . urlencode("Invalid room id."));
    exit;
}

$roomId = intval($_GET['id']);

// Get room data (main image)
$stmt = $pdo->prepare("SELECT room_image FROM garish_rooms WHERE id = ?");
$stmt->execute([$roomId]);
$room = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$room) {
    header("Location: manage-rooms.php?msg=" . urlencode("Room not found."));
    exit;
}

// Begin transaction to keep DB consistent
$pdo->beginTransaction();

try {
    // 1) Delete extra images rows & files
    $imgStmt = $pdo->prepare("SELECT image_path FROM room_images WHERE room_id = ?");
    $imgStmt->execute([$roomId]);
    $images = $imgStmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($images as $img) {
        $filePath = realpath(__DIR__ . "/../assets/images/" . $img['image_path']);
        if ($filePath && file_exists($filePath)) {
            @unlink($filePath); // suppress warnings, handle silently
        }
    }

    // Delete room_images rows
    $delImgs = $pdo->prepare("DELETE FROM room_images WHERE room_id = ?");
    $delImgs->execute([$roomId]);

    // 2) Delete main room image file (if exists)
    if (!empty($room['room_image'])) {
        $mainPath = realpath(__DIR__ . "/../assets/images/" . $room['room_image']);
        if ($mainPath && file_exists($mainPath)) {
            @unlink($mainPath);
        }
    }

    // 3) Delete room row
    $delRoom = $pdo->prepare("DELETE FROM garish_rooms WHERE id = ?");
    $delRoom->execute([$roomId]);

    $pdo->commit();

    header("Location: manage-rooms.php?msg=" . urlencode("Room deleted successfully."));
    exit;

} catch (Exception $e) {
    $pdo->rollBack();
    // Log $e->getMessage() to a file or error log in real app
    header("Location: manage-rooms.php?msg=" . urlencode("Error deleting room."));
    exit;
}
