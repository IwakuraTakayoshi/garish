<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us | Garish Star Hotel</title>
<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">

<style>
:root {
  --navy: #001a4d;
  --gold: #d4b256;
}

body {
  font-family: "Segoe UI", sans-serif;
  background: #fdfdfd;
  color: #333;
}

/* Hero */
.hero {
  background: url('assets/images/contact.jpg') center/cover no-repeat;
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
  background: rgba(0,0,0,0.55);
}

.hero-content {
  position: relative;
  color: white;
  max-width: 700px;
  padding: 0 20px;
}

.hero-content h1 {
  font-size: 3rem;
  font-weight: 700;
  color: var(--gold);
}

/* Divider */
.divider {
  width: 70px;
  height: 4px;
  background: var(--gold);
  margin: 10px auto 30px;
  border-radius: 3px;
}

/* BUTTON */
.btn-gold {
  background-color: var(--gold);
  color: var(--navy);
  font-weight: 600;
  border: none;
  padding: 12px 25px;
  transition: .2s ease;
}

.btn-gold:hover {
  background-color: #c4a24a;
  color: white;
}

/* Contact info icons */
.contact-info div {
  margin-bottom: 15px;
  font-size: 1.1rem;
}

.contact-info span {
  color: var(--navy);
  font-weight: bold;
}

.contact-box {
  background:white; padding:25px; border-radius:10px; 
  box-shadow:0 0 18px rgba(0,0,0,.1);
}

/* Footer */
footer {
  background: var(--navy);
  color: white;
  text-align: center;
  padding: 18px 0;
  margin-top: 50px;
}
</style>
</head>
<body>

  <?php include 'include/navbar.php'; ?>
<!-- HERO -->
<section class="hero">
  <div class="hero-content">
    <h1>Contact Us</h1>
    <p>We're here to assist you — reach out anytime.</p>
  </div>
</section>

<!-- CONTACT SECTION -->
<section class="container py-5">
  <h2 class="text-center" style="color: var(--navy); font-weight:700;">Get in Touch</h2>
  <div class="divider"></div>

  <div class="row gy-4">
    
    <!-- Contact Info -->
    <div class="col-md-5 contact-info">
      <h4 style="color: var(--gold); font-weight:700;">Contact Details</h4><br>

      <div><span>Phone:</span> +234 707 5337 215 </div>
      <div><span>Email:</span> garishstar@gmail.com</div>
      <div><span>Address:</span> 24, GRA, Beside Exclusive Hotel, Otukpo, Beune</div>
      <div><span>Hours:</span> 24/7 Guest Support</div>
    </div>

    <!-- Form -->
    <div class="col-md-7">
      <div class="contact-box">
        <form method="POST" action="https://formsubmit.co/alicefavomodeinde@gmail.com">
          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="fullname" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="number" class="form-control" name="phone" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea class="form-control" rows="5" name="message" required></textarea>
          </div>

          <button type="submit" class="btn btn-gold">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- GOOGLE MAP -->
<section class="container pb-5">
  <h3 class="text-center mb-4" style="color: var(--navy); font-weight:700;">Find Us</h3>
  <div class="ratio ratio-16x9">
    <iframe 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.787544501141!2d7.194590974558118!3d7.197615315389077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104c3b8403f20bb1%3A0x3d1213f4f034a86!2sOtukpo%2C%20Benue!5e0!3m2!1sen!2sng!4v0000000000000!5m2!1sen!2sng" 
      width="600" height="450" 
      style="border:0;" 
      allowfullscreen="" 
      loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <p>&copy; 2025 Garish Star Hotel | All Rights Reserved</p>
</footer>

</body>
</html>
