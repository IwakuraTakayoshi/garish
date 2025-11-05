<?php
session_start();
require "../config/garish-connect.php";

// If not logged in, redirect
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: login.php");
    exit;
}

// Handle form submission
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $instock = $_POST['instock'];

    // Handle image upload
    $imageName = $_FILES['room_image']['name'];
    $imageTmp = $_FILES['room_image']['tmp_name'];

    $uploadDir = "../assets/images/";
    $imagePath = $uploadDir . $imageName;

    move_uploaded_file($imageTmp, $imagePath);

    // Insert into database
    $sql = "INSERT INTO garish_rooms (name, category, price_per_night, room_description, instock, room_image) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if($stmt->execute([$name, $category, $price, $description, $instock, $imageName])){
        $success = "Room added successfully!";
    } else {
        $error = "Something went wrong!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Room | Admin</title>
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
<style>
:root{
    --navy:#001a4d;
    --gold:#d4b256;
}
body{
    background:#f7f7f7;
    font-family:"Segoe UI";
}
.container-box{
    background:white;
    padding:25px;
    border-radius:8px;
    box-shadow:0 0 12px rgba(0,0,0,0.08);
}
.btn-gold{
    background:var(--gold);
    color:var(--navy);
    font-weight:600;
}
</style>
</head>
<body>

<nav class="navbar navbar-dark" style="background:var(--navy);">
  <div class="container-fluid">
    <span class="navbar-brand fw-bold">Admin Panel</span>
    <a href="manage-rooms.php" class="btn btn-light btn-sm">Back</a>
  </div>
</nav>

<div class="container mt-4">
    
    <div class="container-box mx-auto" style="max-width:650px;">
        <h3 class="mb-3">Add New Room</h3>

        <?php if(isset($success)): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>

        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label class="form-label">Room Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price per Night</label>
                <input type="number" name="price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Room Description</label>
                <textarea name="description" rows="4" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Availability</label>
                <select class="form-select" name="instock">
                    <option value="1">Available</option>
                    <option value="0">Booked</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Room Image</label>
                <input type="file" name="room_image" class="form-control" required>
            </div>

            <button type="submit" name="submit" class="btn btn-gold w-100">Add Room</button>

        </form>
    </div>
</div>

</body>
</html>
