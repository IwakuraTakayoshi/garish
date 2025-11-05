<?php
session_start();
require "../config/garish-connect.php";

if(!isset($_SESSION['admin_logged_in'])){
    header("Location: login.php");
    exit;
}

if(!isset($_GET['id'])){
    header("Location: manage-rooms.php");
    exit;
}

$room_id = $_GET['id'];

// Fetch current room data
$sql = "SELECT * FROM garish_rooms WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$room_id]);
$room = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$room){
    die("Room not found.");
}

// Handle update
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $instock = $_POST['instock'];

    // Handle image update
    $newImage = $_FILES['room_image']['name'];
    if($newImage){
        $tmp = $_FILES['room_image']['tmp_name'];
        $path = "../assets/images/".$newImage;
        move_uploaded_file($tmp, $path);
    } else {
        $newImage = $room['room_image']; // keep old image
    }

    $update_sql = "UPDATE garish_rooms SET name=?, category=?, price_per_night=?, room_description=?, instock=?, room_image=? WHERE id=?";
    $stmt = $pdo->prepare($update_sql);

    if($stmt->execute([$name, $category, $price, $description, $instock, $newImage, $room_id])){
        $success = "Room updated successfully!";
        // refresh data
        $stmt->execute([$room_id]);
    } else {
        $error = "Error updating room.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Room</title>
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
<style>
:root { --navy:#001a4d; --gold:#d4b256; }
body { background:#f7f7f7; font-family:"Segoe UI"; }
.box { background:#fff; padding:25px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1); }
.btn-gold { background:var(--gold); color:var(--navy); font-weight:600; }
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
  <div class="box mx-auto" style="max-width:650px;">
    <h3>Edit Room</h3>
    <?php if(isset($success)): ?>
      <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <?php if(isset($error)): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">

      <div class="mb-3">
        <label class="form-label">Room Name</label>
        <input type="text" name="name" class="form-control" value="<?= $room['name'] ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Category</label>
        <input type="text" name="category" class="form-control" value="<?= $room['category'] ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Price per Night</label>
        <input type="number" name="price" class="form-control" value="<?= $room['price_per_night'] ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="4" class="form-control"><?= $room['room_description'] ?></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Availability</label>
        <select class="form-select" name="instock">
            <option value="1" <?= $room['instock']==1 ? 'selected':'' ?>>Available</option>
            <option value="0" <?= $room['instock']==0 ? 'selected':'' ?>>Booked</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Room Image</label><br>
        <img src="../assets/images/<?= $room['room_image'] ?>" width="120" class="mb-2 rounded">
        <input type="file" name="room_image" class="form-control">
      </div>

      <button name="update" class="btn btn-gold w-100">Update Room</button>

    </form>
  </div>
</div>

</body>
</html>
