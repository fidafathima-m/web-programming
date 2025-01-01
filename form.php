<?php
// Declare variables and initialize with empty values
$name = $email = $password = $confirm_password = "";
$name_err = $email_err = $password_err = $confirm_password_err = "";

// Process the form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate Name
    if (empty($_POST["name"])) {
        $name_err = "Name is required.";
    } else {
        $name = test_input($_POST["name"]);
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $email_err = "Email is required.";
    } else {
        $email = test_input($_POST["email"]);
        // Check if the email format is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format.";
        }
    }

    // Validate Password
    if (empty($_POST["password"])) {
        $password_err = "Password is required.";
    } else {
        $password = test_input($_POST["password"]);
        // Check if password is strong enough (at least 6 characters)
        if (strlen($password) < 6) {
            $password_err = "Password must be at least 6 characters.";
        }
    }

    // Validate Confirm Password
    if (empty($_POST["confirm_password"])) {
        $confirm_password_err = "Please confirm your password.";
    } else {
        $confirm_password = test_input($_POST["confirm_password"]);
        // Check if passwords match
        if ($password != $confirm_password) {
            $confirm_password_err = "Passwords do not match.";
        }
    }

    // If no errors, proceed (e.g., save data to database, etc.)
    if (empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        // Here, you would typically store the data in a database
        echo "<p>Registration successful! Welcome, $name.</p>";
        // For example, you could hash the password and save user info in the database here
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // You can then proceed with storing $name, $email, and $hashed_password in the database.
    }
}

// Function to sanitize and clean user input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>

<h2>Registration Form</h2>

<form action="" method="POST">
    <!-- Name Field -->
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>"><br>
    <span style="color: red;"><?php echo $name_err; ?></span><br><br>

    <!-- Email Field -->
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>"><br>
    <span style="color: red;"><?php echo $email_err; ?></span><br><br>

    <!-- Password Field -->
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br>
    <span style="color: red;"><?php echo $password_err; ?></span><br><br>

    <!-- Confirm Password Field -->
    <label for="confirm_password">Confirm Password:</label><br>
    <input type="password" id="confirm_password" name="confirm_password"><br>
    <span style="color: red;"><?php echo $confirm_password_err; ?></span><br><br>

    <!-- Submit Button -->
    <input type="submit" value="Register">
</form>

</body>
</html>

