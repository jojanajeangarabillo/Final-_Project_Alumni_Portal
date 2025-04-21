<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img src="images/plpasigg.jpg" alt="Registration Image">
        </div>
        <div class="right-side">
            <h2>Register</h2>
            <form>
                <div class="row">
                    <input type="text" placeholder="Student ID*" required>
                    <input type="text" placeholder="Alumni ID*" required>
                </div>
                <div class="row">
                    <input type="email" placeholder="Email*" required>
                </div>
                <div class="row">
                    <input type="text" placeholder="First Name*" required>
                    <input type="text" placeholder="Middle Name">
                </div>
                <div class="row">
                    <input type="text" placeholder="Last Name*" required>
                </div>
                <div class="row gender-row">
                    <label>Gender*</label>
                    <input type="radio" name="gender" value="Female" required> Female
                    <input type="radio" name="gender" value="Male" required> Male
                </div>
                <div class="row">
                    <label>Birthday*</label>
                    <input type="date" required>
                </div>
                <div class="row">
                    <input type="text" placeholder="Address*" required>
                </div>
                <div class="row">
                    <input type="text" placeholder="Year Graduated*" required>
                </div>
                <div class="row">
                    <input type="text" placeholder="Course*" required>
                </div>
                <div class="row">
                    <input type="password" placeholder="Password*" required>
                </div>
                <div class="buttons">
                    <button type="submit" class="register-btn">Register</button>
                    <button type="reset" class="reset-btn">Reset Form</button>
                </div>
                <p class="login-text">Already have an account? <a href="#">Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>
