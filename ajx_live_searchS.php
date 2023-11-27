<?php

// Connect to the database
include("connfig.php");

$search_value = $_POST["search"];

$sql = "SELECT * FROM students WHERE first_name LIKE '%$search_value%' OR last_name LIKE '%$search_value%'";
$result = mysqli_query($conn, $sql);

$output = "";

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>
            <td>' . $row['student_id'] . '</td>
            <td>' . $row['first_name'] . '</td>
            <td>' . $row['last_name'] . '</td>
            <td>' . $row['email'] . '</td>
            <td>' . $row['date_of_birth'] . '</td>
            <td>' . $row['enrollment_date'] . '</td>
            <td>
                <a href="updatestudent.php?id=' . $row['student_id'] . '" class="btn btn-primary">Update</a>
                <a href="deletestudent.php?id=' . $row['student_id'] . '" class="btn btn-danger">Delete</a>
            </td>
        </tr>';
    }
} else {
    $output .= '<tr><td colspan="7">No matching records found.</td></tr>';
}

echo $output;

// Close the database connection
mysqli_close($conn);

?>
