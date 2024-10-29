<?php
session_start();

// Include database connection file
include("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Escape user inputs to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = md5(mysqli_real_escape_string($conn, $_POST["password"]));
    
    // Insert user data into the database
    $query = "INSERT INTO webproj (name, email, username, password) VALUES ('$name', '$email', '$username', '$password')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo "Registration successful. <br /><br />";

    header("Location: login.php");
    exit; 
} else {
    // Login failed, set error message
    $error_message = "fatal error.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="regcss.css">
</head>
<body>
    
    <form method="post" action="register.php">
    <h2>User Registration</h2>
        <div class="group">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Register">
        <p>Already have an account? <a href="login.php">Login here</a></p>
</body>

</div>
    </form>
    
</body>
</html>
