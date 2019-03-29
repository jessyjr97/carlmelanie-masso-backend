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
        case 'personalinformation':
            PersonalInformation();
            break;
        case 'updatepassword':
            UpdatePassword();
            break;
        case 'logout':
            session_unset();
            session_destroy();
            Home();
            break;
        case 'api' :
            Api();
        case 'report-bug' :
            ReportBug();
            break;
        case 'send_bug' :
            SendBug();
            break;
        default :
            Home();
            break;
        }
    }
    else if(isset($_POST['email'])){
        CheckEmailInUse();
    }
    else if(isset($_POST['newpassword'])){
        CheckPasswords();
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
