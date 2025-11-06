<?php
require "config/garish-connect.php";

$sql = "SELECT * FROM garish_rooms WHERE 1";

if(isset($_GET['status']) && $_GET['status'] !== ""){
    $sql .= " AND instock = " . intval($_GET['status']);
}
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garish Star Hotel</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        :root {
      --navy: #001a4d;
      --gold: #d4b256;
        }
        body {
        font-family: "Segoe UI", sans-serif;
        background-color: #fafafa;
        color: #333;
        }

        /* FOOTER */
        footer {
        background-color: var(--navy);
        color: white;
        text-align: center;
        padding: 20px 0;
        margin-top: 50px;
        }
    </style>
</head>
<body>
    <?php include 'include/navbar.php'; ?>
    
    <div class="container mt-3">
        <form method="GET" class="mb-4">
            <select name="status" class="form-select w-50 d-inline">
                <option value="">Filter by Availability</option>
                <option value="1" <?= (isset($_GET['status']) && $_GET['status'] == 1) ? 'selected' : '' ?>>Available</option>
                <option value="0" <?= (isset($_GET['status']) && $_GET['status'] == 0) ? 'selected' : '' ?>>Booked</option>
            </select>
            <button class="btn btn-sm btn-primary w-25 ms-3">Apply</button>
        </form>

        <?php if(empty($rooms)): ?>
            <div class="alert alert-warning text-center">
                No rooms match your filter.
            </div>
        <?php endif; ?>

        <div class="row">
            <?php foreach($rooms as $room) { ?>
            <div class="col-md-4 mb-5">
                <div class="card h-100 shadow-sm">

                    <img src="assets/images/<?php echo $room['room_image'] ?>" 
                        class="card-img-top" alt="Room Image" style="height:200px; object-fit:cover;">

                    <div class="card-body">
                        <h5 class="card-title"><?php echo $room['name'] ?></h5>

                        <p class="mb-2">
                            <strong>Status:</strong>
                            <?php if ($room['instock'] == 1): ?>
                                <span class="badge bg-success">Available</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Booked</span>
                            <?php endif; ?>
                        </p>

                        <p class="mb-1"><strong>Category:</strong> <?php echo $room['category'] ?></p>
                        <p class="mb-1"><strong>Price:</strong> $<?php echo $room['price_per_night'] ?>/night</p>

                        <?php
                        $fullDesc = $room['room_description'];
                        $shortDesc = substr($fullDesc, 0, 95) . '...';
                        ?>

                        <p class="text-muted small"><?= $shortDesc ?></p>

                        <a href="room.php?id=<?= $room['id'] ?>" class="btn btn-primary w-100">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    

    <!-- FOOTER -->
  <footer>
    <p>&copy; 2025 Garish Star Hotel | All Rights Reserved</p>
  </footer>
</body>
</html>