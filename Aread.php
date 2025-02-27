<!DOCTYPE html>
<html>
<head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
        font-family: Arial, sans-serif;
    }

    th, td {
        text-align: left;
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
        text-transform: uppercase;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    h2 {
        color: #4CAF50;
        font-family: 'Helvetica Neue', sans-serif;
        margin-bottom: 20px;
        font-weight: bold;
        text-align: center;
    }

    .action-btn {
        background-color: #4CAF50; /* Green button */
        color: white;
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        margin-right: 8px;
    }

    .action-btn.edit {
        background-color: #2196F3; /* Blue for Edit */
    }

    .action-btn.delete {
        background-color: #f44336; /* Red for Delete */
    }

    .action-btn:hover {
        opacity: 0.8;
    }

</style>
</head>
<body>

<?php
// Database connection configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "movies";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());    
}

// Fetch all users from the database
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>User List</h2>";
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Card Type</th>
            <th>Cardholder Name</th>
            <th>Card Number</th>
            <th>Expiry Date</th>
            <th>CVV</th>
            <th>Email Address</th>
            <th>Action</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["Card_Type"] . "</td>";
        echo "<td>" . $row["Cardholder_Name"] . "</td>";
        echo "<td>" . $row["Card_Number"] . "</td>";
        echo "<td>" . $row["ExpiryDate"] . "</td>";
        echo "<td>" . $row["CVV"] . "</td>";
        echo "<td>" . $row["Email_Address"] . "</td>";
        echo "<td>";
        echo "<a href='http://localhost/newiwt/Edit.php?id=" . $row["id"] . "' class='action-btn edit'>Edit</a>";
        echo "<a href='http://localhost/newiwt/Delete.php?id=" . $row["id"] . "' class='action-btn delete' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No users found!</p>";
}

// Close the database connection
mysqli_close($conn);
?>

</body>
</html>
