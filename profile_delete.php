<?php
session_start();

include('database.php');

// Get the email of the user you want to delete
$emailToDelete = $_POST['email'];

// Prepare the DELETE query to remove the user by email
$query = $conn->prepare("DELETE FROM users WHERE email = ?");
$query->bind_param("s", $emailToDelete);

// Execute the query and handle success or failure
if ($query->execute()) {
    // Successful deletion
    header('Location: profile.php');
    session_destroy(); // Destroy session after deletion
    exit();
} else {
    // If there's an error during deletion
    echo "Error deleting the account - " . $conn->error;
}

// Close the query and database connection
$query->close();
$conn->close();
?>
