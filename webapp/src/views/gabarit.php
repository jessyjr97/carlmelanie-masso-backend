<html>
    <head>
      <title>Carl & Mélanie Massothérapie - <?php echo $title; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <link href="//fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   </head>

<body>
<!--header-->
<div class="header-outs inner_page-banner" id="home">
  <div class="headder-top">
    <!-- nav -->
    <nav >
      <div id="logo">
        <h1><a href="index.php?action=home">Accueil</a></h1>
      </div>
      <label for="drop" class="toggle">Menu</label>
      <input type="checkbox" id="drop">
      <ul class="menu mt-2">
        <li class="active"><a href="index.php?action=home">Accueil</a></li>
        <li class="mx-lg-3 mx-md-2 my-md-0 my-1"><a href="index.php?action=about">À propos</a></li>
        <li>
          <!-- First Tier Drop Down -->
          <label for="drop-2" class="toggle toogle-2">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span>
          </label>
          <a href="#">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span></a>
          <input type="checkbox" id="drop-2">
          <ul>
            <li><a href="index.php?action=gallery" class="drop-text">Gallery</a></li>
            <li><a href="index.php?action=blog" class="drop-text">Blog</a></li>
          </ul>
        </li>
        <?php
        if (!isset($_SESSION['username'])) {
            ?>
          <li><a href="index.php?action=login">Espace Client</a></li>
          <?php
        } else {
            ?>
        <li>
          <label for="drop-3" class="toggle toogle-2"> <?php echo $_SESSION['username']; ?> <span class="fa fa-angle-down" aria-hidden="true"></span>
        </label>
        <a href="#">Mon compte <span class="fa fa-angle-down" aria-hidden="true"></span></a>
        <input type="checkbox" id="drop-3">
        <ul>
          <li><a href="index.php?action=logout" class="drop-text"> Modifier le Compte</a></li>
          <li><a href="index.php?action=logout" class="drop-text"> Se déconnecter </a></li>
        </ul>
        </li>
          <?php
        }
        ?>
      </ul>
    </nav>
    <!-- //nav -->
    <?php
      if ($onHomePage) {
          ?>
    <div class="main-banner text-center">
      <div class="container">
       <div class="style-banner ">
         <h4 class="mb-lg-3 mb-2">Practice Makes You Better</h4>
         <h5>Its Time To Master Your Skills
         </h5>
        </div>
      <div class="two-demo-button mt-lg-5 mt-md-4 mt-3">
         <p> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</p>
      </div>
      <div class="view-buttn mt-md-4 mt-sm-4 mt-3">
         <a href="about.html" class="btn">About Us</a>
      </div>
     </div>
    </div>
    <?php
      }
        ?>
  </div>
<!-- //banner -->
  </div>
<!--//header-->


    <div class="">
		<?php echo $contenu ?>
	</div>
</div>

<!--Footer -->
<footer class="py-lg-4 py-md-3 py-sm-3 py-3" >
  <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
    <div class="row">
      <div class="col-lg-6 col-md-6 footer-left-grid">
        <div class="footer-w3layouts-head">
          <h2><a href="index.html">Carl & Mélanie Massothérapie</a></h2>
        </div>
        <div class="mb-1 pt-lg-5 pt-md-4 pt-3 footer-address">
          <ul>
            <li>
              <h4>Contactez-nous</h4>
            </li>
            <li>
              <p>225, rue Principale, Saint-Victor-de-Beauce, </p>
              <p>(QC) G0M 2B0</p>
            </li>
          </ul>
        </div>
        <div class="mb-1 footer-address">
          <ul>
            <li>
              <h4>Courriel</h4>
            </li>
            <li>
              <p><a href="mailto:info@example.com">info@example1.com</a>
              </p>
            </li>
          </ul>
        </div>
        <div class="mb-1 footer-address">
          <ul>
            <li>
              <h4>Téléphone</h4>
            </li>
            <li>
              <p>(418) 774-0246</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer-info-bottom col-lg-6 col-md-6">
        <div class="icons mt-3 ">
          <ul>
            <li><a href="www.fb.com/898434873569060/"><span class="fa fa-facebook"></span></a></li>
            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
            <li><a href="#"><span class="fa fa-rss"></span></a></li>
            <li><a href="#"><span class="fa fa-vk"></span></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="bottem-wthree-footer text-center pt-lg-5 pt-md-4 pt-3">
      <p>
        © 2019 Carl & Mélanie Massothérapie. Tous Droits Réservés. | Construit par EXE Informatique | Style de <a href="http://www.W3Layouts.com" target="_blank">W3Layouts</a>
      </p>
    </div>
    <!-- move icon -->
    <div class="text-center">
      <a href="#home" class="move-top text-center mt-3"></a>
    </div>
    <!--//move icon -->
  </div>
</footer>
<!-- //Footer -->


<div id="modal01" class="modal" onclick="this.style.display='none'">
  <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <div class="modal-content">
    <img id="img02" style="max-width:100%">
  </div>
</div>
</body>
</html>
