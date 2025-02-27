<?php
  $conn = new mysqli('localhost', 'root', '', 'movies');

  if ($conn->connect_error) {
    die('Connection Error : ' . $conn->connect_error);
  }

?>
