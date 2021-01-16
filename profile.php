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
  <link href="https://pagecdn.io/lib/toastr/2.1.4/toastr.min.css" rel="stylesheet" crossorigin="anonymous" integrity="sha256-R91pD48xW+oHbpJYGn5xR0Q7tMhH4xOrWn1QqMRINtA=">
  <title>Medical Register</title>
  <link rel="shortcut icon" type="image/jpg" href="favicon.ico" />
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
      <h1>User Profile</h1>
    </section>
    <?php

    $userId = filter_var($_SESSION['UserID'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "SELECT * FROM tbl_user WHERE userID = ?";
    if (!($stmt = $conn->prepare($sql))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    } else {
      if (!$stmt->bind_param("i", $userId)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
      } else {
        if (!$stmt->execute()) {
          echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        } else {
          $result = $stmt->get_result();
          $numrows = mysqli_num_rows($result);
          if ($numrows > 0) {
            $row = mysqli_fetch_assoc($result);
            $fullname = $row['fullname'];
          }
        }
      }
    }

    // $result = mysqli_query($conn, $sql);
    // if (!$result) {
    //   echo "The error is " . $conn->error;
    // } else {
    //   $numrows = mysqli_num_rows($result);
    //   if ($numrows > 0) {
    //     $row = mysqli_fetch_assoc($result);
    //   }
    // }

    // $fullname = $row['fullname'];


    ?>
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Personal</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#manage" role="tab" aria-controls="manage" aria-selected="false">Manage users</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#create" role="tab" aria-controls="create" aria-selected="false">Create user</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="card shadow p-3 mb-5 mt-5 bg-white rounded">
            <div class="card-body">
              <h5 class="card-title"><i class="fas fa-user-md" style="font-size: 30px;"></i> <u><?php echo strtoupper($fullname); ?></u></h5>
              <div class="alert alert-dark" role="alert" style="margin-top: 40px;">
                Complete the form below to change your password.
              </div>
              <form action="manage_users.inc.php" method="POST" class="needs-validation" novalidate>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="password">Enter Password</label>
                    <input type="password" name="password" class="form-control form_input" id="password" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="password">Confirm password</label>
                    <input type="password" name="password" class="form-control form_input" id="confirm_pw" required>
                    <div class="match" data-toggle="tooltip" data-placement="right" title="It's a match!"></div>
                    <div class="no_match" data-toggle="tooltip" data-placement="right" title="Password does not match!">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-outline-dark" value="<?php echo $userId; ?>" name="changepw" id="changepw">Change Password</button>
              </form>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="manage" role="tabpanel" aria-labelledby="manage-tab">
          <div class="card shadow p-3 mb-5 mt-5 bg-white rounded">
            <div class="card-body">
              <?php
              $sql = "SELECT * FROM tbl_user";
              $result = mysqli_query($conn, $sql);
              if (!$result) {
                echo "The error is " . $conn->error;
              } else {
                $numrows = mysqli_num_rows($result);
              }
              ?>
              <form action="manage_users.inc.php" method="post">
                <table id="user_tbl" class="table table-lg">
                  <caption>Users</caption>
                  <thead class="thead-dark">
                    <tr>
                      <th>Fullname</th>
                      <th>Email</th>
                      <th>User Level</th>
                      <th><i class="fas fa-user-slash"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($numrows > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row['fullname'] . "</td>"
                          . "<td>" . $row['email'] . "</td>"
                          . "<td>" . $row['User_lvl'] . "</td>"
                          . "<td><button class='btn btn-outline-danger' name='remove_usr' type='submit' value=" . $row['UserID'] . ">Remove user</button></td></tr>";
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="create" role="tabpanel" aria-labelledby="create-tab">
          <div class="card shadow p-3 mb-5 mt-5 bg-white rounded">
            <div class="card-body">
              <h2>Create user</h2>
              <hr>
              <form action="manage_users.inc.php" method="post" class="needs-validation" novalidate>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <input type="text" name="fullname" placeholder="Enter user's full name" class="form-control" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <input type="email" name="email" id="email" onchange="check_email()" placeholder="Enter user's email" class="form-control" required>
                    <span id="error" class="animate__animated animate__fadeIn"></span>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <select name="User_lvl" class="form-control" required>
                      <option value="" disabled selected>Please select user level</option>
                      <option value="Administrator">Administrator</option>
                      <option value="Doctor">Doctor</option>
                    </select>
                  </div>
                </div>
                <small><i>NB. A default password will be automatically assigned to this user.</i></small>
                <hr>
                <button class="btn btn-outline-success" type="submit" id="submit_btn" name="create_btn">Create user</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--  -->

    <div class="toast" id="myToast" style="position: absolute; top: -30; right: 0; min-width: 200px;">
      <div class="toast-header">
        <img src="./images/icon.svg" class="rounded mr-2" alt="icon" style="height: 15px; width: auto;">
        <strong class="mr-auto">Medical Register</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body" style="background-color: #fff; color: red;">
        <b>User successfully removed!</b>
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
  <script src="https://pagecdn.io/lib/toastr/2.1.4/toastr.min.js" crossorigin="anonymous" integrity="sha256-Hgwq1OBpJ276HUP9H3VJkSv9ZCGRGQN+JldPJ8pNcUM="></script>
  <script>
    $('#password, #confirm_pw').on('keyup', function() {
      if ($('#password').val() == $('#confirm_pw').val()) {
        $('.no_match').tooltip('hide');
        $('.match').tooltip('show');
        document.getElementById("changepw").disabled = false;
      } else {
        $('.match').tooltip('hide');
        $('.no_match').tooltip('show');
        document.getElementById("changepw").disabled = true;
      }
    });
    //this needs to be completed...button must disable if no value has been entered
    // var val = document.getElementById('password').value;
    // if (/^\s*$/.test(val)) {
    //   document.getElementById("togglebtn").disabled = true;
    // } else {
    //   document.getElementById("togglebtn").disabled = false;
    // }

    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();

    $(document).ready(function() {
      $('#user_tbl').DataTable({
        responsive: {
          details: false
        }
      });
    });

    function check_email() {
      var email = document.getElementById('email').value;
      // console.log(email);
      $(document).ready(function() {
        $.ajax({
          type: "POST",
          url: "check_email.php",
          data: ({
            check: email
          }),
          success: function(data) {
            if (data == 1) {
              $("#error").html("☒ Email already exists!");
              $('#error').css('color', 'red');
              document.getElementById('submit_btn').disabled = true;
            } else if (data == 2) {
              $("#error").html("☑ Available");
              $('#error').css('color', 'green');
              document.getElementById('submit_btn').disabled = false;
            }

          }
        });

      });
    }

    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('msg');


    if (myParam && myParam == "User added!") {
      Command: toastr["success"]("User added!", "Barbados Medical Register")

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
    else if (myParam && myParam == "User removed!") {

      Command: toastr["success"]("User removed!", "Barbados Medical Register")

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
    else if (myParam && myParam == "Password Changed!") {

      Command: toastr["success"]("User removed!", "Barbados Medical Register")

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
  <script src="autologout.js"></script>