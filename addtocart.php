<?php
// Establish database connection (replace with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproj";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the "add to cart" request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];

    // Retrieve the price of the selected product from the database
    $sql = "SELECT price FROM products WHERE name='$product'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $price = $row['price'];

    // Calculate and update the total price in the user's cart
    $totalPrice = $price * $quantity;
    // Update the user's cart in the database

    // Send response back to the client
    echo "Product added to cart!";
}

// Process the checkout request
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['checkout'])) {
   
    echo "Checkout successful! Thank you for shopping with us.";
}

$conn->close();
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermarket</title>
  <script>
<script>
    function addToCart() {
        var product = document.getElementById('product').value;
        var quantity = document.getElementById('quantity').value;

        // Send the product and quantity to the server for processing
        $.post('addToCart.php', {product: product, quantity: quantity}, function(data) {
            // Handle the response from the server (e.g., update the cart total)
            alert('Product added to cart!');
        });
    }
</script>



  </script>
</head>
<body>
<nav>
   
    
   <div class="nav-links">
<ul>

           <li><a href="about.php " >About</a></li>
           <li> <a href="contactus.php" >Contact Us</a></li>
           <li> <a href="coursess.php" > courses</a></li>
           <li><a href="quiz.php" >Quiz</a></li>
           <li><a href="login.php" >logout</a></li>
       </ul>
   </div>
</nav>

<h2>Supermarket Cart</h2>
    <form id="cartForm">
        <label for="product">Product:</label>
        <select id="product" name="product">
            <option value="apple">Apple</option>
            <option value="banana">Banana</option>
            <option value="orange">Orange</option>
            <!-- Add more options for other products -->
        </select>
        <br><br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" value="1">
        <br><br>
        <input type="button" value="Add to Cart" onclick="addToCart()">
    </form>
  
</body>
</html>
