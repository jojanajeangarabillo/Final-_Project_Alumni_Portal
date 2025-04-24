<?php
session_start();
include 'config.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);
    
    $sql = "SELECT * FROM users WHERE username = '$email' AND password = '$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['alumni_id'] = $row['alumni_id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['type'] = $row['type'];
        
        header("Location: index.php");
    } else {
        $error = "Invalid email or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Academic Login - PLPasig</title>
  <link rel="stylesheet" href="css/style.css" />
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
        <li><a href="#">Events</a></li>
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

  <div class="login-container">
    <div class="illustration">
      <img src="images/plpasigg.jpg" alt="PLPasig Illustration">
    </div>
    <div class="login-form">
      <h2>Log in</h2>
      <?php if(!empty($error)): ?>
        <div style="color: red; margin-bottom: 15px;"><?php echo $error; ?></div>
      <?php endif; ?>
      <form method="POST" action="">
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Log in</button>
        <p>Don't have an account? <a href="register.php">Register</a></p>
      </form>
    </div>
  </div>
</body>
</html>
