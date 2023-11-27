<?php

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'studentportal');

// Check if the connection was successful
if (!$conn) {
  die('Failed to connect to the database: ' . mysqli_connect_error());
} 

?>