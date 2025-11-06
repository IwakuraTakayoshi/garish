<?php
session_start();
require "../config/garish-connect.php";

if(!isset($_SESSION['admin_logged_in'])){ 
    header("Location: login.php"); 
    exit;
}

if(isset($_POST['submit'])){
    $name = $_POST['service_name'];
    $desc = $_POST['description'];
    $cost = $_POST['cost'];

    $sql = "INSERT INTO services(service_name, description, cost) VALUES(?,?,?)";
    $stmt = $pdo->prepare($sql);

    if($stmt->execute([$name, $desc, $cost])){
        $success = "Service added successfully!";
    } else {
        $error = "Error adding service!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Service | Admin</title>
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
<body class="bg-light">
    <nav class="navbar navbar-dark" style="background:var(--navy);">
        <div class="container-fluid">
            <span class="navbar-brand fw-bold">Admin Panel</span>
            <a href="manage-services.php" class="btn btn-light btn-sm">Back</a>
        </div>
    </nav>

    <div class="container mt-4">

        <div class="container-box mx-auto" style="max-width:650px;">
        <h3 class="mb-3">Add New Service</h3>

        <?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
        <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Service Name</label>
                <input type="text" name="service_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Service Description</label>
                <textarea name="description" rows="4" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Cost</label>
                <input type="number" name="cost" class="form-control" required>
            </div>

        <button name="submit" class="btn btn-primary w-100">Add Service</button>
        </form>

    </div>
</body>
</html>