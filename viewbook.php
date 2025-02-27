<?php
require 'database.php';
session_start();

// Fetch data from the "book" table
$select_sql = "SELECT * FROM book";
$result = $conn->query($select_sql);

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunset Boat Safari</title>
    <link rel="icon" type="img/png" href="image/logo.png">



    <link rel="preconnect" href="https://fonts.gstatic.com">
    <style>
        /* Global Styles */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f4f8;
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Header Styles */
h1.payment {
    color: #4CAF50;
    margin: 20px 0;
    font-size: 32px;
}

/* Table Styles */
.table {
    width: 90%;
    max-width: 1000px;
    border-collapse: collapse;
    margin: 20px 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

.table th, .table td {
    padding: 15px;
    text-align: left;
}

.table th {
    background-color: #4CAF50;
    color: white;
}

.table tr {
    background-color: #fff;
    transition: background-color 0.3s;
}

.table tr:hover {
    background-color: #f1f1f1;
}

.table td {
    border: 1px solid #ddd;
}

/* Action Links */
.table a {
    text-decoration: none;
    color: #4CAF50;
    padding: 5px 10px;
    border: 1px solid #4CAF50;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

.table a:hover {
    background-color: #4CAF50;
    color: white;
}

/* Responsive Design */
@media screen and (max-width: 600px) {
    .table {
        width: 100%;
    }
    
    .table th, .table td {
        font-size: 14px;
        padding: 10px;
    }

    h1.payment {
        font-size: 24px;
    }
}

    </style>
 
</head>
<body>
	
	<!-- horizontal navigation bar -->
	



    <h1 class="payment">Book data</h1>
    <table class="table">
        <tr>
            <th>Package</th>
            <th>Firstname </th>
            <th>Lastname </th>
            <th>Phone </th>
            <th>Email</th>
            <th>No of Adults </th>
            <th>No of children </th>
            <th>Seats </th>
            <th>Action</th>
            <th>Payment</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['package'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['adults'] . "</td>";
                echo "<td>" . $row['children'] . "</td>";
                echo "<td>" . $row['seats'] . "</td>";
                echo '<td><a href="edit_booking.php?id=' . $row['id'] . '">Edit</a>    <br>
                <a href="book1.php?id=' . $row['id'] . '&action=delete" name="delete_ci">Delete</a></td>';
                echo '<td><a href="pay.php"><button class="btn">Proceed Payment</button></a></td>';
                echo "</tr>";
                
            }
        } else {
            echo "<tr><td colspan='6'>No data found in the table.</td></tr>";
        }
        ?>
    </table>
    
	 <!--SLIDES USING JAVASCRIPT -->
	 <script src="js/home.js"></script>
</body>
<html>
<?php
$conn->close();
?>