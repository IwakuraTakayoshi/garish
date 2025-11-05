<?php
session_start();
require "../config/garish-connect.php";

// Deny access if not logged in
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: login.php");
    exit;
}

// Fetch rooms
$sql = "SELECT * FROM garish_rooms ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Rooms | Admin</title>
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">

<style>
:root{
    --navy:#001a4d;
    --gold:#d4b256;
}
body{
    background:#fafafa;
    font-family:"Segoe UI";
}
.table-wrapper{
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,0.05);
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
    <a class="navbar-brand fw-bold">Admin Panel</a>
    <a href="dashboard.php" class="btn btn-sm btn-outline-light">Back to Dashboard</a>
    <a href="logout.php" class="btn btn-sm btn-light">Logout</a>
  </div>
</nav>

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h3>Manage Rooms</h3>
        <a href="add-room.php" class="btn btn-gold">+ Add New Room</a>
    </div>

    <div class="table-wrapper">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Room</th>
                    <th>Category</th>
                    <th>Price/Night</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($rooms as $room): ?>
                    <tr>
                        <td><?= $room['id'] ?></td>
                        <td><?= $room['name'] ?></td>
                        <td><?= $room['category'] ?></td>
                        <td>$<?= $room['price_per_night'] ?></td>

                        <td>
                            <?php if($room['instock']==1): ?>
                                <span class="badge bg-success">Available</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Booked</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <img src="../assets/images/<?= $room['room_image'] ?>" 
                                 width="70" height="50" style="object-fit:cover;border-radius:5px;">
                        </td>

                        <td>
                            <a href="edit-room.php?id=<?= $room['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="delete-room.php?id=<?= $room['id'] ?>" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Delete room?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

</div>

</body>
</html>
