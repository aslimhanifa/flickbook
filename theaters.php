<?php
include 'database.php';

// Fetch theaters from the database
$sql = "SELECT * FROM theaters LIMIT 4"; // Limit to 4 theaters
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theater Showtimes</title>
    <link rel="stylesheet" href="theaters.css">
    
    
</head>
<body>
    <div class="container">
        <h1>THEATERS</h1>
        <div class="theater-list">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <a href="book.php"><div class="theater-card">
                        <div class="theater-name"><?php echo $row['name']; ?></div>
                        <div class="showtime"><?php echo $row['showtimes']; ?></div>
                    </div></a>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No theaters found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
