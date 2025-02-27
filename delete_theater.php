<?php
include 'database.php';

$id = $_GET['id'];

// Delete theater from the database
$sql = "DELETE FROM theaters WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: manage_theaters.php");
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
