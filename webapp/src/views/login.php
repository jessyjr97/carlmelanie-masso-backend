<?php
$titre = 'Connection';
 ob_start(); ?>
 <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
  <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
    <h3 class="title text-center mb-md-4 mb-sm-3 mb-3 mb-2">Connexion</h3>
    <?php
        if (isset($_POST['email'])){
            ?>
            <p class="text-center mb-md-4 mb-sm-3 mb-3 mb-2">Adresse courriel ou mot de passe incorrect.</p>
            <?php
        }
    ?>
    <div class="row w3pvt-info-para pt-lg-5 pt-md-4 pt-3">
      <div class="col-lg-6 col-md-6">
        <form action="index.php?action=login" method="post">
          <div class="w3pvt-wls-contact-mid">
            <div class="form-group contact-forms">
                <label for="email"><h4>Adresse Courriel</h4></label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Adresse courriel" value="<?php if (isset($_POST['email'])){
                echo $_POST['email'];
            } ?>">
            </div>
            <div class="form-group contact-forms">
              <label for="password"><h4>Mot de passe</h4></label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required="">
            </div>
            <button type="submit" class="btn sent-butnn">Connection</button>
          </div>
        </form>
      </div>
      <div class="col-lg-6 col-md-6 ">
        <div >
          <h4>Vous n'êtes pas client?</h4>
        </div>
        <div class=" mt-3">
        <a href="index.php?action=inscription"><h4>Inscrivez vous!</h4></a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $contenu = ob_get_clean(); 
$onHomePage = false;
require 'gabarit.php'; ?>