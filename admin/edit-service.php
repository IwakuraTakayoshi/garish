<?php
session_start();
require "../config/garish-connect.php";

if(!isset($_SESSION['admin_logged_in'])){
    header("Location: login.php");
    exit;
}

// Get service ID
if(!isset($_GET['id'])){
    header("Location: manage-services.php");
    exit;
}

$id = $_GET['id'];

// Fetch current service data
$stmt = $pdo->prepare("SELECT * FROM services WHERE id = ?");
$stmt->execute([$id]);
$service = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$service){
    echo "<div style='padding:20px;'>Service not found.</div>";
    exit;
}

// Handle update
if(isset($_POST['update'])){
    $name = $_POST['service_name'];
    $desc = $_POST['description'];
    $cost = $_POST['cost'];

    $update = $pdo->prepare("UPDATE garish_services SET service_name=?, description=?, cost=? WHERE id=?");
    if($update->execute([$name, $desc, $cost, $id])){
        $success = "Service updated successfully!";
        // Refresh the data to reflect changes
        $stmt->execute([$id]);
        $service = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $error = "Failed to update service.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Service | Admin</title>
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <span class="navbar-brand">Edit Service</span>
    <a href="manage-services.php" class="btn btn-light btn-sm">Back</a>
  </div>
</nav>

<div class="container mt-4" style="max-width:600px;">
    <h4>Edit Service Details</h4>

    <?php if(isset($success)): ?>
      <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <?php if(isset($error)): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label>Service Name</label>
            <input type="text" name="service_name" class="form-control" value="<?= htmlspecialchars($service['service_name']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4" required><?= htmlspecialchars($service['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label>Cost</label>
            <input type="number" name="cost" class="form-control" value="<?= htmlspecialchars($service['cost']) ?>" required>
        </div>

        <button name="update" class="btn btn-primary w-100">Update Service</button>
    </form>
</div>
</body>
</html>
