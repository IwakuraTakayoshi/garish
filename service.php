<?php  
require "config/garish-connect.php";

// Validate ID
if(!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Invalid service selected'); window.location='services.php';</script>";
    exit;
}

$service_id = $_GET['id'];

// Fetch service details
$sql = "SELECT * FROM services WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$service_id]);
$service = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$service) {
    echo "<script>alert('Service not found'); window.location='services.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $service['service_name']; ?> | Garish Star Hotel</title>
<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">

<style>
:root {
  --navy: #001a4d;
  --gold: #d4b256;
}

.service-header {
  background: url('assets/images/<?php echo $service['featured_image']; ?>') center/cover no-repeat;
  height: 50vh;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}

.service-header::before {
  content:"";
  position:absolute;
  inset:0;
  background:rgba(0,0,0,.6);
}

.service-header h1 {
  position:relative;
  color:var(--gold);
  font-size:3rem;
  text-align:center;
}

.btn-gold {
  background: var(--gold);
  color: var(--navy);
  font-weight:600;
  border:none;
}
.btn-gold:hover {
  background:#c4a24a;
  color:white;
}
</style>
</head>

<body>

<section class="service-header">
  <h1><?php echo $service['service_name']; ?></h1>
</section>

<div class="container py-5">
  <div class="row">
    
    <div class="col-md-6">
      <img src="assets/images/<?php echo $service['featured_image']; ?>" class="img-fluid rounded shadow">
    </div>

    <div class="col-md-6">
      <h2 style="color: var(--navy); font-weight:700;"><?php echo $service['service_name']; ?></h2>
      <p><?php echo $service['description']; ?></p>

      <h4 style="color: var(--gold)">Cost: <?php echo $service['cost']; ?></h4>

      <hr>

      <h5>Book this service</h5>
      <form action="https://formsubmit.co/alicefavomodeinde@gmail.com" method="POST">

        <!-- Spam filter -->
        <input type="text" name="_honey" style="display:none">

        <!-- Prevent captcha -->
        <input type="hidden" name="_captcha" value="false">

        <!-- Redirect after success -->
        <input type="hidden" name="_next" value="https://yourwebsite.com/success.html">

        <!-- Email Subject -->
        <input type="hidden" name="_subject" value="New Service Inquiry - <?php echo $service['service_name']; ?>">

        <!-- Service Name from database -->
        <input type="hidden" name="Service" value="<?php echo $service['service_name']; ?>">

        <div class="mb-2">
            <input type="text" name="Full Name" class="form-control" placeholder="Your full name" required>
        </div>

        <div class="mb-2">
            <input type="email" name="Email" class="form-control" placeholder="Your email" required>
        </div>

        <div class="mb-2">
            <input type="text" name="Phone" class="form-control" placeholder="Phone number" required>
        </div>

        <div class="mb-2">
            <textarea name="Message" class="form-control" rows="4" placeholder="Additional details..." required></textarea>
        </div>

        <button type="submit" class="btn btn-gold w-100 mb-3">Submit Inquiry</button>
        </form>

        <a href="services.php" class="btn btn-outline-primary w-100">
          Back to Services
        </a>

    </div>

  </div>
</div>


</body>
</html>
