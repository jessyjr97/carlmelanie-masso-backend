<?php
session_start();
require('models/ManagerUsers.php');
require('models/Customer.php');
require('services/callApiExtension.php');

$default_locale = 'fr';

if (!isset($_SESSION['locale'])) {
    $_SESSION['locale'] = $default_locale;
}

if (isset($_GET['setLocale'])) {
    $_SESSION['locale'] = $_GET['setLocale'];
}

function localize($phrase)
{
    global $default_locale;
    static $translations = null;
    if (is_null($translations)) {
        $translations = getLocaleFile($_SESSION['locale']);
    }
    if ($translations[$phrase]) {
        return $translations[$phrase];
    } else {
        static $default_translations = null;
        if (is_null($default_translations)) {
            $default_translations = getLocaleFile($default_locale);
        }
        if ($default_translations[$phrase]) {
            return $default_translations[$phrase];
        } else {
            //Raise Error word not defined
            return $phrase;
        }
    }
}

function getLocaleFile($locale)
{
    global $default_locale;
    $lang_file = 'lang/' . $locale . '.json';
    if (!file_exists($lang_file)) {
        //Raise error locale not found
        $lang_file = 'lang/' . $default_locale . '.json';
    }
    $lang_file_content = file_get_contents($lang_file);
    return json_decode($lang_file_content, true);
}


function Login(){
    if(!empty($_POST)){
        unset($_SESSION['email']);
        $userInscript = new ManagerUsers;
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        $user = $userInscript->VerifierLogin($email, $password);
        if($donnees = $user->fetch())
        {
            $_SESSION['username'] = $donnees['first_name'] . ' ' . $donnees['last_name'];
            $_SESSION['userid'] = $donnees['id_user'];
            $user->closeCursor();
            require('views/about.php');
        }
        else
        {
            $user->closeCursor();
            $contenu = ob_get_clean();
            require('Views/login.php');
        }
    }
    else
    {
        require('Views/login.php');
    }
}

function Home(){
    unset($_SESSION['email']);
    require('views/home.php');
}

function Inscription(){
    if(isset($_SESSION['email'])){
        $provinces = new ManagerUsers;
        $result = $provinces->GetProvinces();
        $phoneType = $provinces->GetPhoneType();
        $phoneType2 = $provinces->GetPhoneType();
        $phoneType3 = $provinces->GetPhoneType();
        require('views/personnalinformation.php');
    }
    else{
        require('views/inscription.php');
    }
}

function Schedule(){

}

function About(){
    unset($_SESSION['email']);
    require('views/about.php');
}

function PersonnalInformation(){
    if(isset($_POST)){
        $extension1 = '';
        $phone2 = '';
        $extension2 = '';
        $type2 = 0;
        $phone3 = '';
        $extension3 = '';
        $type3 = 0;
        if(!empty($_POST['extension1'])){
            $extension1 = htmlentities($_POST['extension1']);
        }
        if(!empty($_POST['phone2'])){
            $phone2 = htmlentities($_POST['phone2']);
            $type2 = htmlentities($_POST['type2']);
        }
        if(!empty($_POST['extension2'])){
            $extension2 = htmlentities($_POST['extension2']);
        }
        if(!empty($_POST['phone3'])){
            $phone3 = htmlentities($_POST['phone3']);
            $type3 = htmlentities($_POST['type3']);
        }
        if(!empty($_POST['extension3'])){
            $extension3 = htmlentities($_POST['extension3']);
        }
        if($_POST['address'] != '' and $_POST['city'] != '' 
        and $_POST['province'] != '' and $_POST['zipcode'] != ''
        and $_POST['dateofbirth'] != '' and $_POST['occupation'] != ''
        and $_POST['phone1'] != '' and $_POST['type1'] != ''){
            $newUser = new ManagerUsers;
            $newUser->AddUser($_SESSION['email'],$_SESSION['password'],$_SESSION['firstname'],
            $_SESSION['lastname'],$_SESSION['gender'],htmlentities($_POST['address']),
            htmlentities($_POST['city']),htmlentities($_POST['province']),
            htmlentities($_POST['zipcode']),htmlentities($_POST['dateofbirth']),
            htmlentities($_POST['occupation']),htmlentities($_POST['phone1']),
            $extension1,htmlentities($_POST['type1']),
            $phone2,$extension2,$type2,$phone3,$extension3,$type3);
            $_SESSION['registered'] = 'success';
        }
    }
    unset($_SESSION['email']);
    About();
}

function CheckEmailInUse(){
    $user = new ManagerUsers;
    $emailinUse = $user->CheckEmailInUse(htmlentities($_POST['email']));
    if($donnees = $emailinUse->fetch())
    {
        echo 'taken';
    }
    else
    {   
        if($_POST['email'] != $_POST['email2']){
            echo 'emailerror';
        }else if($_POST['password'] != $_POST['password2']){
            echo 'passworderror';
        }else if($_POST['email'] != '' and $_POST['password'] != ''
                and $_POST['firstname'] != '' and $_POST['lastname'] != ''
                and $_POST['gender']!=''){
            $_SESSION['email'] = htmlentities($_POST['email']);
            $_SESSION['password'] = htmlentities($_POST['password']);
            $_SESSION['firstname'] = htmlentities($_POST['firstname']);
            $_SESSION['lastname'] = htmlentities($_POST['lastname']);
            $_SESSION['gender'] = htmlentities($_POST['gender']);
            echo 'availlable';
        }
        else{
            echo 'emptyfield';
        }
    }
}

function Api()
{
    //https://www.weichieprojects.com/blog/curl-api-calls-with-php/
    //******* Prendre l'objet JSON dans SWAGGER, et ne pas oublier les foreign keys
    //$customer = array('H','Yannick','Jacques','2019-08-31','developper','1');

    require('services/callApiExtension.php');
    //$id = '1';
    //$get_Data = CallAPI('GET','Customers/FullName/' . $id);
    // $response = json_decode($get_Data,true);
    //$errors = $response['response']['errors'];
    //$data = $response['response']['data'][0];

   /* $new_object = array(
        "sex" => "H",
  "firstName"=> "Yannick",
  "lastName"=> "Jacques",
  "birthDate"=> "2019-03-25T17:12:40.000Z",
  "occupation"=> "Programmer",
  "idAddress"=> 1,
  "id"=> 0,
  "isActive" => "true"
    );*/
   // echo CallAPI("POST","Customers", json_encode($new_object));

  /* CallAPI("DELETE","Customers/4");
  echo  CallAPI("GET","Customers");*/
}
