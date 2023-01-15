<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Exam Portal :: Payments</title>

    <!-- Custom fonts for this template-->
    <link href="./theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./theme/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="./theme/vendor/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="./theme/vendor/datatables/responsive.dataTables.min.css">
       

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include './portal_menu.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include './portal_topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" style="font-size:.85rem;">

                    <!-- Page Heading -->
                    <div class="d-flex align-items-center justify-content-between">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                              <li class="breadcrumb-item active" aria-current="page">My Payments & Invoices</li>
                            </ol>
                          </nav>
                    </div>
                    <!-- Main Content - Start -->
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12">
                            <!-- <div class="table-responsive"> -->
                                <table class="table table-bordered table-hover responsive nowrap" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Client Name</th>
                                        <th>Phone Number</th>
                                        <th>Profession</th>
                                        <th>Date of Birth</th>
                                        <th>App Access</th>
                                        <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-blue mr-3">EB</div>
                                
                                                    <div class="">
                                                    <p class="font-weight-bold mb-0">Ethan Black</p>
                                                    <p class="text-muted mb-0">ethan-black@example.com</p>
                                                    </div>
                                                </div>
                                                </a>
                                            </td>
                                            <td>(784) 667 8768</td>
                                            <td>Designer</td>
                                            <td>09/04/1996</td>
                                            <td>
                                                <div class="badge badge-success badge-success-alt">Enabled</div>
                                            </td>
                                            <td>
                                                    <a class="inline-block btn-circle btn-sm btn-info text-center" href="#"><i class="fas fa-eye"></i></a>
                                                    <a class="inline-block btn-circle btn-sm btn-danger text-center" href="#"><i class="fas fa-download"></i></a>
                                            </td>
                                        </tr>
                            
                                        <tr>
                                            <td>
                                                <a href="#">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-pink mr-3">JR</div>
                                
                                                    <div class="">
                                                    <p class="font-weight-bold mb-0">Julie Richards</p>
                                                    <p class="text-muted mb-0">julie_89@example.com</p>
                                                    </div>
                                                </div>
                                                </a>
                                            </td>
                                            <td> (937) 874 6878</td>
                                            <td>Investment Banker</td>
                                            <td>13/01/1989</td>
                                            <td>
                                                <div class="badge badge-success badge-success-alt">Enabled</div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"
                                                        title="Actions"></i>
                                                    </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <a class="dropdown-item" href="#"><i class="bx bxs-pencil mr-2"></i> Edit Profile</a>
                                                    <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-2"></i> Remove</a>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-blue mr-3">EB</div>
                                
                                                    <div class="">
                                                    <p class="font-weight-bold mb-0">Ethan Black</p>
                                                    <p class="text-muted mb-0">ethan-black@example.com</p>
                                                    </div>
                                                </div>
                                                </a>
                                            </td>
                                            <td>(784) 667 8768</td>
                                            <td>Designer</td>
                                            <td>09/04/1996</td>
                                            <td>
                                                <div class="badge badge-success badge-success-alt">Enabled</div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"
                                                        title="Actions"></i>
                                                    </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <a class="dropdown-item" href="#"><i class="bx bxs-pencil mr-2"></i> Edit Profile</a>
                                                    <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-2"></i> Remove</a>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                            
                                        <tr>
                                            <td>
                                                <a href="#">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-pink mr-3">JR</div>
                                
                                                    <div class="">
                                                    <p class="font-weight-bold mb-0">Julie Richards</p>
                                                    <p class="text-muted mb-0">julie_89@example.com</p>
                                                    </div>
                                                </div>
                                                </a>
                                            </td>
                                            <td> (937) 874 6878</td>
                                            <td>Investment Banker</td>
                                            <td>13/01/1989</td>
                                            <td>
                                                <div class="badge badge-success badge-success-alt">Enabled</div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"
                                                        title="Actions"></i>
                                                    </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <a class="dropdown-item" href="#"><i class="bx bxs-pencil mr-2"></i> Edit Profile</a>
                                                    <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-2"></i> Remove</a>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-blue mr-3">EB</div>
                                
                                                    <div class="">
                                                    <p class="font-weight-bold mb-0">Ethan Black</p>
                                                    <p class="text-muted mb-0">ethan-black@example.com</p>
                                                    </div>
                                                </div>
                                                </a>
                                            </td>
                                            <td>(784) 667 8768</td>
                                            <td>Designer</td>
                                            <td>09/04/1996</td>
                                            <td>
                                                <div class="badge badge-success badge-success-alt">Enabled</div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"
                                                        title="Actions"></i>
                                                    </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <a class="dropdown-item" href="#"><i class="bx bxs-pencil mr-2"></i> Edit Profile</a>
                                                    <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-2"></i> Remove</a>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                            
                                        <tr>
                                            <td>
                                                <a href="#">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-pink mr-3">JR</div>
                                
                                                    <div class="">
                                                    <p class="font-weight-bold mb-0">Julie Richards</p>
                                                    <p class="text-muted mb-0">julie_89@example.com</p>
                                                    </div>
                                                </div>
                                                </a>
                                            </td>
                                            <td> (937) 874 6878</td>
                                            <td>Investment Banker</td>
                                            <td>13/01/1989</td>
                                            <td>
                                                <div class="badge badge-success badge-success-alt">Enabled</div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"
                                                        title="Actions"></i>
                                                    </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <a class="dropdown-item" href="#"><i class="bx bxs-pencil mr-2"></i> Edit Profile</a>
                                                    <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-2"></i> Remove</a>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-blue mr-3">EB</div>
                                
                                                    <div class="">
                                                    <p class="font-weight-bold mb-0">Ethan Black</p>
                                                    <p class="text-muted mb-0">ethan-black@example.com</p>
                                                    </div>
                                                </div>
                                                </a>
                                            </td>
                                            <td>(784) 667 8768</td>
                                            <td>Designer</td>
                                            <td>09/04/1996</td>
                                            <td>
                                                <div class="badge badge-success badge-success-alt">Enabled</div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"
                                                        title="Actions"></i>
                                                    </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <a class="dropdown-item" href="#"><i class="bx bxs-pencil mr-2"></i> Edit Profile</a>
                                                    <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-2"></i> Remove</a>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                            
                                        <tr>
                                            <td>
                                                <a href="#">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-pink mr-3">JR</div>
                                
                                                    <div class="">
                                                    <p class="font-weight-bold mb-0">Julie Richards</p>
                                                    <p class="text-muted mb-0">julie_89@example.com</p>
                                                    </div>
                                                </div>
                                                </a>
                                            </td>
                                            <td> (937) 874 6878</td>
                                            <td>Investment Banker</td>
                                            <td>13/01/1989</td>
                                            <td>
                                                <div class="badge badge-success badge-success-alt">Enabled</div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"
                                                        title="Actions"></i>
                                                    </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <a class="dropdown-item" href="#"><i class="bx bxs-pencil mr-2"></i> Edit Profile</a>
                                                    <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-2"></i> Remove</a>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <!-- </div> -->
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

    <!-- Datatables -->

    <script type="text/javascript" charset="utf8" src="./theme/vendor/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="./theme/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
    // Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    aaSorting: [],
    scrollX: true,
    responsive: true,
    pageLength: 5,
    lengthMenu: [[5, 10, 25, 50], [5, 10, 25, 50]]
  });

  $(".dataTables_filter input")
    .attr("placeholder", "Search here...")
    .css({
      width: "300px",
      display: "inline-block"
    });

  $('[data-toggle="tooltip"]').tooltip();

});
</script>

</body>

</html>