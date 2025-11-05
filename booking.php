<?php
require "config/garish-connect.php";

// Ensure room id exists
if(!isset($_GET['room'])) {
    echo "Invalid room selection.";
    exit;
}

$roomId = $_GET['room'];

// Find room info
$sql = "SELECT * FROM garish_rooms WHERE id = ? LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([$roomId]);
$room = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$room) {
    echo "Room not found.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Book <?= $room['name'] ?> | Garish Star Hotel</title>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
<link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

<div class="container my-5">

<h2 class="text-center fw-bold mb-4 text-gold">Book <?= $room['name'] ?></h2>

<div class="row">
    
    <div class="col-md-5 mb-4">
        <img src="assets/images/<?= $room['room_image']; ?>" class="img-fluid rounded shadow">
        <h4 class="mt-3"><?= $room['name']; ?></h4>
        <p><strong>Price:</strong> ₦<?= number_format($room['price_per_night']); ?>/Night</p>
    </div>

    <div class="col-md-7">
        <form action="https://formsubmit.co/alicefavomodeinde@gmail.com" method="POST">
            <input type="hidden" name="room_id" value="<?= $room['id']; ?>">
            <input type="hidden" name="room_name" value="<?= $room['name']; ?>">

            <div class="mb-3">
                <label>Full Name</label>
                <input type="text" name="fullname" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Check-In Date</label>
                <input type="date" name="check_in" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Check-Out Date</label>
                <input type="date" name="check_out" class="form-control" required>
            </div>

            <button class="btn btn-warning w-100 fw-bold">Confirm Booking</button>
        </form>
    </div>
</div>
</div>

</body>
</html>
