<?php
$titre = 'Inscription';
 ob_start(); ?>

<section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
  <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
    <h3 class="title text-center mb-md-4 mb-sm-3 mb-3 mb-2">Inscription</h3>
    <div id="empty" style="color:#F00"></div>
    <div class="row w3pvt-info-para pt-lg-5 pt-md-4 pt-3">
      <div class="col-lg-6 col-md-6">
        <form action="index.php?action=inscription" id="forminscription1" method="post">
          <div class="w3pvt-wls-contact-mid">
            <div class="radio">
              <div class="form-check form-check-inline">
                <label class="form-check-inline">
                <input type="radio" class="form-check-input" name="gender" value="F">
                <h4>Madamme</h4></label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-inline">
                <input type="radio" class="form-check-input" name="gender" value="M">
                <h4>Monsieur</h4></label>
              </div>
            </div>
            <div class="form-group contact-forms">
              <label for="firstname"><h4>Prénom</h4></label>
              <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Prénom">
            </div>
            <div class="form-group contact-forms">
              <label for="lastname"><h4>Nom</h4></label>
              <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Nom">
            </div>
            <div class="form-group contact-forms">
              <label for="email"><h4>Adresse courriel</h4></label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Adresse courriel">
              <div id="emailinuse" style="color:#F00"></div>
            </div>
            <div class="form-group contact-forms">
                <label for="email2"><h4>Confirmation de l'adresse courriel</h4></label>
              <input type="email" id="email2" name="email2" class="form-control" placeholder="Adresse courriel">
            </div>
            <div id="emailerror" style="color:#F00"></div>
            <div class="form-group contact-forms">
              <label for="password"><h4>Mot de passe</h4></label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" >
            </div>
            <div class="form-group contact-forms">
              <label for="password2"><h4>Confirmation du mot de passe</h4></label>
              <input type="password" name="password2" id="password2" class="form-control" placeholder="Mot de passe" >
            </div>
            <div id="passworderror" style="color:#F00"></div>
            <div>
                <button type="submit" class="btn sent-butnn">Étape suivante</button>
            </div>
          </div>
        </form>
      </div>
      <div class=" col-lg-6 col-md-6 ">
        <div >
          <h4>Vous êtes déjà client?</h4>
        </div>
        <div class=" mt-3">
        <a href="index.php?action=login"><h4>Connectez vous!</h4></a>
        </div>
      </div>
    </div>
  </div>
</section>


<?php $contenu = ob_get_clean(); 
$onHomePage = false;
require 'gabarit.php'; ?>