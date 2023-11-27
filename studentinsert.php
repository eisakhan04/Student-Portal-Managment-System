<?php
// Connect to the database
include("connfig.php");

// Get the user input
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];
$dateOfBirth = $_POST['date_of_birth'];
$enrollmentDate = $_POST['enrollment_date'];

// Validate the user input
if (empty($firstName) || empty($lastName) || empty($email) || empty($dateOfBirth) || empty($enrollmentDate)) {
  echo 'Please fill in all the required fields.';
  exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo 'Please enter a valid email address.';
  exit();
}

$sql = "INSERT INTO students (student_id, first_name, last_name, email, date_of_birth, enrollment_date) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'isssss', $student_id, $firstName, $lastName, $email, $dateOfBirth, $enrollmentDate);
mysqli_stmt_execute($stmt);


// Check if the student was inserted successfully
if (mysqli_affected_rows($conn) > 0) {
  echo 'Student registration successful.';
} else {
  echo 'Failed to insert the new student.';
}

// Close the prepared statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($conn);
?>
