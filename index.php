<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website</title>
    <style>
        /* Add your CSS styles for product display here */
        .product {
            float: left;
            margin: 20px;
        }
    </style>
</head>
<body>

<?php
// Connect to your database (replace these values with your actual database details)
$servername = "your_database_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch products from the database
$sql = "SELECT id, name, price, image, image_id FROM products";
$result = $conn->query($sql);

// Display products
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        echo '<img src="product_images/' . $row['image'] . '" alt="' . $row['name'] . '">';
        echo '<h3>' . $row['name'] . '</h3>';
        echo '<p>Product ID: ' . $row['id'] . '</p>';
        echo '<p>Image ID: ' . $row['image_id'] . '</p>';
        echo '<p>$' . $row['price'] . '</p>';
        echo '<button>Add to Cart</button>';
        echo '</div>';
    }
} else {
    echo "No products found";
}

// Close the database connection
$conn->close();
?>

</body>
</html>
