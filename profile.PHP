<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>PLP Alumni Portal</title>
      <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="wrapper">
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
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Profile</a></li>
            <li class="portal-label">PORTAL</li>
          </ul>
        </div>
    </nav>

    <div class="profile-banner" style="background-image: url(images/plpasigg.jpg)">
      <div class="overlay"></div>
    </div>

    <div class="profile-section">
      <div class="photo-container">
        <img class="profile-pic" src="images/avatar.png" alt="Profile Picture">
        <form>
          <button class="button" type="button">Change Photo</button>
        </form>
      </div>

      <div class="form-container">
        <h1>PROFILE</h1>
        <form class="account-form">
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last-name">
          </div>
          <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first-name">
          </div>
          <div class="form-group">
            <label>Middle Name</label>
            <input type="text" name="middle-name">
          </div>

          <div class="form-group">
            <label>Gender</label>
            <select name="gender">
              <option value="">Select</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <div class="form-group">
            <label>Batch</label>
            <input type="text" name="batch">
          </div>
          <div class="form-group">
            <label>Course Graduated</label>
            <select name="course">
              <option value="">Select</option>
              <option value="cs">Computer Science</option>
              <option value="it">Information Technology</option>
            </select>
          </div>

          <div class="form-group">
            <label>Currently Connected To:</label>
            <input type="text" name="connected-to">
          </div>
          <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email">
          </div>
          <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password">
          </div>

          <div class="form-submit">
            <button type="submit">Update Account</button>
          </div>
        </form>
    </div>
  </div>

  <footer class="footer">
      <h4>Contact Us</h4>
      <p>📞 8643-3114</p>
      <p>📧 <a href="plpasig@plp.edu.ph">inquiry@plp.edu.ph</a></p>
      <p>📍 129 Alkalde Jose, Pasig, 1600 Metro Manila</p>
  </footer>

  
  
</body>

</html>