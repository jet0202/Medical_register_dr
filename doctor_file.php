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
    <!-- <link rel="icon" href="/images/icon.svg" type="image/x-icon">   -->
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
    <?php
    include 'Config.php';
    $reg_no = $_GET['reg'];

    $sql = "SELECT * FROM registered_doctors WHERE reg_no =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $reg_no);
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result) {
        echo "The error is " . $conn->error;
    } else {
        $numrows = mysqli_num_rows($result);
        if ($numrows > 0) {
            $row = mysqli_fetch_assoc($result);
        }
    }
    $fname = $row['dr_fname'];
    $surname = $row['dr_surname'];
    $fullname = "Dr." . " " . $fname . " " . $surname;
    ?>
    <Main>
        <section class="page_title shadow p-3 mb-5 bg-white rounded">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="med_register.php">Medical Register</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $fullname; ?></li>
                </ol>
            </nav>
        </section>


        <div class="container">
            <div class="col mb-4">
                <div class="card shadow p-3 mb-5 bg-white rounded animate__animated animate__fadeIn">
                    <div class="card-body">
                        <h4 class="card-title mb-3"><u><?php echo $fullname; ?>'s file</u></h4>
                        <form action="update_dr.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-lg-3">
                                    <input type="text" class="form-control" name="reg_no" value="<?php echo $row['reg_no']; ?>" readonly>
                                </div>
                            </div>
                            <h5>Full Name</h5>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-lg-4">
                                    <input type="text" class="form-control" name="dr_fname" value="<?php echo $row['dr_fname']; ?>">
                                </div>
                                <div class="form-group col-lg-4">
                                    <input type="text" class="form-control" name="dr_othername" value="<?php echo $row['dr_othername']; ?>">
                                </div>
                                <div class="form-group col-lg-4">
                                    <input type="text" class="form-control" name="dr_surname" value="<?php echo $row['dr_surname']; ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-lg-4">
                                    <label for="dr_nationality">Nationality</label>
                                    <input type="text" class="form-control" name="dr_nationality" value="<?php echo $row['dr_nationality']; ?>">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="dr_idnumber">ID number</label>
                                    <input type="text" class="form-control" name="dr_idnumber" value="<?php echo $row['dr_idnumber']; ?>" readonly>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="dr_dob">Date of Birth</label>
                                    <input type="date" class="form-control" name="dr_dob" value="<?php echo $row['dr_dob']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-4">
                                    <label for="personal_address">Personal Address</label>
                                    <input type="text" class="form-control" name="personal_address" value="<?php echo $row['personal_address']; ?>">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="business_address">Business Address</label>
                                    <input type="text" class="form-control" name="business_address" value="<?php echo $row['business_address']; ?>">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="registration_date">Registration date</label>
                                    <input type="date" class="form-control" name="registration_date" value="<?php echo $row['registration_date']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-4">
                                    <label for="dr_qualification">Qualification</label>
                                    <input type="text" class="form-control" name="dr_qualification" value="<?php echo $row['dr_qualification']; ?>" readonly>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="registration_type">Registration Type</label>
                                    <input type="text" class="form-control" name="registration_type" value="<?php echo $row['registration_type']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="Comments">Comments</label>
                                    <textarea class="form-control" name="Comments"><?php echo $row['Comments']; ?></textarea>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="num_credits">Total amount of credits</label>
                                    <input type="text" class="form-control" name="num_credits" readonly value="<?php echo $row['Num_of_credits']; ?>">
                                </div>
                            </div>
                            <h4>Contaction Information</h4>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-lg-4">
                                    <label for="dr_email">Email</label>
                                    <input type="email" class="form-control" name="dr_email" value="<?php echo $row['dr_email']; ?>">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="dr_telno">Telephone Number</label>
                                    <input type="tel" class="form-control" name="dr_telno" value="<?php echo $row['dr_telno']; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-dark" name="update_btn">Update File</button>
                        </form>
                        <hr>

                        <h4 class="mb-4"><u>Completed Courses</u> (last 6)</h4>
                        <div class="com_courses">
                            <div class="row row-cols-1 row-cols-md-4">
                                <?php
                                // var_dump($reg_no);
                                // exit;
                                $sql_course = "SELECT * FROM dr_course_record WHERE reg_no =? ORDER BY Record_ID DESC LIMIT 6";
                                $stmt = $conn->prepare($sql_course);
                                $stmt->bind_param("i", $reg_no);
                                $stmt->execute();
                                $course_result = $stmt->get_result();
                                // $course_result = mysqli_query($conn, $sql_course);

                                if (!$course_result) {
                                    echo "The error is " . $conn->error;
                                } else {
                                    $numrows = mysqli_num_rows($course_result);
                                }
                                if ($numrows > 0) {
                                    while ($row = mysqli_fetch_assoc($course_result)) {
                                        echo "<div class='col'>
                                        <a href='' class='course_card' disabled>
                                        <div class='card shadow p-1 mb-4 bg-white rounded' style='width: 200px; height: 220px;'>
                                        <div class='card-header'><center>
                                        <i class='fas fa-book' style='font-size: 30px;'></i></center></div>
                                      <div class='card-body' style='max-height:100px';>
                                          <center>                                              
                                              <p class='ellipsis'>" . $row['cpe_activity'] . "</p>                                              
                                          </center>  
                                      </div>
                                      <div class='card-footer'>                                      
                                      <center>
                                      <p>" . $row['course_credits'] . " Credit(s)</p>
                                      </center>
                                      </div>
                                  </div></a>
                                  </div>";
                                    }
                                } else {
                                    echo "<h4 class='ml-3'>Doctor has not completed any courses.</h4>";
                                }
                                ?>
                                <div class="see_more">
                                    <button class="btn btn-outline-dark mb-3" data-toggle="modal" data-target="#all_courses"><i class="fas fa-book-reader"></i> See all completed courses</button>
                                </div>
                            </div>

                        </div>
                        <div class="add_course">
                            <div class="card shadow p-3 mb-3 bg-white rounded" style="width: 200px;">
                                <div class="card-body">
                                    <center>
                                        <a href="#" class="mb-2" data-toggle="modal" data-target="#course_add"><i class="fas fa-plus" style="font-size: 50px;"></i></a>
                                        <h5>Add course to doctor</h5>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="course_add" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="course_addLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add a course completed by doctor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="add_dr_credits.inc.php" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="reg_no"></label>
                                        <input type="text" class="form-control" name="reg_no" value="<?php echo $reg_no ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="course_id">Course</label>
                                        <select name="course_id" id="course" class="form-control" onchange="test()">
                                            <option value="" selected disabled>Please select course</option>
                                            <?php
                                            $sqlcred = "SELECT * FROM tbl_credits";
                                            $res = mysqli_query($conn, $sqlcred);
                                            while ($row = mysqli_fetch_assoc($res)) {
                                            ?>
                                                <option value="<?php echo $row["Id"] ?>"><?php echo $row["cpe_activity"]; ?></option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="credits_awards">Credits</label>
                                        <input type="text" class="form-control" name="credits_awards" id="credits" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="date_completed">Date completed</label>
                                        <input type="date" name="date_completed" class="form-control">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-outline-dark mt-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT * FROM dr_course_record where reg_no =?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $reg_no);
            $stmt->execute();
            $result = $stmt->get_result();
            if (!$result) {
                echo "The error is " . $conn->error;
            } else {
                $numrows = mysqli_num_rows($result);
            }
            ?>


            <div class="modal fade" id="all_courses" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="all_coursesLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">All completed courses</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="all_courses_tbl" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>CPE Activity</th>
                                        <th>Credits</th>
                                        <th>Date Completed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($numrows > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr><td>" . $row['cpe_activity'] . "</td>"
                                                . "<td>" . $row['credits_awards'] . "</td>"
                                                . "<td>" . $row['date_completed'] . "</td></tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
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
    <script src="https://pagecdn.io/lib/toastr/2.1.4/toastr.min.js" crossorigin="anonymous" integrity="sha256-Hgwq1OBpJ276HUP9H3VJkSv9ZCGRGQN+JldPJ8pNcUM="></script>
    <script>
        function test() {
            var course = document.getElementById('course').value;
            // alert(course);
            $(document).ready(function() {
                $.ajax({
                    type: "POST",
                    url: "getCredits.php",
                    data: ({
                        id: course
                    }),
                    success: function(data) {
                        // console.log(data);
                        $('#credits').attr('value', data);
                        //    oFormObject.elements["credits_awards"].value = data;
                    }
                });

            });
        }

        $(document).ready(function() {
            $('#all_courses_tbl').DataTable({
                responsive: {
                    details: false
                }
            });
        });


        const urlParams = new URLSearchParams(window.location.search);
        const myParam = urlParams.get('msg');

        if (myParam && myParam == "Doctor file updated!") {

            Command: toastr["success"]("Doctor file updated!", "Barbados Medical Register")

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
        else if (myParam && myParam == "Error!") {
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
        else if (myParam && myParam == "Course added to doctor!") {
            Command: toastr["success"]("Course added!", "Barbados Medical Register")

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