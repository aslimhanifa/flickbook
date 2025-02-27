<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $reply = $_POST['reply'];
    
    // Update the message with the admin's reply
    $sql = "UPDATE messages SET reply='$reply' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Reply sent successfully. <a href='manage_msg.php'>Go back to Admin Panel</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
