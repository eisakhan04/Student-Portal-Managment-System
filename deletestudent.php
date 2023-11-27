<?php
// Connect to the database
include("connfig.php");

header('Content-type: text/html');
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo 'Invalid student ID provided.';
    
    exit();
  }
  
  $sql = "SELECT * FROM students WHERE student_id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, 'i', $_GET['id']);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  
  if (mysqli_num_rows($result) == 0) {
    echo 'Student record not found.';
    exit();
  }
  
  // Delete the student record
  $sql = "DELETE FROM students WHERE student_id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, 'i', $_GET['id']);
  mysqli_stmt_execute($stmt);
  
  if (mysqli_affected_rows($conn) > 0) {
    header("Location: studentview.php");
  
  } else {
    echo 'Failed to delete the student record.';
  }
  
?>
