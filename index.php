<?php
session_start();
require 'login.php';
require 'rate.php';
require 'MakeEmail.php';
require 'logout.php';
require 'SignUp.php';
require 'InsertNews.php';
require 'forbiddenwords.php';
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>NewsWeb</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
  </head>

<body>


  <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#"><em>News</em>Web</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a href="#section1">Home</a></li>
        <li class="has-submenu"><a href="section1">Search</a>
          <ul class="sub-menu" style="width:400px;">
            <form method="get" action="index.php">
            <li ><center><input type="text" class="form-control" style="width:380px;" placeholder="SEARCH" name="search"></center></li>
            <li ><center><button type="submit" class="button">SEARCH</button></center></li>
          </form>
          </ul>
        </li>
        <?php
				  require 'checkUser.php';
        ?>
      </ul>
    </nav>
  </header>

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="assets/images/Planet.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
        <div style="color:white;margin-left:60px;size:20px">
        <p style="margin-left:20px;"><br><br><br><br>
          <?php
          require 'search.php';
          ?></p>
       </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->


  <section class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-12">
          <div class="features-post">
            <div class="features-content">
              <div class="content-show">
                <h4>News</h4>
              </div>
              <div class="content-hide">
                <ul>
  							<li><a href="index.php?cat=top" >Top News</a></li>
  							<li><a href="index.php?cat=recents" >Recents</a></li>
  							<li><a href="index.php?cat=media" >Media</a></li>
  							<li><a href="index.php?cat=users" >Users</a></li>
  							</ul>
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-15">
          <div class="features-post third-features">
            <div class="features-content">
              <div class="content-show">
                <h4>Category</h4>
              </div>
              <div class="content-hide">
                <ul>
  							<li><a href="index.php?cat=Health" >Health</a></li>
  							<li><a href="index.php?cat=Politics" >Politics</a></li>
  							<li><a href="index.php?cat=Sports" >Sports</a></li>
  							<li><a href="index.php?cat=Technology" >Technology</a></li>
  							</ul>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
  require 'checkloggedin.php';
  ?>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/myscript.js"></script>
</body>
</html>
