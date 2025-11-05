<?php
require "config/garish-connect.php";

if (!isset($_GET["id"])) {
    header("Location: rooms.php");
    exit();
}

$id = $_GET["id"];
$sql = "SELECT * FROM garish_rooms WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$room = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$room) {
    echo "<div style='padding:20px; text-align:center; font-size:18px;'>Room not found</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $room['name'] ?> | Garish Star Hotel</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">

    <div class="row">
        
        <!-- Room Image -->
        <div class="col-md-6 mb-4">
            <img src="assets/images/<?= $room['room_image'] ?>" 
                 alt="<?= $room['name'] ?>" 
                 class="img-fluid rounded shadow"
                 style="height:350px; object-fit:cover;">
        </div>

        <!-- Room Details -->
        <div class="col-md-6">
            <h2 class="fw-bold"><?= $room['name'] ?></h2>
            
            <p class="mb-2">
                <strong>Category:</strong> <?= $room['category'] ?>
            </p>
            
            <p class="text-gold fs-4 fw-bold">
                $<?= number_format($room['price_per_night']) ?>/Night
            </p>

            <p class="mb-2">
                <strong>Status:</strong>
                <?php if ($room['instock'] == 1): ?>
                    <span class="badge bg-success">Available</span>
                <?php else: ?>
                    <span class="badge bg-danger">Booked</span>
                <?php endif; ?>
            </p>

            <p><?= $room['room_description'] ?></p>

            <!-- Buttons -->
            <?php if ($room['instock'] == 1): ?>
                <a href="booking.php?room=<?= $room['id'] ?>" class="btn btn-warning text-dark w-100 mb-2 fw-bold">
                Book Now
                </a>
            <?php else: ?>
                <button class="btn btn-secondary w-100 mb-2 fw-bold" disabled>
                    Already Booked
                </button>
                <p class="small text-muted mt-1">
                    This room is currently unavailable. Please check other rooms or contact us for assistance.
                </p>
            <?php endif; ?>

            <a href="rooms.php" class="btn btn-outline-primary w-100">
                Back to Rooms
            </a>
        </div>
    </div>
</div>

<footer class="text-center py-4 bg-dark text-white">
    &copy; <?= date('Y') ?> Garish Star Hotel | All Rights Reserved
</footer>

</body>
</html>
