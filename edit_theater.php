<?php
include 'database.php';

$id = $_GET['id'];
$sql = "SELECT * FROM theaters WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $showtimes = $_POST['showtimes']

    // Update theater in the database
    $sql = "UPDATE theaters SET name='$name', location='$location', capacity='$capacity' WHERE id=$id";
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
    <title>Edit Theater</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS -->
</head>
<body>
    <div class="container">
        <h1>Edit Theater</h1>
        <form method="POST" action="">
            <label for="name">Theater Name:</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required>

            <label for="location">Location:</label>
            <input type="text" name="location" value="<?php echo $row['location']; ?>" required>

            <label for="capacity">Capacity:</label>
            <input type="number" name="capacity" value="<?php echo $row['capacity']; ?>" required>

            <label for="showtimes">Show time:</label>
            <input type="time" name="showtimes" value="<?php echo $row['showtimes']; ?>" required>



            <button type="submit" class="btn">Update Theater</button>
            <a href="manage_theaters.php" class="btn cancel">Cancel</a>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
