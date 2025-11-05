<nav class="navbar navbar-expand-lg" style="background: var(--navy);">
    <!-- <nav class="navbar navbar-expand-lg fixed-top" style="background: var(--navy); z-index: 999;"> -->
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php" style="color: #d4b256; font-size: 1.5rem;">
      Garish Star Hotel
    </a>

    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#garishNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="garishNav">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item">
          <a class="nav-link navmenu <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active-link' : '' ?>" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link navmenu <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active-link' : '' ?>" href="about.php">About</a>
        </li>

        <li class="nav-item">
          <a class="nav-link navmenu <?php echo basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active-link' : '' ?>" href="services.php">Services</a>
        </li>

        <li class="nav-item">
          <a class="nav-link navmenu <?php echo basename($_SERVER['PHP_SELF']) == 'rooms.php' ? 'active-link' : '' ?>" href="rooms.php">Rooms</a>
        </li>

        <li class="nav-item">
          <a class="nav-link navmenu <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active-link' : '' ?>" href="contact.php">Contact</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
