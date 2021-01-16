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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css"
    integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ=="
    crossorigin="anonymous" />
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <link href="https://pagecdn.io/lib/toastr/2.1.4/toastr.min.css" rel="stylesheet" crossorigin="anonymous"
    integrity="sha256-R91pD48xW+oHbpJYGn5xR0Q7tMhH4xOrWn1QqMRINtA=">
    



  <title>Medical Register</title>
</head>
<?php
session_start();
if (!isset($_SESSION['UserID'])){ 
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
          <li class="nav-item active">
            <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="med_register.php">Medical Register</a>
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
      <h1>Dashboard</h1>
    </section>

    <div class="container">

      <div class="row row-cols-1 row-cols-md-2 animate__animated animate__fadeIn">

        <div class="col mb-4">
          <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
              <h5 class="card-title"><u><i class="fas fa-user-md"></i> Search medical register</u></h5>
              <form class="form-inline" action="dr_file.inc.php" method="POST" id="test_form">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="doctor" id="doctor" placeholder="Enter Doctor's surname"
                    autocomplete="off" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="dashbtn"
                      id="button-addon2">Search</i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col mb-4">
          <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
              <h5 class="card-title"><u><i class="fas fa-graduation-cap"></i> Qualifications</u></h5>
              <p class="card-text">Click the button below to add a new course to the database.</p>
              <a href="qualifications.php" class="btn btn-outline-dark btn-lg" role="button" aria-pressed="true">Add
                new course</a>
              <!-- <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Update Dr. record</a> -->
            </div>
          </div>
        </div>

        <div class="col mb-4">
          <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
              <h5 class="card-title"><u><i class="fas fa-notes-medical"></i> Quick Report</u></h5>
              <p class="card-text">Under construction!</p>
            </div>
          </div>
        </div>
      </div>


      <!-- <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div style="position: absolute; top: 0; right: 0;">
          <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <img src="./images/icon.svg" class="rounded mr-2" alt="...">
              <strong class="mr-auto">Medical Register</strong>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body" style="background-color: #fff; color: rgb(7, 100, 7);">
              Welcome!
            </div>
          </div>
        </div>
      </div>
    </div> -->

      <!-- <div class="toast" id="myToast" style="position: absolute; top: 0; right: 0; min-width: 200px;">
        <div class="toast-header">
          <img src="./images/icon.svg" class="rounded mr-2" alt="icon" style="height: 15px; width: auto;">
          <strong class="mr-auto">Medical Register</strong>
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body" style="background-color: #fff; color: rgb(7, 100, 7);">
          <b>Welcome!</b>
        </div>
      </div> -->
  </Main>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
    integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
  <script src="https://pagecdn.io/lib/toastr/2.1.4/toastr.min.js" crossorigin="anonymous"
    integrity="sha256-Hgwq1OBpJ276HUP9H3VJkSv9ZCGRGQN+JldPJ8pNcUM="></script>

  <script>


    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('msg');


    if (myParam && myParam == "Welcome!") {
      Command: toastr["info"]("Welcome!", "Barbados Medical Register")

      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
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



    $(document).ready(function () {

      $('#doctor').typeahead({
        source: function (query, result) {
          $.ajax({
            url: "fetchdr.php",
            method: "POST",
            data: { query: query },
            dataType: "json",
            success: function (data) {
              result($.map(data, function (item) {
                return item;
                $('#doctor').attr('value', result);
              }));
            }
          })
        }
      });

    });



  </script>
  <script src="autologout.js"></script>
</body>

</html>