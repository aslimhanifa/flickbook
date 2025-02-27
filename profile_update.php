<?php
  session_start();

  include('database.php');

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $password = $_POST['password'];
  $previus_email = $_POST['previus-email'];

  //check for use case where some values are not updated
  $query = $conn->prepare("UPDATE `users` SET `first_name` = ?, `email` = ?, `phone_no` = ?, `password` = ?, `dob` = ?, `gender` = ? WHERE `email` = ?");
    $query->bind_param("sssssss", $name, $email, $phone, $password,  $dob, $gender, $previus_email);

    if ($query->execute()) {
        header('Location: profile.php');
        session_destroy();
        exit();
    } else {
        echo "Error Updating the record - " . $conn->error;
    }
    

$query->close();
$conn->close();
?>