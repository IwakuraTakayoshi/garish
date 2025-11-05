<?php
session_start();
require "../config/garish-connect.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password']; // MD5 because your inserted admin uses MD5

    $sql = "SELECT * FROM admin WHERE name=? AND password=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if($admin){
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_name'] = $admin['name'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid login details!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login | Garish Star Hotel</title>
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height:100vh;">

<div class="card p-4 shadow" style="width:350px;">
    <h4 class="text-center mb-3">Admin Login</h4>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger text-center"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button name="login" class="btn btn-dark w-100">Login</button>
    </form>
</div>

</body>
</html>
