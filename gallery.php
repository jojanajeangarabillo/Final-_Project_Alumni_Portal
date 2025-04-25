<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Academic Login - PLPasig</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
 <!-- Header Part -->
 <nav class="navbar">
    <div class="navdiv">
      <div class="header-left">
        <img src="images/plp-logo.png" alt="PLP Logo" class="logo" />
        <div>
          <h1>Pamantasan Ng Lungsod Ng Pasig</h1>
          <p>Alkalde Jose St. Kapasigan, Pasig City</p>
        </div>
      </div>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="alumni-list.php">Alumni List</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="home.php">Login</a></li>
        <?php endif; ?>
        <li class="portal-label">PORTAL</li>
      </ul>
     </div>
   </nav>

   <section style="background-image:url('images/plpasigg.jpg');">
         <section class="gallery-section">
          <h2>GALLERY</h2>
  
          <div class="gallery-container">

            <div class="gallery-box">
              <img src="images/gawad_parangal.jpg" alt="Gallery Image" />
              <div class="gallery-text">
                <h3>PLP Celebrates 25th Founding Anniversary with Gawad Parangal 2025</h3>
                <p>
                  Pasig City – March 20, 2025 – The Pamantasan ng Lungsod ng Pasig (PLP) proudly celebrated a historic milestone 
                  with its 25th Founding Anniversary, highlighted by the prestigious Gawad Parangal 2025.
                </p>
                <button class="read-more-btn">Read More</button>
              </div>
            </div>

            <div class="gallery-box">
              <img src="images/plpanniv.jpg" alt="Gallery Image" />
              <div class="gallery-text">
                <h3>PLP 25th Founding Anniversary</h3>
                <p>
                  short description short description short description short description
                  short description short description short description short description
                </p>
                <button class="read-more-btn">Read More</button>
              </div>
            </div>

            <div class="gallery-box">
              <img src="images/gawad_parangal.jpg" alt="Gallery Image" />
              <div class="gallery-text">
                <h3>Pamantasan ng Lungsod ng Pasig Celebrates 25th Founding Anniversary with Gawad Parangal 2025</h3>
                <p>
                  Pasig City – March 20, 2025 – The Pamantasan ng Lungsod ng Pasig (PLP) proudly celebrated a historic milestone 
                  with its 25th Founding Anniversary, highlighted by the prestigious Gawad Parangal 2025.
                </p>
                <button class="read-more-btn">Read More</button>
              </div>
            </div>

            <div class="gallery-box">
              <img src="images/plpanniv.jpg" alt="Gallery Image" />
              <div class="gallery-text">
                <h3>PLP 25th Founding Anniversary</h3>
                <p>
                  short description short description short description short description
                  short description short description short description short description
                </p>
                <button class="read-more-btn">Read More</button>
              </div>
            </div>

          </div>
      </section>

  </section>

  

<footer class="footer">
    <h4>Contact Us</h4>
    <p>📞 8643-3114</p>
    <p>📧 <a href="plpasig@plp.edu.ph">inquiry@plp.edu.ph</a></p>
    <p>📍 129 Alkalde Jose, Pasig, 1600 Metro Manila</p>
  </footer>

</body>
</html>