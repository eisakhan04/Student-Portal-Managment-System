<?php
if (!isset($_SESSION)) {
    session_start();
  }
  
  
  if (isset($_SESSION['login'])) {
  
    header("Location: index.php");
    exit();
  }
?>
<link rel="stylesheet" href="css/bootstrap.min.css">


  <div class="container">
    <h2 class="mt-4 mb-4">Login</h2>
    <form action="" method="POST">
      <div class="form-group">
        <label  class="form-label">Email:</label>
        <input type="email" class="form-control"  name="email" required>
      </div>
      <div class="form-group">
        <label class="form-label">Password:</label>
        <input type="password" class="form-control"  name="password" required>
      </div>
      <button type="submit" class="btn btn-primary" name="sub">Login</button>
    </form>
  </div>
</body>
</html>


<?php

include 'connfig.php';

if(isset($_POST['sub']))
{
// Get login credentials from form
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare SQL query to check user credentials
$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);

// Check if user exists and password matches
if (mysqli_num_rows($result) > 0) {
      session_start();
      $_SESSION['login']=true;
      $_SESSION['email']=$email;
      header("Location:index.php");
      
   
} else {
    // Invalid login credentials
    echo "Invalid email or password";
}

// Close connection
mysqli_close($conn);
}
?>