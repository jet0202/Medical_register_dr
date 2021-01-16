<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <title>Medical Register</title>
</head>
<?php
    session_start();
    if (!isset($_SESSION['UserID'])) {
        exit(header('Location: index.php'));
    }
?>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ml-auto">
      <img src="./images/icon.svg" width="30" height="30" alt="" loading="lazy">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="med_register.php">Medical Register</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="qualifications.php">Update Qualifications</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="reports.php">Reports <span class="sr-only">(current)</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-md"></i></a>
            <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="profile.php"><i class="far fa-id-badge"></i> Profile</a>
              <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <Main>
    <section class="page_title shadow p-3 mb-5 bg-white rounded">
      <h1>Reports</h1>
    </section>
    <div class="container">
      <div class="card shadow p-1 mb-4 bg-white rounded">
        <center>
        <h1><u>Currently under construction!</u></h1>
      </center>
      </div>
    </div>
    
    

  </Main>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
</body>
<script src="autologout.js"></script>

</html>