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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" />
  <link href="https://pagecdn.io/lib/toastr/2.1.4/toastr.min.css" rel="stylesheet" crossorigin="anonymous" integrity="sha256-R91pD48xW+oHbpJYGn5xR0Q7tMhH4xOrWn1QqMRINtA=">
  <title>Medical Register</title>
</head>
<?php
    session_start();
    
?>
<body>
<div class="row">
      <div class="col-sm-6 left">
          <div class="centered">
              <img src="./images/icon.svg" style="height:200px" class="login_icon">
              <h1 class="front_title">Barbados Medical Council</h1>
            </div>
      </div>
      <div class="col-sm-6 right">
          <div class="centered-login">
              <div class="card mb-3 shadow p-3 mb-5 bg-white rounded animate__animated animate__fadeInUp" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="./images/login-img.jpg" class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Login</h5>
                      <form action="login.php" method="POST" class="needs-validation" novalidate>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" name="email" class="form-control form_input" required>
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" name="password" class="form-control form_input" required>
                        </div>
                        <button type="submit" class="btn btn-success">Login</button>
                      </form>
                      <!-- <a href="#" class="register mb-2" data-toggle="modal" data-target="#registration">Register</a> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
  </div>

  <div class="modal fade" id="registration" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="registrationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Register here</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="register.php" method="POST" class="needs-validation" novalidate>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="fullname">Full name</label>
                <input type="text" name="fullname" class="form-control form_input" required>
              </div>
              <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control form_input" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="password">Enter Password</label>
                <input type="password" name="password" class="form-control form_input" id="password">
              </div>
              <div class="form-group col-md-6">
                <label for="password">Confirm password</label>
                <input type="password" name="password" class="form-control form_input" id="confirm_pw">
                <div class="match" data-toggle="tooltip" data-placement="bottom" title="It's a match!"></div>
                <div class="no_match" data-toggle="tooltip" data-placement="bottom" title="Password does not match!">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <select name="User_lvl" id="" class="form-control mb-2" required>
                  <option selected disabled value="">Choose role</option>
                  <option value="Administrator" class="form-control">Administrator</option>
                  <option value="Basic User" class="form-control">Basic User</option>
                </select>
              </div>
            </div>
            <hr>

            <button type="submit" class="btn btn-success" name="register" id="register">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="toast" id="myToast" style="position: absolute; top: 0; right: 0;">
    <div class="toast-header toast-success">
      <strong class="mr-auto" id="msg"><i class="fa fa-grav"></i> Error!</strong>
    </div>
    <div class="toast-body">
      <div>Password incorrect!!!</div>
    </div>
  </div>
  <div class="toast" id="myToast2" style="position: absolute; top: 0; right: 0;">
    <div class="toast-header toast-error">
      <strong class="mr-auto" id="msg"><i class="fa fa-grav"></i> Error!</strong>
    </div>
    <div class="toast-body">
      <div>Username does not exist!</div>
    </div>
  </div>
  <div class="toast" id="myToast3" style="position: absolute; top: 0; right: 0;">
    <div class="toast-header toast-error">
      <strong class="mr-auto" id="msg"><i class="fa fa-grav"></i>Barbados Medical Council</strong>
    </div>
    <div class="toast-body">
      <div>You are now logged out!</div>
    </div>
  </div> -->



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://pagecdn.io/lib/toastr/2.1.4/toastr.min.js" crossorigin="anonymous" integrity="sha256-Hgwq1OBpJ276HUP9H3VJkSv9ZCGRGQN+JldPJ8pNcUM="></script>
  <script>
    $('#password, #confirm_pw').on('keyup', function() {
      if ($('#password').val() == $('#confirm_pw').val()) {
        $('.no_match').tooltip('hide');
        $('.match').tooltip('show');
        document.getElementById("register").disabled = false;
      } else {
        $('.match').tooltip('hide');
        $('.no_match').tooltip('show');
        document.getElementById("register").disabled = true;
      }
    });

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


    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('msg');


    if (myParam && myParam == "Incorrect Password!") {
      Command: toastr["error"]("Incorrect password!", "Barbados Medical Register")

      toastr.options = {
        "closeButton": false,
        "debug": true,
        "newestOnTop": false,
        "progressBar": false,
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
    else if (myParam && myParam == "Username does not exist!") {
      Command: toastr["error"]("Username does not exist!", "Barbados Medical Register")

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
    else if (myParam && myParam == "You are now logged out!") {
      Command: toastr["info"]("You are now logged out!", "Barbados Medical Register")

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

</html>