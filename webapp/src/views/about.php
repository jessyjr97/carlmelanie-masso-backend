<?php
$titre = 'Connection';
 ob_start(); ?>
    <section class="about-inner py-lg-4 py-md-3 py-sm-3 py-3">
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <?php
        if(isset($_SESSION['username'])){
          ?> <h4 class="text-center mb-md-4 mb-sm-3 mb-3 mb-2"> <?php
          echo 'Bienvenue, ' . $_SESSION['username'] ;
          ?> </h4> <?php
        }
        ?>
        <h3 class="title text-center mb-md-4 mb-sm-3 mb-3 mb-2">About Us</h3>
        <div class="title-wls-text text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et Lorem ipsum </p>
        </div>
        <div class="row">
          <div class="col-lg-4 w3layouts-right-side-img">
            <div class="abut-inner-wls-head">
              <h4 class="pb-3">What Are We</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta</p>
              <p class="pt-2">sodales scelerisque commodo. Nam porta Vestibulum nibh urna, euismod ut ornare non</p>
            </div>
          </div>
          <div class="col-lg-4 w3layouts-left-side-img">
            <img src="images/blog2.jpg" class="img-thumbnail" alt="">
          </div>
          <div class="col-lg-4 w3layouts-right-side-img">
            <div class="abut-inner-wls-head">
              <h4 class="pb-3">What We do</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta</p>
              <p class="pt-2">Vestibulum nibh urna, euismod ut ornare non, porta Vestibulum nibh urna</p>
              <div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--//about-->
    <!--States-->
    <section class="stats-count">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 stats">
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 counter-number">
            <div class="row text-center">
              <div class="col-lg-6 col-md-6 col-sm-6 number-w3three-info ">
                <h5>7 </h5>
                <h6 class="pt-2">Branches</h6>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 number-w3three-info">
                <h5>250 +</h5>
                <h6 class="pt-2">Employees</h6>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 pt-lg-5 pt-md-4 pt-3 number-w3three-info">
                <h5>150</h5>
                <h6 class="pt-2">Projects</h6>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 pt-lg-5 pt-md-4 pt-3 number-w3three-info">
                <h5>125</h5>
                <h6 class="pt-2">Tea</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--//States-->
    <!-- team -->
    <section class="team py-lg-4 py-md-3 py-sm-3 py-3" id="team">
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title text-center mb-md-4 mb-sm-3 mb-3 mb-2">Our Team</h3>
        <div class="title-wls-text text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et Lorem ipsum </p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 team-row-grid">
            <div class="team-grid">
              <div class="team-image mb-3">
                <img src="images/t1.jpg" alt="" class="img-fluid">
                <div class="social-icons">
                  <a href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                  <a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                  <a href="#"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                  <a href="#"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                </div>
              </div>
              <h4>William Jon</h4>
              <p class="mt-2">Director ,CEO</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 team-row-grid">
            <div class="team-grid">
              <div class="team-image mb-3">
                <img src="images/t2.jpg" alt="" class="img-fluid">
                <div class="social-icons">
                  <a href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                  <a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                  <a href="#"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                  <a href="#"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                </div>
              </div>
              <h4>Sam Jacob</h4>
              <p class="mt-2">Director</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 team-row-grid">
            <div class="team-grid">
              <div class="team-image mb-3">
                <img src="images/t3.jpg" alt="" class="img-fluid">
                <div class="social-icons">
                  <a href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                  <a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                  <a href="#"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                  <a href="#"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                </div>
              </div>
              <h4>Liam Max</h4>
              <p class="mt-2">Manager</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 team-row-grid">
            <div class="team-grid ">
              <div class="team-image mb-3">
                <img src="images/t4.jpg" alt="" class="img-fluid">
                <div class="social-icons">
                  <a href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                  <a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                  <a href="#"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                  <a href="#"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                </div>
              </div>
              <h4>William jon</h4>
              <p class="mt-2">Manager</p>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php $contenu = ob_get_clean(); 
$onHomePage = false;
require 'gabarit.php'; ?>
