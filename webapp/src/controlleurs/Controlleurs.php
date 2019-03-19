<?php
session_start();
require('models/ManagerUsers.php');

if (!isset($_SESSION['locale'])) {
    $_SESSION['locale'] = 'fr';
}

if (isset($_GET['setLocale'])) {
    $_SESSION['locale'] = $_GET['setLocale']; //if the user change language
}

function localize($phrase)
{
    $translatedPhrase = getTranslated($phrase, $_SESSION['locale']);
    if ($translatedPhrase) {
        return $translatedPhrase;
    } else {
        $translatedPhrase = getUntranslated($phrase, 'default');
        if ($translatedPhrase) {
            //Raise error not translated in locale
            return $translatedPhrase;
        } else {
            // Raise Error not declared
            return $phrase;
        }
    }
}

function getTranslated($phrase, $locale)
{
    static $translations = null;
    if (is_null($translations)) {
        $lang_file = 'lang/' . $locale . '.json';
        if (!file_exists($lang_file)) {
            $lang_file = 'lang/' . 'fr.json';
        }
        $lang_file_content = file_get_contents($lang_file);
        $translations = json_decode($lang_file_content, true);
    }
    return $translations[$phrase];
}

function getUntranslated($phrase){
  static $translations = null;
  if (is_null($translations)) {
      $lang_file = 'lang/fr.json';
      if (file_exists($lang_file)) {
        $lang_file_content = file_get_contents($lang_file);
        $translations = json_decode($lang_file_content, true);
      } else {
        //Raise Fatal Error
        return $phrase;
      }
  }
  return $translations[$phrase];
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
