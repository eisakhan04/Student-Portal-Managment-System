<?php

// Connect to the database
include("connfig.php");
header('Content-type: text/html');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $studentId = (int)$_GET['id']; // Cast to integer

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the updated data from the form
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $dateOfBirth = $_POST['date_of_birth'];
        $enrollmentDate = $_POST['enrollment_date'];

        // Validate the user input
        if (empty($firstName) || empty($lastName) || empty($email) || empty($dateOfBirth) || empty($enrollmentDate)) {
            echo 'Please fill in all the required fields.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Please enter a valid email address.';
        } else {
            // Prepare the SQL query to update the student record
            $sql = "UPDATE students SET first_name = ?, last_name = ?, email = ?, date_of_birth = ?, enrollment_date = ? WHERE student_id = ?";

            // Prepare the SQL statement
            $stmt = mysqli_prepare($conn, $sql);

            // Bind the updated data to the prepared statement
            mysqli_stmt_bind_param($stmt, 'sssssi', $firstName, $lastName, $email, $dateOfBirth, $enrollmentDate, $studentId);

            // Execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                header("Location: studentview.php");
                echo 'Student record updated successfully.';

            } else {
                echo 'Failed to update the student record: ' . mysqli_error($conn);
            }

            // Close the prepared statement
            mysqli_stmt_close($stmt);
        }
    }

    // Retrieve the existing student data
    $sql = "SELECT * FROM students WHERE student_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $studentId);
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        // Close the prepared statement
        mysqli_stmt_close($stmt);

        if ($row) {
            // Display the student data in a form for updating
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Update Student</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            </head>
            <body>
                <div class="container">
                    <h2>Update Student</h2>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="' . $row['first_name'] . '">
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="' . $row['last_name'] . '">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="' . $row['email'] . '">
                        </div>
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="' . $row['date_of_birth'] . '">
                        </div>
                        <div class="mb-3">
                            <label for="enrollment_date" class="form-label">Enrollment Date</label>
                            <input type="date" class="form-control" id="enrollment_date" name="enrollment_date" value="' . $row['enrollment_date'] . '">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Student</button>
                    </form>
                </div>
            </body>
            </html>';
        } else {
            echo 'Student not found.';
        }
    } else {
        echo 'Failed to retrieve student data: ' . mysqli_error($conn);
    }
} else {
    echo 'Invalid student ID provided.';
}

// Close the database connection
mysqli_close($conn);
?>