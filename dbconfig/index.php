<?php
$domain = "http://localhost:8089";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo $domain; ?>/src/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo $domain; ?>/src/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo $domain; ?>/src/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo $domain; ?>/src/vendors/codemirror/codemirror.css">
  <link rel="stylesheet" href="<?php echo $domain; ?>/src/vendors/codemirror/ambiance.css">
  <link rel="stylesheet" href="<?php echo $domain; ?>/src/vendors/pwstabs/jquery.pwstabs.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo $domain; ?>/src/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo $domain; ?>/src/images/favicon.png" />
</head>

<body>
    <div class=" container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="main-panel w-100  documentation">
            <div class="content-wrapper">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 pt-5">
                    <a class="btn btn-primary" href="<?php echo $domain; ?>"><i class="ti-home mr-2"></i>Back to home</a>
                  </div>
                </div>
                <div class="row pt-5 mt-5">
                  <div class="col-12 pt-5 text-center">
                    <i class="text-primary mdi mdi-file-document-box-multiple-outline display-1"></i>
                    <h3 class="text-primary font-weight-light mt-5">
                      You don't have permission to access on this server.
                      <a href="<?php echo $domain; ?>/login.php" target="_blank" class="text-danger d-block text-truncate">
                        Click Here to Go Sign In
                      </a>
                    </h3>
                    <h4 class="mt-4 font-weight-light text-primary">
                      PDF.LK - Your Ultimate Document Sharing Platform
                    </h4>
                  </div>
                </div>
              </div>
            </div>
            <!-- partial:src/partials/_footer.html -->
            <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?php echo date("Y"); ?>   
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">&nbsp; PDF.LK Support Team <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
            <!-- partial -->
          </div>
        </div>
      </div>
<!-- plugins:js -->
<script src="<?php echo $domain; ?>/src/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?php echo $domain; ?>/src/js/off-canvas.js"></script>
<script src="<?php echo $domain; ?>/src/js/hoverable-collapse.js"></script>
<script src="<?php echo $domain; ?>/src/js/template.js"></script>
<script src="<?php echo $domain; ?>/src/js/settings.js"></script>
<script src="<?php echo $domain; ?>/src/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?php echo $domain; ?>/src/js/codeEditor.js"></script>
<script src="<?php echo $domain; ?>/src/js/tabs.js"></script>
<script src="<?php echo $domain; ?>/src/js/tooltips.js"></script>
<script src="<?php echo $domain; ?>/src/js/documentation.js"></script>
<!-- End custom js for this page-->
</body>

</html>