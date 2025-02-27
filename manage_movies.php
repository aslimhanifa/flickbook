<?php
include 'database.php';

// Fetch movies from the database
$sql = "SELECT * FROM movies";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Movies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Manage Movies</h1>
        <a href="add_movie.php" class="btn">Add New Movie</a>

        <!-- Movies Table -->
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Release Year</th>
                    <th>Duration</th>
                    <th>Image</th> <!-- Added image column -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['genre']; ?></td>
                            <td><?php echo $row['release_year']; ?></td>
                            <td><?php echo $row['duration']; ?></td>
                            <td><img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['title']; ?>" width="100"></td> <!-- Display image -->
                            <td>
                                <a href="edit_movie.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
                                <a href="delete_movie.php?id=<?php echo $row['id']; ?>" class="btn" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No movies found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

