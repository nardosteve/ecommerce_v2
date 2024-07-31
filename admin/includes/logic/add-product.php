<?php

require_once '../config.php';

// Fetch categories from the database
$sql = "SELECT id, category_name FROM categories";
$result = $conn->query($sql);
$categories = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}

if (isset($_POST["productName"]) && isset($_POST["productDescription"]) && isset($_POST["price"]) && isset($_POST["stockQuantity"]) && isset($_POST["category_id"]) && isset($_POST["vendor"]) && isset($_POST["image_url"])) {
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $price = $_POST['price'];
    $stockQuantity = $_POST['stockQuantity'];
    $category = $_POST['category_id'];
    $vendor = $_POST['vendor'];
    $image = $_POST['image_url'];

    // Prepare an SQL statement with placeholders
    $sql = "INSERT INTO products (product_name, `description`, price, stock_quantity, category_id, vendor, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Use prepared statements to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters to the statement
        $stmt->bind_param("ssdisss", $productName, $productDescription, $price, $stockQuantity, $category, $vendor, $image);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Product Created!";
        } else {
            echo "Something went wrong, try again!";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Database error: Unable to prepare statement.";
    }
} else {
    echo "Please fill in all fields.";
}

// Close the database connection
$conn->close();

?>
