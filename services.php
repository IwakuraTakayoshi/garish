<?php
require "config/garish-connect.php";

// fetch services from DB
$sql = "SELECT * FROM services";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Our Services | Garish Star Hotel</title>
<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">

<style>
:root {
  --navy: #001a4d;
  --gold: #d4b256;
}

body {
  font-family: "Segoe UI", sans-serif;
  background: #fafafa;
  color: #333;
}

/* Hero */
.hero {
  background: url('assets/images/services.jpg') center/cover no-repeat;
  height: 55vh;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  text-align: center;
}
.hero::before {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.55);
}
.hero-content {
  position: relative;
  color: white;
}
.hero-content h1 {
  font-size: 3rem;
  font-weight: 700;
  color: var(--gold);
}

.divider {
  width: 70px;
  height: 4px;
  background: var(--gold);
  margin: 10px auto 30px;
  border-radius: 3px;
}

.service-card {
  background: white;
  border: 2px solid var(--gold);
  border-radius: 10px;
  padding: 20px;
  text-align: center;
  transition: .2s ease;
  box-shadow: 0px 0px 8px rgba(0,0,0,0.08);
}
.service-card:hover {
  transform: translateY(-3px);
  box-shadow: 0px 6px 15px rgba(0,0,0,0.14);
}

.service-img {
  width: 100%;
  height: 300px;
  object-fit: cover;
  border-radius: 8px;
  border: 3px solid var(--gold);
  margin-bottom: 15px;
}

.service-card h4 {
  color: var(--navy);
  font-weight: 700;
  margin-top: 10px;
}

footer {
  background: var(--navy);
  color: white;
  padding: 18px 0;
  text-align: center;
  margin-top: 40px;
}
</style>
</head>

<body>
<?php include 'include/navbar.php'; ?>

<section class="hero">
  <div class="hero-content">
    <h1>Our Services</h1>
    <p>Your comfort, leisure and luxury — perfectly curated.</p>
  </div>
</section>

<section class="container py-5">
  <h2 class="text-center" style="color: var(--navy); font-weight:700;">World-Class Facilities</h2>
  <div class="divider"></div>

  <div class="row g-4">

    <?php foreach($services as $service) { ?>
      <div class="col-md-4">
        <div class="service-card">
          
          <img src="assets/images/<?php echo $service['featured_image']; ?>" class="service-img" alt="<?php echo $service['service_name']; ?>">

          <h4><?php echo $service['service_name']; ?></h4>

          <p><?php echo substr($service['description'], 0, 95); ?>...</p>

          <a href="service.php?id=<?php echo $service['id']; ?>" class="btn btn-primary w-100">
            View Details
          </a>
        </div>
      </div>
    <?php } ?>

  </div>
</section>

<footer>
<p>&copy; 2025 Garish Star Hotel | All Rights Reserved</p>
</footer>

</body>
</html>
