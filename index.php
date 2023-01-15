<?php
session_start();

include './controllers/encdec.php';
include './dbconfig/setconnection.php';

    //Get Main Website Data
    $sqlstring_sitesettings = "SELECT * FROM site_settings WHERE code='1001';";
    $result_sitesettings = $conn->query($sqlstring_sitesettings);
    $row = $result_sitesettings->fetch_assoc();

    //Get Web Page Data
    $sqlstring_webpage = "SELECT * FROM page_settings WHERE pgcode='11';";
    $result_webpage = $conn->query($sqlstring_webpage);
    $row_webpage = $result_webpage->fetch_assoc();

    $site_bannerhead= $site_bannerdesc= $site_consultation= $site_inquire= $site_ted= $site_business= $site_faq= "";

    //Get Web Page Content
    $sqlstring_content = "SELECT * FROM page_attribute WHERE pgcode='11';";
    $result_content = $conn->query($sqlstring_content);

    while($row_content = $result_content->fetch_assoc()) 
    {
      if($row_content["pgsection"] == "banner_head")
      {
        $site_bannerhead =$row_content["pgdesc"];
        $site_bannerdesc =$row_content["pglink"];
      }
      else if($row_content["pgsection"] == "consultation_text")
      {
        $site_consultation =$row_content["pgdesc"];
      }
      else if($row_content["pgsection"] == "inquire_text")
      {
        $site_inquire =$row_content["pgdesc"];
      }
      else if($row_content["pgsection"] == "ted_text")
      {
        $site_ted =$row_content["pgdesc"];
      }
      else if($row_content["pgsection"] == "business_text")
      {
        $site_business =$row_content["pgdesc"];
      }
      else if($row_content["pgsection"] == "faq_text")
      {
        $site_faq =$row_content["pgdesc"];
      }
    }

    //Get News
    $sqlstring_news = "SELECT * FROM site_news WHERE news_status='active' AND news_hot='yes' ORDER BY news_update DESC;";
    $result_news = $conn->query($sqlstring_news);

    //Get Events
    $sqlstring_events = "SELECT * FROM site_events WHERE event_status='active' AND event_hot='yes' ORDER BY event_date DESC;";
    $result_events = $conn->query($sqlstring_events);
 
    //Get Faq
    $sqlstring_faq = "SELECT * FROM site_faq ORDER BY faq_order ASC;";
    $result_faq = $conn->query($sqlstring_faq);

    $ISLOGIN = "NO";
    $USER_FNAME = "";
    $UID_ENC = "";


    if(isset($_SESSION['SYS_USERID']) && $_SESSION['SYS_USERID'] != "")
    {
      $ISLOGIN = "YES";
      $USER_FNAME = strlen($_SESSION['SYS_FNAME']) > 12 ? substr($_SESSION['SYS_FNAME'],0,12)."~" : $_SESSION['SYS_FNAME'];
      $UID_ENC = strEncrypt($_SESSION['SYS_USERID']);
    }
    else
    {
      $ISLOGIN = "NO";
      $USER_FNAME = "";
      $UID_ENC = "";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $row["site_name"]; ?> - <?php echo $row_webpage["page_title"]; ?></title>
  <meta content="bizaid.lk" name="description">
  <meta content="<?php echo $row_webpage["page_metakeyword"]; ?>" name="keywords">

  <!-- Favicons -->
  <link href="theme/img/favicon.png" rel="icon">
  <link href="theme/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="theme/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="theme/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="theme/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="theme/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="theme/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="theme/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="theme/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="theme/css/style.css" rel="stylesheet">

  <style>
.dropdown {
  position: absolute;
  display: inline-block;
}

.dropdown-content {
  display: block;
  position: relative;
  background-color: #f9f9f9;
  width: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 5px 5px;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>

    <!-- Custom CSS File -->
  <link href="theme/css/customstyle.css" rel="stylesheet">

<style>
  .mySlides1
  {
    animation: fadein 1s;
    -moz-animation: fadein 1s; /* Firefox */
    -webkit-animation: fadein 1s; /* Safari and Chrome */
    -o-animation: fadein 1s; /* Opera */
  }
  @keyframes fadein {
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-moz-keyframes fadein { /* Firefox */
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-webkit-keyframes fadein { /* Safari and Chrome */
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-o-keyframes fadein { /* Opera */
    from {
        opacity:0;
    }
    to {
        opacity: 1;
    }
}
.mySlides2
  {
    animation: fadein 1s;
    -moz-animation: fadein 1s; /* Firefox */
    -webkit-animation: fadein 1s; /* Safari and Chrome */
    -o-animation: fadein 1s; /* Opera */
  }
  @keyframes fadein {
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-moz-keyframes fadein { /* Firefox */
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-webkit-keyframes fadein { /* Safari and Chrome */
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-o-keyframes fadein { /* Opera */
    from {
        opacity:0;
    }
    to {
        opacity: 1;
    }
}
</style>

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:<?php echo $row["site_email"]; ?>"><?php echo $row["site_email"]; ?></a>
        <i class="bi bi-phone"></i> <?php echo $row["site_tp"]; ?>
      </div>
      <div class="d-lg-flex social-links align-items-center">
        <?php if($ISLOGIN === "NO"){ ?>

          <a href="login.php" style="background-color: white; 
          color:blue; 
          border-radius:25px; 
          padding:8px 10px 8px 10px; 
          margin-left:5px;
          margin-top:1px;
          margin-bottom:1px; 
          cursor: pointer;">Sign In</a> | 
          <a href="consult.php" style="background-color: white; 
          color:blue; 
          border-radius:25px; 
          padding:8px 10px 8px 10px; 
          margin-left:5px;
          margin-top:1px;
          margin-bottom:1px; 
          cursor: pointer;">Register</a>
        <?php } else if($ISLOGIN === "YES") { ?>

          <?php echo "Hi ! ".strtolower($USER_FNAME); ?>

<?php } ?>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo me-auto"><a href="index.php">Bizaid.lk</a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo me-auto"><img src="theme/img/logo.png" alt="" ></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
        
        <?php include 'sitemenu.php'; ?>
 
        </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a hidden data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor:pointer;" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>
 
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <img style="width:100%;height:auto;" src="./theme/img/bg/1.jpg"/>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us" style="background-color:#fff;color:#000;">
      <div class="container">

        <div class="row mb-2">
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="content" style="background-color:#fff;color:#000;">

              <div class="row">

                  <div class="col-lg-4">
                    <img src="/theme/img/Front_Business_Consultation.jpg" class="img-fluid"/>
                  </div>

                  <div class="col-lg-4">
                    <h3 style="color:#000;">Business Consultation</h3>
                    <p style="font-size:20px;text-align: justify;" class="text-dark">Bizaid connects clients with vetted subject matter experts, advisors, and consultants from our professional network in order to overcome their business challenges and make better business decisions.</p>
                  </div>

                  <div class="col-lg-4">
                    
                    <div class="text-center">
                      <a href="request_consult.php" class="more-btn">Find a consultant <i class="bx bx-chevron-right"></i></a>
                    </div>
                    <br/>
                    <p class="text-dark">Lets us know your requirement. We will connect you with best resources in the field with relevant expertise</p>
                    
                    <div class="text-center">
                      <a href="register_consult.php" class="more-btn">Become a Consultant <i class="bx bx-chevron-right"></i></a>
                    </div>
                    <br/>
                    <p class="text-dark">Join with our professional network as a consultant and share your expertise with our clients</p>
                    

                  </div>  

                  </div>

            </div>
          </div>
          
        </div>

        <div class="row">
          
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0"> 
                  <img src="/theme/img/Front_Talent_Management.jpg" class="img-fluid" />
                    <h4 class="mt-3">Talent Management</h4>
                    <p>Bizaid assists you in finding the proper talent for your organization and helps in the development of your employees' talent.</p>
                    <div class="text-center">
                    <a href="ted.php" class="btn btn-outline-primary btn-sm">Read More >></a>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                  <img src="/theme/img/Front_Process_Improvement.jpg" class="img-fluid" />
                    <h4 class="mt-3">Process Improvement</h4>
                    <p>Bizaid with its experts support to optimize processes and resources of your organization through proven and tested process improvement techniques to continuously improve your business.</p>
                    <div class="text-center">
                      <a href="process.php" class="btn btn-outline-primary btn-sm">Read More >></a>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                  <img src="/theme/img/Front_Startup_Support.jpg" class="img-fluid" />
                    <h4 class="mt-3">Startup Support</h4>
                    <p>It's always a challenge to start and grow a business. Bizaid provides information and support for you to progress on this challenging journey.</p>
                    <div class="text-center">
                      <a href="business.php" class="btn btn-outline-primary btn-sm">Read More >></a>
                    </div>
                  </div>
                </div>
 
                <div style="margin-top:20px;" class="col-xl-6 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bi bi-calendar-week"></i>
                    <h4>EVENTS</h4>

                      <div class="row">
                        <div style="width:99%">

                            <?php while($row_events = $result_events->fetch_assoc()) { ?>

                              <div class="card mySlides1" style="width: 100%; border:0px;">
                              <a href="eventsdetail.php?eid=<?php echo $row_events["eventid"]; ?>"><img src="./upload/event/small/<?php echo $row_events["event_img_sm"]; ?>" class="card-img-top" alt="<?php echo $row_events["event_title"]; ?>"></a>
                                <div class="card-body">
                                  <a href="eventsdetail.php?eid=<?php echo $row_events["eventid"]; ?>" class="card-text text-link"><?php echo $row_events["event_title"]; ?></a>
                                </div>
                              </div>

                            <?php } ?>

                        </div>
                      </div>

                    <br/>

                    <div class="text-center">
                      <a href="events.php" class="btn btn-outline-primary btn-sm">View All >></a>
                    </div>
                  </div>
                </div>

                <div style="margin-top:20px;" class="col-xl-6 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bi bi-newspaper"></i>
                    <h4>NEWS FEEDS</h4>
                    
                    <div class="row">
                        <div style="width:99%">

                        <?php while($row_news = $result_news->fetch_assoc()) { ?>

                            <div class="card mySlides2" style="width: 100%; border:0px;">
                            <a href="newsdetail.php?nid=<?php echo $row_news["newsid"]; ?>"><img src="./upload/news/small/<?php echo $row_news["news_img_sm"]; ?>" class="card-img-top" alt="<?php echo $row_news["news_title"]; ?>"></a>
                              <div class="card-body">
                                <a href="newsdetail.php?nid=<?php echo $row_news["newsid"]; ?>" class="card-text text-link"><?php echo $row_news["news_title"]; ?></a>
                              </div>
                            </div>

                        <?php } ?>

                        </div>
                      </div>
                      
                    <br/>

                    <div class="text-center">
                      <a href="news.php" class="btn btn-outline-primary btn-sm">View All >></a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    
  </main><!-- End #main -->

  <?php include 'sitefooter.php'; ?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="theme/vendor/purecounter/purecounter.js"></script>
  <script src="theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="theme/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="theme/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="theme/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="theme/js/main.js"></script>

  <script>
    var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides1");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2500); // Change image every 2 seconds
} 
  </script>

<script>
    var slideIndextwo = 0;
showSlidestwo();

function showSlidestwo() {
  var i;
  var slides = document.getElementsByClassName("mySlides2");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndextwo++;
  if (slideIndextwo > slides.length) {slideIndextwo = 1}
  slides[slideIndextwo-1].style.display = "block";
  setTimeout(showSlidestwo, 3000); // Change image every 2 seconds
} 
  </script>

</body>

</html>