<?php
session_start();
require "../config/garish-connect.php";

if(!isset($_SESSION['admin_logged_in'])){
    header("Location: login.php");
    exit;
}
$adminName = $_SESSION['admin_name'];

// Total rooms
$totalRooms = $pdo->query("SELECT COUNT(*) FROM garish_rooms")->fetchColumn();

// Available rooms
$availableRooms = $pdo->query("SELECT COUNT(*) FROM garish_rooms WHERE instock = 1")->fetchColumn();

// Booked rooms
$bookedRooms = $pdo->query("SELECT COUNT(*) FROM garish_rooms WHERE instock = 0")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard | Garish Star Hotel</title>
<link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet">

<style>
:root {
  --navy: #001a4d;
  --gold: #d4b256;
}

body {
  font-family: "Segoe UI", sans-serif;
  background: #f7f7f7;
}

.dashboard-card {
  border-left: 4px solid var(--gold);
  transition: 0.3s;
}
.dashboard-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 4px 15px rgba(0,0,0,0.12);
}
</style>
</head>
<body>

<nav class="navbar navbar-dark" style="background: var(--navy);">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-gold">Admin Panel</a>
    <span class="text-white me-3">Welcome, <?php echo $adminName; ?> </span>
    <a href="logout.php" class="btn btn-sm btn-light">Logout</a>
  </div>
</nav>

<div class="container mt-4">

    <h3 class="mb-4">🏨 Dashboard Overview</h3>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3">
                <h5>Total Rooms</h5>
                <h2 class="text-primary fw-bold"><?= $totalRooms ?></h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3">
                <h5>Available Rooms</h5>
                <h2 class="text-success fw-bold"><?= $availableRooms ?></h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3">
                <h5>Booked Rooms</h5>
                <h2 class="text-danger fw-bold"><?= $bookedRooms ?></h2>
            </div>
        </div>

    </div>
</div>

<div class="container mt-5">
  <h3 class="mb-4">Dashboard</h3>

  <div class="row g-4">

    <div class="col-md-4">
      <div class="card p-4 dashboard-card">
        <h5>Manage Rooms</h5>
        <p>View & update hotel rooms</p>
        <a href="manage-rooms.php" class="btn btn-sm btn-primary">Go</a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card p-4 dashboard-card">
        <h5>Manage Services</h5>
        <p>Edit hotel services & pricing</p>
        <a href="manage-services.php" class="btn btn-sm btn-primary">Go</a>
      </div>
    </div>

  </div>
</div>

</body>
</html>
