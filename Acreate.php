<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .confirmation-container {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 50px;
            text-align: center;
        }
        .confirmation-container h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        .confirmation-container p {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: #333;
        }
        .confirmation-container .success {
            color: green;
            font-weight: bold;
        }
        .confirmation-container .error {
            color: red;
            font-weight: bold;
        }
        .back-home {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "movies";

// Establish a connection to the MySQL database
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and trim whitespace
    $CardType = trim($_POST["Card_Type"]);
    $CardholderName = trim($_POST["Cardholder_Name"]);
    $CardNumber = trim($_POST["Card_Number"]);
    $exp = trim($_POST["ExpiryDate"]);
    $CVV = trim($_POST["CVV"]);
    $EmailAddress = trim($_POST["Email_Address"]);

    // Check if the email already exists
    $emailCheckQuery = "SELECT * FROM user WHERE Email_Address = ?";
    $stmtCheck = mysqli_prepare($conn, $emailCheckQuery);
    mysqli_stmt_bind_param($stmtCheck, "s", $EmailAddress);
    mysqli_stmt_execute($stmtCheck);
    $resultCheck = mysqli_stmt_get_result($stmtCheck);

    if (mysqli_num_rows($resultCheck) > 0) {
        // Email already exists
        echo '
        <div class="confirmation-container">
            <h1>Payment Failed</h1>
            <p class="error">The email address \'' . htmlspecialchars($EmailAddress) . '\' is already registered. Please use a different email.</p>
            <a href="pay.php" class="back-home">Try Again</a>
        </div>';
    } else {
        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO user (Card_Type, Cardholder_Name, Card_Number, ExpiryDate, CVV, Email_Address) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssss", $CardType, $CardholderName, $CardNumber, $exp, $CVV, $EmailAddress);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo '
            <div class="confirmation-container">
                <h1>Payment Successful</h1>
                <p class="success">Thank you for your payment. Your booking has been confirmed!</p>
                <p>A confirmation email has been sent to your registered email address.</p>
                <a href="index.php" class="back-home">Back to Home</a>
            </div>';
        } else {
            // Debugging: Output the error message
            echo '
            <div class="confirmation-container">
                <h1>Payment Failed</h1>
                <p class="error">We encountered an issue processing your payment. Please try again.</p>
                <p class="error">Error: ' . mysqli_error($conn) . '</p> <!-- Output SQL error -->
                <a href="pay.php" class="back-home">Try Again</a>
            </div>';
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }

    // Close the check statement
    mysqli_stmt_close($stmtCheck);

    // Close the database connection
    mysqli_close($conn);
}
?>

</body>
</html>
