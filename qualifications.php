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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" />
  <link href="https://pagecdn.io/lib/toastr/2.1.4/toastr.min.css" rel="stylesheet" crossorigin="anonymous" integrity="sha256-R91pD48xW+oHbpJYGn5xR0Q7tMhH4xOrWn1QqMRINtA=">
  <title>Medical Register</title>
</head>
<?php
    session_start();
    include 'Config.php';
    if (!isset($_SESSION['UserID'])) {
        exit(header('Location: index.php'));
    }
?>
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
          <li class="nav-item">
            <a class="nav-link" href="med_register.php">Medical Register</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="qualifications.php">Update Qualifications <span class="sr-only">(current)</span></a>
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
      <h1>Qualifications</h1>
    </section>

    <?php

    $sql = "SELECT * FROM tbl_credits";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      echo "The error is " . $conn->error;
    } else {
      $numrows = mysqli_num_rows($result);
    }
    ?>
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-7">
          <div class="card shadow p-3 mb-5 bg-white rounded animate__animated animate__fadeIn">
            <div class="card-body">
              <h3 class="mb-4"><u>Current medical qualifications</u></h3>
              <table id="table_id" class="display table table-hover">
                <caption>Database of medical Qualifications</caption>
                <thead>
                  <tr>
                    <th>Discipline</th>
                    <th>CPE activity</th>
                    <th>CME Date</th>
                    <th>Credits/Awards</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($numrows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr><td>" . $row['discipline'] . "</td>"
                        . "<td>" . $row['cpe_activity'] . "</td>"
                        . "<td>" . $row['cme_date'] . "</td>"
                        . "<td>" . $row['credits_awards'] . "</td></tr>";
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
          <div class="card shadow p-3 mb-5 bg-white rounded animate__animated animate__fadeIn">
            <div class="card-body">
              <h3 class="mb-4"><u>Add a qualification</u></h3>
              <form action="qualification.inc.php" method="post">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="discipline" placeholder="Enter Discipline">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" name="cpe_activity" placeholder="Enter CPE Activity" class="form-control">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="number" name="credits_awards" placeholder="Enter credits/awards" class="form-control">
                    <small><i>Enter number only</i></small>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <input type="date" name="cme_date" class="form-control">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <textarea name="notes" class="form-control" placeholder="Enter any notes/comments you may have"></textarea>
                  </div>
                </div>
                <button type="submit" name="qual_submit" class="btn btn-outline-dark mt-2">Submit</button>
              </form>
            </div>


          </div>
        </div>
      </div>
    </div>

  </Main>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
  <script src="https://pagecdn.io/lib/toastr/2.1.4/toastr.min.js" crossorigin="anonymous" integrity="sha256-Hgwq1OBpJ276HUP9H3VJkSv9ZCGRGQN+JldPJ8pNcUM="></script>
  <script>
    $(document).ready(function() {
      $('#table_id').DataTable({
        responsive: {
          details: {
            type: 'column',
            target: 'tr'
          }
        },
        columnDefs: [{
          className: 'control',
          orderable: false,
          targets: 0
        }],
        order: [1, 'asc']

      });
    });


    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('msg');


    if (myParam && myParam == "Error!") {
      Command: toastr["error"]("Something went wrong!", "Barbados Medical Register")

      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
    }
    else if (myParam && myParam == "new course created!") {
      Command: toastr["success"]("Course created successfully!", "Barbados Medical Register")

      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
    }
  </script>
</body>
<script src="autologout.js"></script>

</html>