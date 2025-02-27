<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "movies";

// Establish a connection to the MySQL database
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the user ID is provided
if (isset($_GET["id"])) {
    $userId = $_GET["id"];

    // Use a prepared statement to avoid SQL injection
    $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
    $stmt->bind_param("i", $userId);  // Bind the parameter as an integer

    if ($stmt->execute()) {
        // No output before the header
        header("Location: /newiwt/Aread.php");  // Use relative path for redirection
        exit();
    } else {
        // Error handling
        echo "Error deleting order: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request.";
}

// Close the database connection
mysqli_close($conn);
?>
