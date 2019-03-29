<?php
$titre = localize('Personnal-Title');
 ob_start(); 
    $cpt=0;
    $address='';
    $city='';
    $zipcode='';
    $idProvince='';
    $occupation='';
    $phone1 = array('','','0');
    $phone2 = array('','','0');
    $phone3 = array('','','0');
    
if(isset($_SESSION['userid'])){
    while($donnees = $personnalInformation->fetch()){
        switch ($cpt){
            case 0:
                $address = $donnees['address'];
                $city = $donnees['city_name'];
                $zipcode = $donnees['zip_code'];
                $idProvince = $donnees['id_state'];
                $occupation = $donnees['occupation'];
                $phone1[0] = $donnees['phone_number'];
                $phone1[1] = $donnees['extension'];
                $phone1[2] = $donnees['id_phone_type'];
                break;
            case 1:
                $phone2[0] = $donnees['phone_number'];
                $phone2[1] = $donnees['extension'];
                $phone2[2] = $donnees['id_phone_type'];
                break;
            case 2:
                $phone3[0] = $donnees['phone_number'];
                $phone3[1] = $donnees['extension'];
                $phone3[2] = $donnees['id_phone_type'];
                break;
        }
        $cpt+=1;
    }
}
 ?>

<section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
  <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
    <h3 class="title text-center mb-md-4 mb-sm-3 mb-3 mb-2"><?php echo localize('Personnal-Title');?></h3>
    <div class="row w3pvt-info-para pt-lg-5 pt-md-4 pt-3">
      <div class="col-lg-10 col-md-10">
        <form action="index.php?action=personnalinformation" id="personnalinformation" method="post">
          <div class="w3pvt-wls-contact-mid">
          <div class="form-group contact-forms">
              <label for="address"><h4><?php echo localize('Personnal-Address');?></h4></label>
              <input type="text" name="address" id="address" class="form-control" value="<?php echo $address; ?>" placeholder="<?php echo localize('Personnal-Address');?>">
            </div>
            <div class="form-row">
                <div class="form-group contact-forms col-md-4">
                    <label for="city"><h4><?php echo localize('Personnal-City');?></h4></label>
                    <input type="text" name="city" id="city" value="<?php echo $city ?>" class="form-control" placeholder="<?php echo localize('Personnal-City');?>">
                </div>
                <div class="form-group contact-forms col-md-4">
                    <label for="province"><h4><?php echo localize('Personnal-Province');?></h4></label>
                    <select name="province" id="province">
                    <option value=""></option>
                    <?php 
                        while($donnees = $result->fetch()){
                            if($donnees['id_state'] == $idProvince){
                            echo '<option selected value="' . $donnees['id_state'].'">'.$donnees['Name'].'</option>';
                            }else{
                                echo '<option value="' . $donnees['id_state'].'">'.$donnees['Name'].'</option>';
                            }
                        }
                        $result->closeCursor();
                    ?>
                    </select>
                </div>
                <div class="form-group contact-forms col-md-4">
                    <label for="zipcode"><h4><?php echo localize('Personnal-Zip');?></h4></label>
                    <input type="text" value="<?php echo $zipcode ?>" name="zipcode" id="zipcode" class="form-control" placeholder="<?php echo localize('Personnal-Zip');?>">
                </div>
            </div>
         <div class="form-row">   
                
                <div class="form-group contact-forms col-md-8">
                    <label for="occupation"><h4><?php echo localize('Personnal-Occupation');?></h4></label>
                    <input type="text" value="<?php echo $occupation; ?>" name="occupation" id="occupation" class="form-control" placeholder="<?php echo localize('Personnal-Occupation');?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group contact-forms col-md-4">
                    <label for="phone"><h4><?php echo localize('Personnal-Phone');?></h4></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group contact-forms col-md-4">
                    <input type="text" value="<?php echo $phone1[0];?>" name="phone1" id="phone1" class="form-control" placeholder="<?php echo localize('Personnal-Phone');?>">
                </div>
                <div class="form-group contact-forms col-md-2">
                    <input type="text" value="<?php echo $phone1[1];?>" name="extension1" id="extension1" class="form-control" placeholder="<?php echo localize('Personnal-Ext');?>:">
                </div>
                <div class="form-group contact-forms col-md-4">
                    <select name="type1" id="type1">
                    <option value=""></option>
                    <?php while($donnees = $phoneType->fetch()){
                        if($donnees['id_phone_type'] == $phone1[2]){
                            echo '<option selected value="'.$donnees['id_phone_type'].'">'.$donnees['name'].'</option>';
                        }else{
                            echo '<option value="'.$donnees['id_phone_type'].'">'.$donnees['name'].'</option>';
                        }
                    }
                    $phoneType->closeCursor();
                    ?>
                    </select>
                </div>
                <div class="form-group contact-forms col-md-1">
                <img src="images/plus.gif" id="addphone2" <?php
                if($cpt > 1){echo 'style="visibility:hidden;"';} ?> class="plus-minus" onclick="AddPhone2()">
                </div>
            </div>
            <div class="form-row" id="phonerow2" <?php if($cpt<2){echo 'style="visibility:hidden;"';}?>>
                <div class="form-group contact-forms col-md-4">
                    <input type="text" id="phone2" name="phone2" value="<?php echo $phone2[0];?>" class="form-control" placeholder="Téléphone">
                </div>
                <div class="form-group contact-forms col-md-2">
                    <input type="text" name="extension2" id="extension2" value="<?php echo $phone2[1];?>" class="form-control" placeholder="Ext:">
                </div>
                <div class="form-group contact-forms col-md-4">
                    <select name="type2" id="type2">
                    <option value=""></option>
                    <?php while($donnees = $phoneType2->fetch()){
                        if($donnees['id_phone_type'] == $phone2[2]){
                            echo '<option selected value="'.$donnees['id_phone_type'].'">'.$donnees['name'].'</option>';
                        }else{
                            echo '<option value="'.$donnees['id_phone_type'].'">'.$donnees['name'].'</option>';
                        }
                    }
                    $phoneType2->closeCursor();
                    ?>
                    </select>
                </div>
                <div class="form-group contact-forms col-md-1">
                    <img src="images/plus.gif" id="addphone3"<?php
                if($cpt > 2){echo 'style="visibility:hidden;"';} ?> class="plus-minus" onclick="AddPhone3()">
                </div>
                <div class="form-group contact-forms col-md-1"<?php
                if($cpt > 2){echo 'style="visibility:hidden;"';} ?>>
                    <img src="images/minus.gif" id="removephone2" class="plus-minus" onclick="RemovePhone2()">
                </div>
            </div>
            <div class="form-row" id="phonerow3" <?php if($cpt<3){echo 'style="visibility:hidden;"';}?>>
                <div class="form-group contact-forms col-md-4">
                    <input type="text" value="<?php echo $phone3[0] ?>" id="phone3" name="phone3" class="form-control" placeholder="Téléphone">
                </div>
                <div class="form-group contact-forms col-md-2">
                    <input type="text" value="<?php echo $phone3[1] ?>" name="extension3" id="extension3" class="form-control" placeholder="Ext:">
                </div>
                <div class="form-group contact-forms col-md-4">
                    <select name="type3" id="type3">
                    <option value=""></option>
                    <?php while($donnees = $phoneType3->fetch()){
                        if($donnees['id_phone_type'] == $phone3[2]){
                            echo '<option selected value="'.$donnees['id_phone_type'].'">'.$donnees['name'].'</option>';
                        }else{
                            echo '<option value="'.$donnees['id_phone_type'].'">'.$donnees['name'].'</option>';
                        }
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
            <?php if(!isset($_SESSION['userid'])){ ?>
                <button type="submit" class="btn sent-butnn"><?php echo localize('Inscription-Finish');?></button> <?php
            }else{ ?>
                <button type="submit" class="btn sent-butnn"><?php echo localize('Personnal-Update');?></button> <?php
            }
                ?>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script>
$(document).ready(function(){
    $('#phone1').mask('(000)000-0000');
    $('#phone2').mask('(000)000-0000');
    $('#phone3').mask('(000)000-0000');
    $("#personnalinformation").validate({
        rules:{
            address: {
                required:true
            },
            city:{
                required:true
            },
            zipcode:{
                required:true
            },
            occupation:{
                required:true
            },
            phone1:{
                required:true
            },
            type1:{
                required:true
            },
            extension1:{
                number:true
            },
            extension2:{
                number:true
            },
            extension3:{
                number:true
            }
        },
        messages:{
            address:{
                required:'<?php echo localize('Validate-Error-RequiredField'); ?>.'
            },
            city:{
                required :'<?php echo localize('Validate-Error-RequiredField'); ?>.'
            },
            zipcode:{
                required :'<?php echo localize('Validate-Error-RequiredField'); ?>.'
            },
            occupation:{
                required :'<?php echo localize('Validate-Error-RequiredField'); ?>.'
            },
            phone1:{
                required :'<?php echo localize('Validate-Error-RequiredField'); ?>.'
            },
            type1:{
                required:'<?php echo localize('Validate-Error-RequiredField'); ?>.'
            },
            extension1:{
                number:'<?php echo localize('Validate-Error-Number'); ?>.'
            },
            extension2:{
                number:'<?php echo localize('Validate-Error-Number'); ?>.'
            },
            extension3:{
                number:'<?php echo localize('Validate-Error-Number'); ?>.'
            }
        },
        submitHandler:function(){
          if(confirm('<?php echo localize("PasswordUpdate-UpdateConfirmation"); ?>'))
          {
            form.submit();
          }
        }
    })
});

</script>

<?php $contenu = ob_get_clean(); 
$onHomePage = false;
require 'gabarit.php'; ?>