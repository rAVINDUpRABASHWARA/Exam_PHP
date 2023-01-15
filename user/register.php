<?php
require_once('./controllers/getmasterdata.php');

$result_r = countrylist();
 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Exam Portal :: Registration</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="./theme/vendor/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="./theme/css/sb-admin-2.min.css" type="text/css">

    <!-- Custom Datetime Picker-->
    <link rel="stylesheet" href="./theme/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" type="text/css" media="all" />
    

</head>

<body class="bg-gradient-primary">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Main Content - Start -->
                    <!-- Content Row -->
                    <div class="row">
                    <div class="col-lg-5 d-sm-block">
                        <img class="img-fluid" src="./theme/img/undraw_secure_login_pdn4.png"/>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user text-dark">
                                <div class="form-group row">
                                    <div class="col-md-6 mb-2 mb-sm-0">
                                        <label class="text-dark">First Name</label>
                                        <input type="text" autocomplete="false" class="form-control form-control-sm" id="txt_fname" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6 mb-2 mb-sm-0">
                                        <label class="text-dark">Last Name</label>
                                        <input type="text" autocomplete="false" class="form-control form-control-sm" id="txt_lname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label class="text-dark">Date Of Birth</label>
                                        <input type="text" id="datetimepicker1" class="form-control form-control-sm" />
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="text-dark">Gender</label>
                                        <select class="form-control form-control-sm" id="cmb_gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="text-dark">Country</label>
                                        <select class="form-control form-control-sm" id="cmb_country">
                                            <?php 
                                            while($row = $result_r->fetch_assoc()) 
                                            {
                                                echo "<option>". $row["CountryName"]."</option>";
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="text-dark">Email</label>
                                        <input type="email" id="txt_email" autocomplete="false" class="form-control form-control-sm" />
                                    </div> 
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="text-dark">Password</label>
                                        <input type="password" autocomplete="false" class="form-control form-control-sm" id="txt_password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-dark">Re-Type Password</label>
                                        <input type="password" autocomplete="false" class="form-control form-control-sm" id="txt_repassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button onclick="click_register()" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Main Content - End -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; D SOFT MEDIA <?php echo date("Y"); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <?php include './portal_footer.php'; ?>
    
    
    <script src="./theme/vendor/bootstrap-datetimepicker/js/moment.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="./theme/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
   

    <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    maxDate: '2021-12-31',
                    format: 'YYYY-MMM-DD',
                    locale: moment.locale(),
                });
            });
    </script>

    <script>
        function click_register()
        {
           
            var txt_fname = document.getElementById("txt_fname").value;
            var txt_lname = document.getElementById("txt_lname").value;
            var dtp_dob = document.getElementById("datetimepicker1").value; 
            var cmb_gender = document.getElementById("cmb_gender").value;
            var cmb_country = document.getElementById("cmb_country").value;
            var txt_email = document.getElementById("txt_email").value;
            var txt_password = document.getElementById("txt_password").value;
            var txt_repassword = document.getElementById("txt_repassword").value;

            if(txt_fname.length < 2)
            {
                document.getElementById("txt_fname").focus();
                Toastify_danger("Please Enter First Name.");
                return;
            }

            if(txt_lname.length < 2)
            {
                document.getElementById("txt_lname").focus();
                Toastify_danger("Please Enter Last Name.");
                return;
            }
            
            $.ajax({
            url: "./controllers/userlog.php",
            type: "post",
            data: {
            submit:'submit',
            action:'addnewuser',
            cmb_prefix: cmb_prefix,
            txt_fname: txt_fname,
            txt_lname: txt_lname,
            txt_phone: txt_phone,
            txt_addr1: txt_addr1,
            txt_addr2: txt_addr2,
            cmb_country: cmb_country,
            txt_city: txt_city,
            txt_zip: txt_zip,
            cmb_industry: cmb_industry,
            cmb_field: cmb_field,
            txt_email: txt_email,
            txt_password: txt_password,
            } ,
            success: function (response) {
                
                if(response == "ERROR1")
                {
                    Toastify_danger("ERROR1");
                    return;
                }
                else if(response == "ERROR2")
                {
                    Toastify_danger("ERROR2");
                    return;
                }
                else if(response == "SUCCESS")
                { 
                    Toastify_success("SUCCESS");
                    return;
                }
                else
                {
                    Toastify_danger("ERROR NONE");
                    return;
                }
            
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
            
                Toastify_danger("ERROR NONE");
                return;
            
            } });
        }
    </script>

  
</body>

</html>