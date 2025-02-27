<?php
session_start();
include 'database.php';

// Redirect if not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$adminId = $_SESSION['admin_id'];
$sql = "SELECT * FROM admin_users WHERE id='$adminId'";
$result = $conn->query($sql);
$admin = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sqlUpdate = "UPDATE admin_users SET name='$name', email='$email' WHERE id='$adminId'";
    
    if ($conn->query($sqlUpdate) === TRUE) {
        echo "<script>alert('Profile updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating profile: " . $conn->error . "');</script>";
    }
}

// Delete account
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $sqlDelete = "DELETE FROM admin_users WHERE id='$adminId'";
    
    if ($conn->query($sqlDelete) === TRUE) {
        echo "<script>alert('Account deleted successfully!');</script>";
        session_destroy();
        header("Location: login.php");
        exit;
    } else {
        echo "<script>alert('Error deleting account: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
        }

        h1, h2 {
            color: #333;
            text-align: center;
        }

        p {
            text-align: center;
            color: #555;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            display: inline-block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        a {
            display: inline-block;
            text-align: center;
            width: 100%;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($admin['name']); ?>!</h1>
        <p>Email: <?php echo htmlspecialchars($admin['email']); ?></p>

        <h2>Update Profile</h2>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($admin['name']); ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($admin['email']); ?>" required>
            
            <button type="submit" name="update">Update</button>
        </form>

        <h2>Delete Account</h2>
        <form method="POST" action="">
            <button type="submit" name="delete" class="delete-btn" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</button>
        </form>

        <a href="adlogout.php">Log Out</a>
    </div>

</body>
</html>
