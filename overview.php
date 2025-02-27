<?php
include 'db.php';

// Queries for total theaters, movies, and users
$totalTheatersQuery = "SELECT COUNT(*) as total_theaters FROM theaters";
$totalTheatersResult = $conn->query($totalTheatersQuery);
$totalTheaters = $totalTheatersResult->fetch_assoc()['total_theaters'];

$totalMoviesQuery = "SELECT COUNT(*) as total_movies FROM movies";
$totalMoviesResult = $conn->query($totalMoviesQuery);
$totalMovies = $totalMoviesResult->fetch_assoc()['total_movies'];

$totalUsersQuery = "SELECT COUNT(*) as total_users FROM users";
$totalUsersResult = $conn->query($totalUsersQuery);
$totalUsers = $totalUsersResult->fetch_assoc()['total_users'];

$sql_total_bookings = "SELECT COUNT(*) AS total_bookings FROM book";
$result_total_bookings = $conn->query($sql_total_bookings);
$row_total_bookings = $result_total_bookings->fetch_assoc();
$total_bookings = $row_total_bookings['total_bookings'];

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="overview.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar Navigation -->
        <div class="sidebar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="#overview">Overview</a></li>
                <li><a href="manage_movies.php">Manage Movies</a></li>
                <li><a href="manage_theaters.php">Manage Theaters</a></li>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="manage_booking.php">Manage Bookings</a></li>
                <li><a href="manage_msg.php">message</a></li>
                <li><a href="Aread.php">Payment Details</a></li>
                <li><a href="adprofile.php">profile</a></li>
                <li><a href="adlogout.php">log out</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">

            <div class="dashboard-header">
                <h1>Flickbook Admin Dashboard</h1>
                <h4>Manage all things</h4>
            </div>

            <div id="overview" class="overview-section">
                <h2>Overview</h2>
                <div class="stats">
                    <div class="card">
                        <h3>Total Movies</h3>
                        <p><?php echo $totalTheaters; ?></p> 
                    </div>
                    <div class="card">
                        <h3>Total Theaters</h3>
                        <p><?php echo $totalMovies; ?></p>
                    </div>
                    <div class="card">
                        <h3>Total Users</h3>
                        <p><?php echo $totalUsers; ?></p>
                    </div>
                    <div class="card">
                        <h3>Total Bookings</h3>
                        <p><?php echo $total_bookings; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
