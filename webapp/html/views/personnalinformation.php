<?php
$titre = 'Inscription';
 ob_start(); ?>

<section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
  <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
    <h3 class="title text-center mb-md-4 mb-sm-3 mb-3 mb-2">Informations personnelles</h3>
    <div class="row w3pvt-info-para pt-lg-5 pt-md-4 pt-3">
      <div class="col-lg-10 col-md-10">
        <form action="index.php?action=personnalinformation" id="personnalinformation" method="post">
          <div class="w3pvt-wls-contact-mid">
          <div class="form-group contact-forms">
              <label for="address"><h4>Addresse</h4></label>
              <input type="text" name="address" id="address" class="form-control" placeholder="Addresse" required="">
            </div>
            <div class="form-row">
                <div class="form-group contact-forms col-md-4">
                    <label for="city"><h4>Ville</h4></label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="Ville">
                </div>
                <div class="form-group contact-forms col-md-4">
                    <label for="province"><h4>Province</h4></label>
                    <select name="province" id="province">
                    <option value=""></option>
                    <?php 
                        while($donnees = $result->fetch()){
                            echo '<option value="' . $donnees['id_state'].'">'.$donnees['Name'].'</option>';
                        }
                        $result->closeCursor();
                    ?>
                    </select>
                </div>
                <div class="form-group contact-forms col-md-4">
                    <label for="zipcode"><h4>Code postal</h4></label>
                    <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Code postal">
                </div>
            </div>
            
         <div class="form-row">   
                <div class="form-group contact-forms date col-md-4">
                    <label for="dateofbirth"><h4>Date de naissance</h4></label>
                    <input type="date" name="dateofbirth" id="dateofbirth" class="datepicker">
                </div>
                <div class="form-group contact-forms col-md-8">
                    <label for="occupation"><h4>Occupation</h4></label>
                    <input type="text" name="occupation" id="occupation" class="form-control" placeholder="Occupation">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group contact-forms col-md-4">
                    <label for="phone"><h4>Téléphone</h4></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group contact-forms col-md-4">
                    <input type="text" name="phone1" id="phone1" class="form-control" placeholder="Téléphone">
                </div>
                <div class="form-group contact-forms col-md-2">
                    <input type="text" name="extension1" id="extension1" class="form-control" placeholder="Ext:">
                </div>
                <div class="form-group contact-forms col-md-4">
                    <select name="type1">
                    <?php while($donnees = $phoneType->fetch()){
                        echo '<option value="'.$donnees['id_phone_type'].'">'.$donnees['name'].'</option>';
                    }
                    $phoneType->closeCursor();
                    ?>
                    </select>
                </div>
                <div class="form-group contact-forms col-md-1">
                <img src="images/plus.gif" id="addphone2" class="plus-minus" onclick="AddPhone2()">
                </div>
            </div>
            <div class="form-row" id="phonerow2">
                <div class="form-group contact-forms col-md-4">
                    <input type="text" id="phone2" name="phone2" class="form-control" placeholder="Téléphone">
                </div>
                <div class="form-group contact-forms col-md-2">
                    <input type="text" name="extension2" id="extension2" class="form-control" placeholder="Ext:">
                </div>
                <div class="form-group contact-forms col-md-4">
                    <select name="type2">
                    <?php while($donnees = $phoneType2->fetch()){
                        echo '<option value="'.$donnees['id_phone_type'].'">'.$donnees['name'].'</option>';
                    }
                    $phoneType2->closeCursor();
                    ?>
                    </select>
                </div>
                <div class="form-group contact-forms col-md-1">
                    <img src="images/plus.gif" id="addphone3" class="plus-minus" onclick="AddPhone3()">
                </div>
                <div class="form-group contact-forms col-md-1">
                    <img src="images/minus.gif" id="removephone2" class="plus-minus" onclick="RemovePhone2()">
                </div>
            </div>
            <div class="form-row" id="phonerow3">
                <div class="form-group contact-forms col-md-4">
                    <input type="text" id="phone3" name="phone3" class="form-control" placeholder="Téléphone">
                </div>
                <div class="form-group contact-forms col-md-2">
                    <input type="text" name="extension3" id="extension3" class="form-control" placeholder="Ext:">
                </div>
                <div class="form-group contact-forms col-md-4">
                    <select name="type3">
                    <?php while($donnees = $phoneType3->fetch()){
                        echo '<option value="'.$donnees['id_phone_type'].'">'.$donnees['name'].'</option>';
                    }
                    $phoneType3->closeCursor();
                    ?>
                    </select>
                </div>
                <div class="form-group contact-forms col-md-1">
                    <img src="images/minus.gif" id="removephone3" class="plus-minus" onclick="RemovePhone3()">
                </div>
            </div>
            <div>
                <button type="submit" class="btn sent-butnn">Terminé l'inscription</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


<?php $contenu = ob_get_clean(); 
$onHomePage = false;
require 'gabarit.php'; ?>