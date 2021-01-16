<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" />


  <title>Medical Register</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ml-auto">
      <img src="./images/icon.svg" width="30" height="30" alt="" loading="lazy">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="med_register.php">Medical Register <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="qualifications.php">Update Qualifications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reports.php">Reports</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-md"></i></a>
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
      <h1>Medical Register</h1>
    </section>
    <?php
    include 'Config.php';
    $sql = "SELECT * FROM registered_doctors";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      echo "The error is " . $conn->error;
    } else {
      $numrows = mysqli_num_rows($result);
    }
    ?>
    <div class="container-fluid">
      <div class="row animate__animated animate__fadeIn">
        <div class="col-lg-9">
          <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
              <form action="dr_file.inc.php" method="post">
                <table id="table_id" class="display table table-hover">
                  <caption>Register of medical doctors</caption>
                  <thead>
                    <tr>
                      <th>Registration number</th>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>Registration Date</th>
                      <th><i class="fas fa-user-md"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($numrows > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row['reg_no'] . "</td>"
                          . "<td>" . strtoupper($row['dr_fname']) . "</td>"
                          . "<td>" . strtoupper($row['dr_surname']) . "</td>"
                          . "<td>" . $row['registration_date'] . "</td>"
                          . "<td><button class='btn btn-outline-dark' name='view_dr' type='submit' value=" . $row['reg_no'] . ">View Doctor</button></td></tr>";
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
            <a href="newdoctor_form.php" class="btn btn-outline-dark btn-lg" role="button">Add new doctor</a><br>
            <small>Click here to add a new doctor to the database</small>
            </div>
          </div>
        </div>
      </div>



    </div>

  </Main>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#table_id').DataTable();
    });
  </script>
<script src="autologout.js"></script>
</body>

</html>