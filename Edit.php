<!DOCTYPE html>
<html>
<head>
    <style>

        body {
            font-family: Arial, sans-serif; /* Set the font for the body */
            background-color: #eaeaea; /* Lighter gray background for the whole page */
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center; /* Center align the heading */
            color: #333; /* Darker gray for the heading */
            margin-bottom: 20px; /* Space below the heading */
        }

        form {
            max-width: 400px; /* Increased form width */
            margin: 20px auto; /* Centered form */
            padding: 20px; /* Space inside the form */
            background-color: #fff; /* White background for the form */
            border: 1px solid #ccc; /* Light gray border */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        label {
            font-weight: bold; /* Bold labels */
            margin-bottom: 5px; /* Space below labels */
            display: block; /* Stack labels above inputs */
            color: #555; /* Soft gray for labels */
        }

        input[type="number"],
        input[type="text"],
        input[type="password"] {
            width: 100%; /* Full width */
            padding: 10px; /* Space inside input fields */
            margin: 10px 0; /* Space above and below input fields */
            border: 1px solid #ccc; /* Light gray border */
            border-radius: 4px; /* Rounded corners for input fields */
            box-sizing: border-box; /* Include padding and border in element's total width */
            transition: border-color 0.3s; /* Smooth transition for border color */
        }

        input[type="number"]:focus,
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #4CAF50; /* Green border on focus */
            outline: none; /* Remove default outline */
        }

        input[type="submit"] {
            width: 100%; /* Full width for button */
            background-color: #4CAF50; /* Green background */
            color: white; /* White text */
            padding: 14px; /* Space inside button */
            margin: 10px 0; /* Space above and below button */
            border: none; /* No border */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
            font-size: 16px; /* Larger font size */
            transition: background-color 0.3s; /* Smooth transition for background color */
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        table {
            width: 100%; /* Full width for table */
            max-width: 800px; /* Max width for the table */
            margin: 20px auto; /* Centered table */
            border-collapse: collapse; /* Merge table borders */
            background-color: #fff; /* White background for the table */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        table, th, td {
            border: 1px solid #ddd; /* Light gray border */
        }

        th, td {
            padding: 15px; /* Space inside cells */
            text-align: left; /* Align text to the left */
        }

        th {
            background-color: #4CAF50; /* Green background for header */
            color: white; /* White text */
            text-transform: uppercase; /* Uppercase header text */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Lighter shade for even rows */
        }

        tr:hover {
            background-color: #f1f1f1; /* Light gray on row hover */
        }
    </style>
</head>
<body>

<h2>Edit User Information</h2>

<?php
    // Database connection
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "movies";

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_GET["id"])) {
        $userID = $_GET["id"];

        // Fetch user details from the database
        $sql = "SELECT * FROM user WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // If form is submitted, handle the update
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $CardType = $_POST["Card_Type"];
                $CardholderName = $_POST["Cardholder_Name"];
                $CardNumber = $_POST["Card_Number"];
                $exp = $_POST["ExpiryDate"] ??"";
                $CVV = $_POST["CVV"];
                $EmailAddress = $_POST["Email_Address"];

                // Update user information in the database
                $updateSql = "UPDATE user SET Card_Type = ?, Cardholder_Name = ?, Card_Number = ?, ExpiryDate = ?, CVV = ?, Email_Address = ? WHERE id = ?";
                $stmt = mysqli_prepare($conn, $updateSql);
                mysqli_stmt_bind_param($stmt, "ssssssi", $CardType, $CardholderName, $CardNumber, $exp, $CVV, $EmailAddress, $userID);

                if (mysqli_stmt_execute($stmt)) {
                    echo "User with id $userID has been updated successfully!";
                } else {
                    echo "Error updating user: " . mysqli_error($conn);
                }

                // Redirect to a different page after update
                header("Location: Aread.php");
                exit();
            }

            // Display the form with the fetched user data
            ?>
            <form method="POST">
                <label for="Card_Type">Card Type:</label>
                <input type="text" name="Card_Type" id="Card_Type" value="<?php echo $row['Card_Type']; ?>" required>

                <label for="Cardholder_Name">Cardholder Name:</label>
                <input type="text" name="Cardholder_Name" id="Cardholder_Name" value="<?php echo $row['Cardholder_Name']; ?>" required>

                <label for="Card_Number">Card Number:</label>
                <input type="number" name="Card_Number" id="Card_Number" value="<?php echo $row['Card_Number']; ?>" required>

                <label for="ExpiryDate">Expiry Date:</label>
                <input type="text" name="ExpiryDate" id="ExpiryDate" value="<?php echo $row['ExpiryDate']; ?>" required>

                <label for="CVV">CVV:</label>
                <input type="number" name="CVV" id="CVV" value="<?php echo $row['CVV']; ?>" required>

                <label for="Email_Address">Email Address:</label>
                <input type="text" name="Email_Address" id="Email_Address" value="<?php echo $row['Email_Address']; ?>" required>

                <input type="submit" value="Update">
            </form>

            <?php
        } else {
            echo "User not found.";
        }
    } else {
        echo "Invalid request.";
    }

    // Close database connection
    mysqli_close($conn);
?>

</body>
</html>
