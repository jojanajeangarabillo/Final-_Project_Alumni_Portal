<?php
session_start();
include 'config.php';

$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$search_condition = '';

if (!empty($search)) {
    $search_condition = " WHERE alumnus_bio.firstname LIKE '%$search%' OR alumnus_bio.lastname LIKE '%$search%' OR alumnus_bio.email LIKE '%$search%' OR alumnus_bio.batch LIKE '%$search%' OR courses.course LIKE '%$search%'";
}

$query = "SELECT alumnus_bio.*, courses.course as course_name FROM alumnus_bio 
          LEFT JOIN courses ON alumnus_bio.course_id = courses.id" 
          . $search_condition . " ORDER BY alumnus_bio.lastname ASC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
 <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>PLP Alumni Portal</title>
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/alumni-list.css" />
 </head>
    <body>
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
   <div>
   <form class="search" method="GET" action="">
      <input type="text" name="search" placeholder="Search" value="<?php echo htmlspecialchars($search); ?>"/>
      <button type="submit"><span>&#128269</span></button>
   </form>
   </div>

   <div class="grid">
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <div class="student-info">
             <div class="avatar" style="background-image: url('images/<?php echo $row['avatar'] ? htmlspecialchars($row['avatar']) : 'avatar.png'; ?>')"></div>
             <h3><?php echo htmlspecialchars($row['firstname'] . ' ' . 
                (!empty($row['middlename']) ? substr($row['middlename'], 0, 1) . '. ' : '') . 
                $row['lastname']); ?>
             </h3>
             
             <div class="info-container">
                <div class="info-row">
                  <span>Batch:</span> <?php echo htmlspecialchars($row['batch']); ?>
                </div>
                <div class="info-row">
                  <span>Course:</span> <?php echo htmlspecialchars($row['course_name'] ?? 'Not specified'); ?>
                </div>
                <div class="info-row">
                  <span>Gender:</span> <?php echo htmlspecialchars($row['gender']); ?>
                </div>
                <div class="info-row email">
                  <span>Email:</span> <?php echo htmlspecialchars($row['email']); ?>
                </div>
             </div>
             
             <?php if($row['connected_to'] == 1): ?>
             <div class="connected-status">
                Connected
             </div>
             <?php endif; ?>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p style="text-align: center; width: 100%;">No alumni found</p>
      <?php endif; ?>
   </div>

   <footer class="footer">
    <h4>Contact Us</h4>
    <p>📞 8643-3114</p>
    <p>📧 <a href="plpasig@plp.edu.ph">inquiry@plp.edu.ph</a></p>
    <p>📍 129 Alkalde Jose, Pasig, 1600 Metro Manila</p>
  </footer>

    </body>
</html>