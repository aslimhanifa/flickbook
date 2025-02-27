<?php
include 'database.php';

// Fetch messages for the user
$sql = "SELECT * FROM messages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Messages</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .messages-container {
            background-color: #ffffff;
            padding: 30px;
            width: 100%;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .message {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 20px;
            border-left: 5px solid #007bff;
            border-radius: 5px;
        }

        .message h3 {
            margin-top: 0;
            color: #333;
        }

        .message p {
            margin: 5px 0;
            color: #555;
        }

        .reply {
            background-color: #e6f7ff;
            padding: 10px;
            border-left: 5px solid #28a745;
            margin-top: 10px;
            border-radius: 5px;
        }

        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .no-messages {
            text-align: center;
            color: #888;
            font-size: 1.2em;
        }
    </style>
</head>
<body>

    <div class="messages-container">
        <h2>Your Messages</h2>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='message'>";
                echo "<h3>Name: " . htmlspecialchars($row["name"]) . "</h3>";
                echo "<p><strong>Message:</strong> " . htmlspecialchars($row["message"]) . "</p>";

                // Display the reply if it exists
                if ($row["reply"]) {
                    echo "<div class='reply'><strong>Reply:</strong> " . htmlspecialchars($row["reply"]) . "</div>";
                } else {
                    echo "<p class='no-reply'><em>No reply yet.</em></p>";
                }
                echo "<hr>";
                echo "</div>";
            }
        } else {
            echo "<p class='no-messages'>No messages.</p>";
        }

        $conn->close();
        ?>
    </div>

</body>
</html>
