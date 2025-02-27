<?php
include 'database.php';

$sql = "SELECT * FROM messages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
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
        }

        .message-container {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            margin-bottom: 20px;
        }

        .message-container h2 {
            margin-bottom: 15px;
            color: #333;
        }

        .message {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-left: 5px solid #007bff;
            border-radius: 5px;
        }

        .message p {
            margin: 5px 0;
            color: #555;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .delete-btn {
            background-color: #dc3545;
            margin-top: 10px;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        hr {
            border: 0;
            height: 1px;
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <div class="message-container">
        <h2>User Messages</h2>
        
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='message'>";
                echo "<p><strong>Name:</strong> " . htmlspecialchars($row["name"]) . "</p>";
                echo "<p><strong>Message:</strong> " . htmlspecialchars($row["message"]) . "</p>";

                if ($row["reply"]) {
                    echo "<p><strong>Reply:</strong> " . htmlspecialchars($row["reply"]) . "</p>";
                } else {
                    echo "<p><em>No reply yet.</em></p>";
                }

                // Reply form
                echo "<form method='POST' action='msgreply.php'>";
                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                echo "<textarea name='reply' required placeholder='Reply...'></textarea>";
                echo "<button type='submit'>Reply</button>";
                echo "</form>";

                // Delete form
                echo "<form method='POST' action='delete.php'>";
                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                echo "<button type='submit' class='delete-btn'>Delete</button>";
                echo "</form>";
                echo "</div><hr>";
            }
        } else {
            echo "<p>No messages.</p>";
        }

        $conn->close();
        ?>
    </div>

</body>
</html>

