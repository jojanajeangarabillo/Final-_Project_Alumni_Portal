<?php
session_start();
include 'config.php';

$events_query = "SELECT * FROM events ORDER BY schedule DESC LIMIT 3";
$events_result = $conn->query($events_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PLP Alumni Portal</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/index.css" />
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
        <li><a href="events.php">Events</a></li>
        <li><a href="alumni-list.php">Alumni List</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <?php if(isset($_SESSION['alumni_id'])): ?>
          <li><a href="job.php">Job</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="home.php" class="portal-label">PORTAL</a></li>
        <?php endif; ?>
      </ul>
     </div>
  </nav>
  
  <!-- Welcome Banner -->
  <section class="banner" style="background-image: url('images/plpasigg.jpg');">
    <div class="overlay">
      <h2>WELCOME ALUMNI!!</h2>
      <div class="banner-buttons">
        <?php if(!isset($_SESSION['alumni_id'])): ?>
          <a href="home.php" class="btn join-btn">JOIN NOW</a>
        <?php else: ?>
          <a href="profile.php" class="btn join-btn">MY PROFILE</a>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- About & Announcements Section -->
  <section class="info-section">
    <div class="info-box about-box">
      <h3 class="section-title">ABOUT</h3>
      <div class="about-content">
        <?php
          $about_query = "SELECT about_content FROM system_settings WHERE id = 1";
          $about_result = $conn->query($about_query);
          if ($about_result && $about_result->num_rows > 0) {
            $about = $about_result->fetch_assoc();
            echo html_entity_decode($about['about_content']);
          } else {
            echo "<p>Welcome to the Pamantasan ng Lungsod ng Pasig Alumni Portal.</p>";
          }
        ?>
      </div>
    </div>
    <div class="info-box events-box">
      <h3 class="section-title">ANNOUNCEMENTS</h3>
      <div class="events-container">
        <?php
        if ($events_result->num_rows > 0) {
          while($event = $events_result->fetch_assoc()) {
            $content_excerpt = strip_tags(html_entity_decode($event['content']));
            $content_excerpt = substr($content_excerpt, 0, 100) . (strlen($content_excerpt) > 100 ? "..." : "");
            
            echo "<div class='event-card'>";
            echo "<div class='event-date'>" . date('M d', strtotime($event['schedule'])) . "</div>";
            echo "<div class='event-content'>";
            echo "<h4>" . $event['title'] . "</h4>";
            echo "<p class='event-schedule'><i class='fa fa-calendar'></i> " . date('F d, Y', strtotime($event['schedule'])) . "</p>";
            echo "<p class='event-excerpt'>" . $content_excerpt . "</p>";
            echo "<a href='events.php?id=" . $event['id'] . "' class='read-more'>Read more</a>";
            echo "</div>";
            echo "</div>";
          }
        } else {
          echo "<div class='no-events'>No upcoming events.</div>";
        }
        ?>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <h4>Contact Us</h4>
    <p>📞 8643-3114</p>
    <p>📧 <a href="plpasig@plp.edu.ph">inquiry@plp.edu.ph</a></p>
    <p>📍 129 Alkalde Jose, Pasig, 1600 Metro Manila</p>
  </footer>

</body>
</html>
