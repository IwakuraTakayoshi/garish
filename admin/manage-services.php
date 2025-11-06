<?php
session_start();
require "../config/garish-connect.php";

if(!isset($_SESSION['admin_logged_in'])){
    header("Location: login.php");
    exit;
}

$services = $pdo->query("SELECT * FROM services ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Services | Admin</title>
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
    .btn-gold{
    background:var(--gold);
    color:var(--navy);
    font-weight:600;
    }
    .table-wrapper{
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,0.05);
    }
  </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-dark" style="background:var(--navy);">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold">Admin Panel</a>
    <a href="dashboard.php" class="btn btn-sm btn-outline-light">Back to Dashboard</a>
    <a href="logout.php" class="btn btn-sm btn-light">Logout</a>
  </div>
</nav>

<div class="container mt-4">

  <div class="d-flex justify-content-between mb-3">
    <h3>Manage Services</h3>
    <a href="add-service.php" class="btn btn-gold">+ Add New Service</a>
  </div>

  <div class="table-wrapper">
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Service</th>
          <th>Description</th>
          <th>Cost</th>
          <th>Action</th>
        </tr>
      </thead>

      <?php foreach($services as $service): ?>
      <tr>
        <td><?= $service['id'] ?></td>
        <td><?= $service['service_name'] ?></td>
        <td><?= substr($service['description'],0,65) ?>...</td>
        <td><?= $service['cost'] ?></td>
        <td>
          <a href="edit-service.php?id=<?= $service['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
          <a href="delete-service.php?id=<?= $service['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this service?')">Delete</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>

</div>
</body>
</html>
