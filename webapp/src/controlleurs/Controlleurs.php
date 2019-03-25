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

function Login()
{
    if (!empty($_POST)) {
        $userInscript = new ManagerUsers;
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        $user = $userInscript->VerifierLogin($email, $password);
        if ($donnees = $user->fetch()) {
            $_SESSION['username'] = $donnees['first_name'] . ' ' . $donnees['last_name'];
            $user->closeCursor();
            require('views/about.php');
        } else {
            $user->closeCursor();
            $contenu = ob_get_clean();
            require('views/login.php');
        }
    } else {
        require('views/login.php');
    }
}

function Home()
{
    require('views/home.php');
}

function Inscription()
{
    require('views/inscription.php');
}

function Schedule()
{
}

function About()
{
    require('views/about.php');

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
