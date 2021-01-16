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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="med_register.php">Medical Register</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add new doctor</li>
                </ol>
            </nav>
        </section>
        <?php
        $sql = "SELECT * FROM registered_doctors ORDER BY reg_no DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $last_regno = $row['reg_no'] + 1;

        ?>

        <div class="container">
            <div class="card shadow p-2 mb-5 bg-white rounded">
                <div class="card-header">
                    <h3>Add doctor</h3>
                </div>
                <div class="card-body">
                    <form action="newdoctor_form.inc.php" method="POST" class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="reg_no">Registration number</label>
                                <input type="text" class="form-control" id="reg_no" name="reg_no" value="<?php echo $last_regno; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="dr_fname">First Name</label>
                                <input type="text" class="form-control" id="dr_surname" name="dr_fname" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dr_surname">Surname</label>
                                <input type="text" class="form-control" id="dr_surname" name="dr_surname" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dr_othername">Other name(s)</label>
                                <input type="text" class="form-control" id="dr_othername" name="dr_othername">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="dr_idnumber">ID number</label>
                                <input type="text" class="form-control" id="dr_idnumber" name="dr_idnumber" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dr_nationality">Nationality</label>
                                <input type="text" class="form-control" id="dr_nationality" name="dr_nationality" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dr_dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dr_dob" name="dr_dob" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="personal_address">Personal Address</label>
                                <input type="text" class="form-control" id="personal_address" name="personal_address" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="business_address">Business Address</label>
                                <input type="text" class="form-control" id="business_address" name="business_address" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="registration_date">Registration date</label>
                                <input type="date" class="form-control" id="registration_date" name="registration_date" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dr_qualification">Qualification</label>
                                <input type="text" class="form-control" id="dr_qualification" name="dr_qualification" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="registration_type">Registration type</label>
                                <input type="text" class="form-control" id="registration_type" name="registration_type" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <label for="Comments">Comments</label>
                                <textarea name="Comments" id="Comments" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="dr_email">Email</label>
                                <input type="email" class="form-control" id="dr_email" name="dr_email" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dr_telno">Telephone number</label>
                                <input type="tel" class="form-control" id="dr_telno" name="dr_telno" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-dark">Add doctor</button>
                    </form>
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
        else if (myParam && myParam == "new record created!") {
            Command: toastr["success"]("New doctor added successfully!", "Barbados Medical Register")

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
</body>

</html>