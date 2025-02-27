<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $release_year = $_POST['release_year'];
    $duration = $_POST['duration'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageSize = $_FILES['image']['size'];
        $imageType = $_FILES['image']['type'];

        // Specify the directory where images will be stored
        $uploadDirectory = 'uploads/';
        $imageFilePath = $uploadDirectory . basename($imageName);

        // Move the image to the uploads directory
        if (move_uploaded_file($imageTmpPath, $imageFilePath)) {
            // Image uploaded successfully, proceed with adding the movie
            $sql = "INSERT INTO movies (title, genre, release_year, duration, image_url) VALUES ('$title', '$genre', '$release_year', '$duration', '$imageFilePath')";
            if ($conn->query($sql) === TRUE) {
                header('Location: manage_movies.php');
                exit();
            }
        } else {
            echo "Error uploading image";
        }
    } else {
        echo "Image is required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Add New Movie</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Movie Title" required>
            <input type="text" name="genre" placeholder="Genre" required>
            <input type="number" name="release_year" placeholder="Release Year (YYYY)" min="1900" max="2100" required>
            <input type="time" name="duration" required>
            <input type="file" name="image" accept="image/*" required> <!-- Image input -->
            <button type="submit">Add Movie</button>
        </form>
        <a href="manage_movies.php" class="btn">Back to Manage Movies</a>
    </div>

    
</body>
</html>

<?php
$conn->close();
?>
<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $release_year = $_POST['release_year'];
    $duration = $_POST['duration'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageSize = $_FILES['image']['size'];
        $imageType = $_FILES['image']['type'];

        // Specify the directory where images will be stored
        $uploadDirectory = 'uploads/';
        $imageFilePath = $uploadDirectory . basename($imageName);

        // Move the image to the uploads directory
        if (move_uploaded_file($imageTmpPath, $imageFilePath)) {
            // Image uploaded successfully, proceed with adding the movie
            $sql = "INSERT INTO movies (title, genre, release_year, duration, image_url) VALUES ('$title', '$genre', '$release_year', '$duration', '$imageFilePath')";
            if ($conn->query($sql) === TRUE) {
                header('Location: manage_movies.php');
                exit();
            }
        } else {
            echo "Error uploading image";
        }
    } else {
        echo "Image is required.";
    }
}
?>


