<?php
session_start();
include 'config.php';

$course_list = array();
$course_query = "SELECT id, course FROM courses ORDER BY course ASC";
$course_result = $conn->query($course_query);
if ($course_result->num_rows > 0) {
    while($row = $course_result->fetch_assoc()) {
        $course_list[] = $row;
    }
}

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alumni_id = mysqli_real_escape_string($conn, $_POST['alumni_id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $batch = mysqli_real_escape_string($conn, $_POST['year_graduated']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $connected_to = isset($_POST['connected_to']) ? mysqli_real_escape_string($conn, $_POST['connected_to']) : 0;
    $password = md5($_POST['password']);
    
    $check_email = "SELECT * FROM alumnus_bio WHERE email = '$email'";
    $result = $conn->query($check_email);
    
    if ($result->num_rows > 0) {
        $error = "Email already exists. Please use a different email.";
    } else {
        $course_id = 1; 
        $course_query = "SELECT id FROM courses WHERE course LIKE '%$course%'";
        $course_result = $conn->query($course_query);
        if ($course_result->num_rows > 0) {
            $course_row = $course_result->fetch_assoc();
            $course_id = $course_row['id'];
        }
        
        $insert_bio = "INSERT INTO alumnus_bio (alumni_id, firstname, middlename, lastname, gender, batch, course_id, email, connected_to, avatar, status) 
                       VALUES ('$alumni_id', '$firstname', '$middlename', '$lastname', '$gender', '$batch', '$course_id', '$email', '$connected_to', 'default_avatar.jpg', 0)";
        
        if ($conn->query($insert_bio) === TRUE) {
            $fullname = $firstname . " " . $lastname;
            $insert_user = "INSERT INTO users (alumni_id, name, username, password, type) 
                           VALUES ('$alumni_id', '$fullname', '$email', '$password', 3)";
            
            if ($conn->query($insert_user) === TRUE) {
                $success = "Registration successful! You can now login.";
            } else {
                $error = "Error creating user account: " . $conn->error;
            }
        } else {
            $error = "Error creating alumni profile: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Alumni Registration</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/register.css"/>
</head>
<body>
    <!-- Header Part -->
 <header class="header">
    <div class="header-left">
      <img src="images/plp-logo.png" alt="PLP Logo" class="logo" />
      <div>
        <h1>Pamantasan Ng Lungsod Ng Pasig</h1>
        <p>Alkalde Jose St. Kapasigan, Pasig City</p>
      </div>
    </div>
    </header>
<div class="container">
  <div class="form-input">
    <h2>Register</h2>
    <?php if(!empty($success)): ?>
      <div style="color: green; margin-bottom: 15px;"><?php echo $success; ?></div>
    <?php endif; ?>
    <?php if(!empty($error)): ?>
      <div style="color: red; margin-bottom: 15px;"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="POST" action="">
      <div class="form-row">
        <!-- Left Column -->
        <div class="form-column">
          <div class="row">
            <input type="text" name="alumni_id" placeholder="Alumni ID" required>
          </div>
          <div class="row">
            <input type="email" name="email" placeholder="Email" required>
          </div>
          <div class="row">
            <input type="text" name="firstname" placeholder="First Name" required>
          </div>
          <div class="row">
            <input type="text" name="middlename" placeholder="Middle Name">
          </div>
          <div class="row">
            <input type="text" name="lastname" placeholder="Last Name" required>
          </div>
        </div>

        <!-- Right Column -->
        <div class="form-column">
          <div class="row gender-row">
            <label>Gender</label>
            <input type="radio" name="gender" value="Female" required> Female
            <input type="radio" name="gender" value="Male" required> Male
          </div>
          <div class="row">
            <input type="text" name="year_graduated" placeholder="Year Graduated" required>
          </div>
          <div class="row">
            <select name="course" id="course-select" required>
              <option value="">Select Course</option>
              <?php foreach($course_list as $course): ?>
                <option value="<?php echo $course['course']; ?>"><?php echo $course['course']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="row gender-row">
            <label id="connected-label">Connected to ?</label>
            <input type="radio" name="connected_to" value="1"> Yes
            <input type="radio" name="connected_to" value="0" checked> No
          </div>
          <div class="row">
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <div class="row">
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
          </div>
        </div>
      </div>

      <div class="buttons">
        <button type="submit" class="register-btn">Register</button>
        <button type="reset" class="reset-btn">Reset Form</button>
      </div>

      <p class="login-text">Already have an account? <a href="home.php">Login</a></p>
    </form>
  </div>
</div>

<script>
  document.getElementById('course-select').addEventListener('change', function() {
    const selectedCourse = this.value;
    const connectedLabel = document.getElementById('connected-label');
    if (selectedCourse) {
      connectedLabel.textContent = `Connected to ${selectedCourse}?`;
    } else {
      connectedLabel.textContent = 'Connected to ?';
    }
  });
</script>

</body>
</html>
