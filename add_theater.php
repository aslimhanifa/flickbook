<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];

    // Insert theater into the database
    $sql = "INSERT INTO theaters (name, location, capacity) VALUES ('$name', '$location', '$capacity')";
    if ($conn->query($sql) === TRUE) {
        header("Location: manage_theaters.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Theater</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS -->
</head>
<body>
    <div class="container">
        <h1>Add New Theater</h1>
        <form method="POST" action="">
            <label for="name">Theater Name:</label>
            <input type="text" name="name" required>

            <label for="location">Location:</label>
            <input type="text" name="location" required>

            <label for="capacity">Capacity:</label>
            <input type="number" name="capacity" required>

            <label for="showtimes">Show Time:</label>
            <input type="time" name="showtimes" required>

            <button type="submit" class="btn">Add Theater</button>
            <a href="manage_theaters.php" class="btn cancel">Cancel</a>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
