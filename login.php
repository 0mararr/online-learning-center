<?php


// Include database connection file
include("dbconnect.php");

// Define variables to store login status and error message
$login_status = "";
$error_message = "";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Escape user inputs to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = md5(mysqli_real_escape_string($conn, $_POST["password"]));
    
    // Check if the username and password match
    $query = "SELECT * FROM webproj WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    if (mysqli_num_rows($result) == 1) {
        // Login successful, set session variable and redirect to welcome page
        $_SESSION["username"] = $username;
        header("Location: website.php"); 
        exit;
    } else {
        // Login failed, set error message
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="logincss.css">
</head>
<body>
    
    <form method="post" action="login.php">
    <h2>User Login</h2>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
        <?php if ($error_message) { echo "<p>$error_message</p>"; } ?>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
    </form>
</body>
</html>