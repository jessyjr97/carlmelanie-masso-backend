<html>
    <head>
      <title><?php echo localize('CompanyName') . " - " . localize('HomepageName'); ?></title>
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <link href="//fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   </head>

<body>
  <div class="main-top" id="home">
  <div class="headder-top">
   <div style="display: inline" id="logo">
     <img src="images/completeLogo.svg" alt="Carl et Mélanie Massothérapie" />
   </div>
     <!-- nav -->
    <nav style="display: inline">
       <label for="drop" class="toggle"><?php echo localize('Menu'); ?></label>
       <input type="checkbox" id="drop">
       <ul class="menu mt-2">
         <li class="active"><a href="index.php?action=home"><?php echo localize('HomepageName'); ?></a></li>
         <li class="mx-lg-3 mx-md-2 my-md-0 my-1"><a href="index.php?action=about"><?php echo localize('About'); ?></a></li>
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
           <li><a href="index.php?action=login"><?php echo localize('CustomerSpace'); ?></a></li>
           <?php
         } else {
             ?>
         <li>
           <label for="drop-3" class="toggle toogle-2"><?php echo $_SESSION['username']; ?> <span class="fa fa-angle-down" aria-hidden="true"></span>
         </label>
         <a href="#"><?php echo localize('MyAccount'); ?><span class="fa fa-angle-down" aria-hidden="true"></span></a>
         <input type="checkbox" id="drop-3">
         <ul>
           <li><a href="index.php?action=logout" class="drop-text"><?php echo localize('MyAccount'); ?></a></li>
           <li><a href="index.php?action=logout" class="drop-text"><?php echo localize('Logout'); ?></a></li>
         </ul>
         </li>
           <?php
         }
         ?>
         <li class="mx-lg-3 mx-md-2 my-md-0 my-1"><a href="?setLocale=en">En</a></li>
       </ul>
     </nav>
     <!-- //nav -->
     <div class="main-banner text-center">
       <div class="container">
        <div class="style-banner ">
          <h4 class="mb-lg-3 mb-2"><?php echo localize('HomepageMessage'); ?></h4>
          <h5><?php echo localize('HomepageMessageBold'); ?></h5>
         </div>
       <div class="two-demo-button mt-lg-5 mt-md-4 mt-3">
          <p><?php echo localize('HomepageMessageDetails'); ?></p>
       </div>
       <div class="view-buttn mt-md-4 mt-sm-4 mt-3">
          <a href="?action=inscription" class="btn"><?php echo localize('HomepageButton'); ?></a>
       </div>
      </div>
     </div>
   </div>
 <!-- //banner -->
</div>
 <!--//header-->
</div>
<div id="modal01" class="modal" onclick="this.style.display='none'">
  <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <div class="modal-content">
    <img id="img02" style="max-width:100%">
  </div>
</div>
</body>
</html>
