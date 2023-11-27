


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
 
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="studentDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Students
              </button>
              <ul class="dropdown-menu" aria-labelledby="studentDropdown">
                <li><a class="dropdown-item" href="studentform.php">Add student</a></li>
                <li><a class="dropdown-item" href="studentview.php">View students</a></li>
             
              </ul>
            </div>
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="studentDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              Professors
              </button>
              <ul class="dropdown-menu" aria-labelledby="studentDropdown">
                <li><a class="dropdown-item" href="registrationform.php">Add  Professors</a></li>
                <li><a class="dropdown-item" href="view.php">View  Professors</a></li>
              
              </ul>
            </div>
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="studentDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Assignment
              </button>
            
              <ul class="dropdown-menu" aria-labelledby="studentDropdown">
                <li><a class="dropdown-item" href="#">Add Assignment</a></li>
                <li><a class="dropdown-item" href="#">View Assignment</a></li>
              
              </ul>
            </div>

            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="studentDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Grades
              </button>
              <ul class="dropdown-menu" aria-labelledby="studentDropdown">
                <li><a class="dropdown-item" href="#">Add Grades</a></li>
                <li><a class="dropdown-item" href="#">View Grades</a></li>
             
              </ul>
              </div>
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="studentDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  Activity log
                </button>
              
                <ul class="dropdown-menu" aria-labelledby="studentDropdown">
                  <li><a class="dropdown-item" href="">Add Activity Log</a></li>
                  <li><a class="dropdown-item" href="">View Activity log</a></li>
           
                </ul>
              </div>
          </ul>
        </div>
      </div>
      
      </div>
    </nav>

    
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>