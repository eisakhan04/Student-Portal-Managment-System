<?php



//include("dashborad.php");
include 'C:\xampp\htdocs\Student portal\admin_activity_log\footer.php';




// Connect to the database
include("connfig.php");

// Query to retrieve all student records
$sql = "SELECT * FROM students";

// Execute the SQL query
$result = mysqli_query($conn, $sql);

if ($result) {
    // Check if there are any records in the result set
    if (mysqli_num_rows($result) > 0) {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Student List</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        </head>

        <body>
            <div class="container col-8  ">
                <h2>Student List</h2>
                 <a href="studentform.php" class="btn btn-primary mb-3">Add Student</a>
                 <!-- <a href="http://localhost/Student%20portal/admin_activity_log/admin_menu.php" class="btn btn-primary mb-3">Back to Dashboard</a> -->

                <div class="mb-3">
                <label for="search" class="form-label">Search by Name :</label>
                <input type="text" class="form-control" id="search" placeholder="Search by Name ">
            </div>
                <table class="table table-border table-bordered  ">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>Enrollment Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody  id="studentListTableBody">';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
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

        echo '</tbody>
                </table>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofGJopfM2WfS3JDIp4FF5P88T5UZ+dwN" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
    $(document).ready(function () {
        // Function to perform AJAX live search
        function liveSearch() {
            var searchValue = $("#search").val();

            $.ajax({
                type: "POST",
                url: "ajx_live_searchS.php", // Replace with the correct PHP file
                data: { search: searchValue },
                success: function (data) {
                    $("#studentListTableBody").html(data);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: " + xhr.responseText);
                }
            });
        }

        // Call liveSearch function on keyup event in the search input
        $("#search").on("keyup", function () {
            liveSearch();
        });

        // Initial call to populate the table on page load
        liveSearch();
    });
</script>

        </body>
        </html>';

        // Free the result set
        mysqli_free_result($result);
    } else {
        echo 'No student records found.';
    }
} else {
    echo 'Error executing the SQL query: ' . mysqli_error($conn);
    
}

// Close the database connection
mysqli_close($conn);

?>
