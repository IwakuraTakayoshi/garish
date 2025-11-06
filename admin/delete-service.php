<?php
session_start();
require "../config/garish-connect.php";

if(!isset($_SESSION['admin_logged_in'])){
    header("Location: login.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM services WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: manage-services.php");
exit;
?>
