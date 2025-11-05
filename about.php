<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | Garish Star Hotel</title>
  <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
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
    /* HERO */
    .hero {
      background: url('assets/images/about.jpg') center/cover no-repeat;
      height: 75vh;
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
      background: rgba(0,0,0,0.55);
    }
    .hero-content {
      position: relative;
      color: white;
      max-width: 800px;
      padding: 0 20px;
    }
    .hero-content h1 {
      font-size: 3rem;
      font-weight: 700;
      letter-spacing: 1px;
      margin-bottom: 15px;
      color: var(--gold);
    }
    .hero-content p {
      font-size: 1.2rem;
    }
    /* SECTION TITLES */
    .section-title {
      font-size: 2rem;
      font-weight: 700;
      text-align: center;
      color: var(--navy);
      margin-bottom: 30px;
    }
    .section-title span {
      color: var(--gold);
    }
    /* STORY IMAGE */
    .story-img {
      border: 5px solid var(--gold);
      border-radius: 8px;
    }
    /* CARDS FOR MISSION/VISION */
    .card-lux {
      border: 2px solid var(--gold);
      border-radius: 10px;
      padding: 25px;
      height: 100%;
    }
    .card-navy {
      background-color: var(--navy);
      color: white;
    }
    .card-navy h3 {
      color: var(--gold);
    }
    .btn-gold {
      background-color: var(--gold);
      color: var(--navy);
      padding: 12px 28px;
      font-weight: 600;
      border: none;
      margin-top: 20px;
    }
    .btn-gold:hover {
      background-color: #b3a04a;
      color: white;
    }
    /* LIST */
    .why-choose ul {
      list-style: none;
      padding-left: 0;
    }
    .why-choose ul li {
      font-size: 1.1rem;
      margin-bottom: 10px;
    }
    .why-choose ul li::before {
      content: "✔";
      color: var(--gold);
      margin-right: 8px;
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
  <!-- HERO SECTION -->
  <section class="hero">
    <div class="hero-content">
      <h1>About Garish Star Hotel</h1>
      <p>Your comfort is our priority.</p>
    </div>
  </section>

  <!-- STORY SECTION -->
  <section class="container py-5">
    <h2 class="section-title"><span>Our Story</span></h2>
    <div class="row align-items-center gy-4">
      <div class="col-md-6">
        <img src="assets/images/room_009.jpg" alt="Hotel Room" class="img-fluid story-img">
      </div>
      <div class="col-md-6">
        <p>Garish Star Hotel opened in 2000, founded by Isabell Sofia — a visionary heiress driven by hospitality, luxury, and genuine care for guests. Inspired by her love for people, our hotel was built to be both refined and welcoming.</p>
        <p>From our first day, our mission has been clear: to deliver unforgettable experiences that blend elegance, comfort, and affordability. Every corner of our hotel reflects our commitment to excellence and guest satisfaction.</p>
      </div>
    </div>
  </section>

  <!-- MISSION & VISION -->
  <section class="container py-5">
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card-lux card-navy">
          <h3>Our Mission</h3>
          <p>To provide outstanding hospitality where every guest feels honored, refreshed and inspired — delivering luxury with heart.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card-lux">
          <h3 style="color: var(--navy);">Our Vision</h3>
          <p>To be the leading luxury hotel in the region, recognized for elegance, service and unforgettable guest experiences.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- WHY CHOOSE US -->
  <section class="container py-5 why-choose">
    <h2 class="section-title">Why Choose Us</h2>
    <ul>
      <li>Personalised world-class service</li>
      <li>Elegant luxury rooms at comfortable rates</li>
      <li>Gourmet dining & exceptional amenities</li>
      <li>Prime city-centre location with tranquil atmosphere</li>
    </ul>
    <a href="rooms.php" class="btn btn-gold">Explore Our Rooms</a>
  </section>

  <!-- FOOTER -->
  <footer>
    <p>&copy; 2025 Garish Star Hotel | All Rights Reserved</p>
  </footer>

</body>
</html>
