<?php
session_start();
if (!isset($_SESSION['user-email'])) {
    header("Location: signin.php");
    exit();
}

$userEmail = $_SESSION['user-email'];
$userName = $_SESSION['user-name']; // Assuming this is stored in session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styles.css">
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flickbook - Movie Tickets Booking</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="logo">
            <h1>🎬 Flickbook</h1>
        </div>
        <nav>
            <ul>
                <li><a href="Index.php">Home</a></li>
                <li><a href="movies.php">Movies</a></li>
                <li><a href="now_showing.php">Now Showing</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="profile.php">Profile</a></li>
            
            </ul>
        </nav>
    </header>


</head>
<body>
    <div class="profile-container">
        <h2>Welcome, <?php echo htmlspecialchars($userName); ?>!</h2>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($userEmail); ?></p>

        <div class="profile-actions">
            <a href="edit_profile.php" class="btn edit-btn">Edit Profile</a>
            <a href="logout.php" class="btn logout-btn">Logout</a>
        </div>
    </div>
</body>
</html>
