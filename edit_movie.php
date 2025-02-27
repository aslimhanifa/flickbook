<?php
include 'database.php';

// Fetch the movie to edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM movies WHERE id='$id'";
    $result = $conn->query($sql);
    $movie = $result->fetch_assoc();
}

// Update the movie
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $release_year = $_POST['release_year'];
    $duration = $_POST['duration'];
    $image_url = $movie['image_url']; // Existing image by default

    // Check if an image is uploaded
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        // Get file information
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $upload_dir = 'uploads/';

        // Generate a unique file name to avoid overwriting
        $image_path = $upload_dir . uniqid() . '-' . $image_name;

        // Move the uploaded file to the server
        if (move_uploaded_file($image_tmp_name, $image_path)) {
            $image_url = $image_path; // Set the new image URL
        }
    }

    // Update the database with the new or existing image URL
    $sql = "UPDATE movies 
            SET title='$title', genre='$genre', release_year='$release_year', duration='$duration', image_url='$image_url' 
            WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: manage_movies.php');
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Movie</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" value="<?php echo $movie['title']; ?>" required>
            <input type="text" name="genre" value="<?php echo $movie['genre']; ?>" required>
            <input type="number" name="release_year" value="<?php echo $movie['release_year']; ?>" min="1900" max="2100" required>
            <input type="time" name="duration" value="<?php echo $movie['duration']; ?>" required>
            
            <!-- Image Upload Section -->
            <label for="image">Movie Image</label>
            <input type="file" name="image" accept="image/*">
            <p>Current Image:</p>
            <img src="<?php echo $movie['image_url']; ?>" alt="Movie Image" style="max-width:200px;">
            
            <button type="submit">Update Movie</button>
        </form>
        <a href="manage_movies.php" class="btn">Back to Manage Movies</a>
    </div>
</body>
</html>
