<?php
include 'database.php';


if (isset($_POST['submitbtn'])) {
    // Get form data
    $package   = $_POST['package'];
    $fname     = $_POST['fname'];
    $lname     = $_POST['lname'];
    $phone     = $_POST['phone'];
    $email     = $_POST['email'];
    $adults    = $_POST['adults'];
    $children  = $_POST['children'];
    $seats     = $_POST['seats']; // Array of selected seats

    // Join selected seats into a string to store them in a single column
    $seat_selection = implode(",", $seats);

    // Insert the booking details into the database
    $sql = "INSERT INTO book (package, fname, lname, phone, email, adults, children, seats) 
            VALUES ('$package', '$fname', '$lname', '$phone', '$email', '$adults', '$children', '$seat_selection')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Booked Successfully";
        header('Location: viewbook.php');
    } else {
        die(mysqli_error($conn));
    }
}

// Handle deletion of bookings
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete query
    $delete_sql = "DELETE FROM book WHERE id = '$id'";

    // Execute the delete query
    if ($conn->query($delete_sql)) {
        ?>
        <script>
            window.alert("Deleted Successfully");
            window.location.href = "viewbook.php";
        </script>
        <?php
        exit(0);
    } else {
        ?>
        <script>
            window.alert("Failed to delete booking");
            window.location.href = "viewbook.php";
        </script>
        <?php
        exit(0);
    }
}

mysqli_close($conn);

?>
