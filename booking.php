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
        <p><strong>Price:</strong> $<?= number_format($room['price_per_night']); ?>/Night</p>
    </div>

    <div class="col-md-7">
        <form action="https://formsubmit.co/alicefavomodeinde@gmail.com" method="POST">
            <input type="hidden" name="room_id" value="<?= $room['id']; ?>">
            <input type="hidden" name="room_name" value="<?= $room['name']; ?>">
            <input type="hidden" id="price_per_night" value="<?= $room['price_per_night']; ?>">
            
            <!-- Hidden field to send total cost via email -->
            <input type="hidden" name="total_cost" id="hidden_total_cost">

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
                <input type="date" name="check_in" id="check_in" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Check-Out Date</label>
                <input type="date" name="check_out" id="check_out" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Total Cost</label>
                <input type="text" id="total_cost" class="form-control" readonly>
            </div>

            <button class="btn btn-warning w-100 fw-bold mb-3">Confirm Booking</button>
        </form>

        <a href="rooms.php" class="btn btn-outline-primary w-100">
        Back to Rooms
        </a>
    </div>
    
</div>
</div>

<!-- SCRIPT TO CALCULATE TOTAL COST -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkIn = document.getElementById('check_in');
    const checkOut = document.getElementById('check_out');
    const totalCost = document.getElementById('total_cost');
    const hiddenTotal = document.getElementById('hidden_total_cost');
    const pricePerNight = parseFloat(document.getElementById('price_per_night').value);

    function calculateTotal() {
        const inDate = new Date(checkIn.value);
        const outDate = new Date(checkOut.value);

        if (checkIn.value && checkOut.value && outDate > inDate) {
            const diffTime = outDate - inDate;
            const nights = diffTime / (1000 * 3600 * 24);
            const total = nights * pricePerNight;

            const result = `$${total.toLocaleString()} (${nights} nights)`;
            totalCost.value = result;
            hiddenTotal.value = `$${total.toLocaleString()} for ${nights} night(s)`;
        } else {
            totalCost.value = "";
            hiddenTotal.value = "";
        }
    }

    checkIn.addEventListener('change', calculateTotal);
    checkOut.addEventListener('change', calculateTotal);
});
</script>

</body>
</html>
