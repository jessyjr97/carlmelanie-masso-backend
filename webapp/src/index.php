<?php
require('controlleurs/Controlleurs.php');
try
{
    if (isset($_GET['action'])) {
    switch ($_GET['action']){
        case 'inscription': 
            Inscription();
            break;  
        case 'home': 
            Home();
            break;
        case 'login': 
            Login();
            break;
        case 'about':
            About();
            break;
        case 'personnalinformation':
            PersonnalInformation();
            break;
        case 'logout':
            session_unset();
            session_destroy();
            Home();
            break;
        case 'api' :
            Api();
        default :
            Home();
            break;
        }
    }
    else if(isset($_POST['email'])){
        CheckEmailInUse();
    }
    else
    {
    Home();
    }
}
catch (PDOException $e) {
    $msgErreur = $e->getMessage();
    require 'views/vueErreur.php';
}
?>
