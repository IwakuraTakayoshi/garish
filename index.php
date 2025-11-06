<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garish Star Hotel | Welcome</title>
  <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    /* body {
    padding-top: 80px;
    } */
    :root {
          --navy: #001a4d;
          --gold: #d4b256;
        }
    body {
      font-family: "Segoe UI", sans-serif;
      background-color: #fafafa;
      color: #333;
    }
    /* ===== Hero Section ===== */
    .hero {
      background: url('assets/images/bg_pic.jpg') center center/cover no-repeat;
      color: white;
      height: 60vh;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      position: relative;
      padding-top: 120px; 
    }

    /* Dark overlay to improve text visibility */
    .hero-overlay {
      background: rgba(0, 0, 0, 0.5);
      padding: 25px;
      border-radius: 40px;
    }

    .section-title {
      text-align: center;
      margin-bottom: 20px;
    }

    .footer {
      background: var(--navy);
      color: #ffffffff;
      padding: 20px 0;
    }
  </style>
</head>
<body>

  <?php include 'include/navbar.php'; ?>
  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-overlay">
      <h1 class="display-4 fw-bold">Welcome to <span style="color: #d4b256;">Garish Star</span> Hotel</h1>
      <p class="lead">Experience comfort, elegance, and world-class hospitality.</p>
      <a href="#rooms" class="btn btn-primary btn-lg mt-3">Explore Our Rooms</a>
    </div>
  </section>

  <!-- Rooms Section -->
  <section id="rooms" class="py-5">
    <div class="container">
      <h2 class="section-title">Our Rooms</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card shadow">
            <img src="assets/images/room_001.jpg" class="card-img-top" alt="Deluxe Room">
            <div class="card-body">
              <h5 class="card-title">Classic Suite</h5>
              <p class="card-text">Elegant room with a king-size bed, air conditioning, and a stunning city view.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow">
            <img src="assets/images/room_008.jpg" class="card-img-top" alt="Executive Suite">
            <div class="card-body">
              <h5 class="card-title">Supreme Suite</h5>
              <p class="card-text">Spacious suite with a lounge area, luxury furnishings, and 24-hour room service.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow">
            <img src="assets/images/room_005.jpg" class="card-img-top" alt="Budget Room">
            <div class="card-body">
              <h5 class="card-title">Grand Suite </h5>
              <p class="card-text">Affordable comfort with modern amenities and a relaxing atmosphere.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Conference Section -->
  <section id="conference" class="py-1 bg-light">
    <div class="container text-center">
      <h2 class="section-title">Conference & Events</h2>
      <p class="lead">Host your meetings, conferences, and banquets in our well-equipped halls.</p>
      <img src="assets/images/conference.jpg" class="img-fluid rounded shadow mt-3" alt="Conference Hall">
    </div>
  </section>

  <!-- Restaurant Section -->
  <section id="restaurant" class="py-5">
    <div class="container text-center">
      <h2 class="section-title">Restaurant & Dining</h2>
      <p class="lead">Enjoy local and international cuisines prepared by our expert chefs.</p>
      <img src="assets/images/res.jpg" class="img-fluid rounded shadow mt-3" alt="Restaurant">
    </div>
  </section>

  <!-- Gym Section -->
  <section id="gym" class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="section-title">Fitness & Gym</h2>
      <p class="lead">Stay active in our modern gym and wellness center during your stay.</p>
      <img src="assets/images/gym.jpg" class="img-fluid rounded shadow mt-3" alt="Gym">
    </div>
  </section>

  <!-- Other Facilities -->
  <section id="amenities" class="py-5">
    <div class="container text-center">
      <h2 class="section-title">Other Facilities</h2>
      <div class="row g-4">
        <div class="col-md-3">
          <div class="card p-3 shadow-sm">
            <h5>Free Wi-Fi</h5>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card p-3 shadow-sm">
            <h5>Swimming Pool</h5>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card p-3 shadow-sm">
            <h5>Spa Services</h5>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card p-3 shadow-sm">
            <h5>Airport Pickup</h5>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <p>&copy; 2025 Garish Star Hotel | 24, GRA, Beside Exclusive Hotel, Otukpo, Beune</p>
      <p>Email: garishstar@gmail.com | Phone: +234 707 5337 215</p>
    </div>
  </footer>

  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
