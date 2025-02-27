<?php
include 'database.php';

// Delete the movie
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM movies WHERE id='$id'";
    $conn->query($sql);
    header('Location: manage_movies.php');
    exit();
}
?>

<?php
$conn->close();
?>
