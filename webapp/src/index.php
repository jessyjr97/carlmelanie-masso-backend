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
        case 'inscription':
            Inscription();
            break;
        case 'schedule':
            Schedule();
            break;
        case 'logout':
            session_unset();
            session_destroy();
            Home();
            break;
        default :
            Home();
            break;
        }
    }
    else {
    Home();
    }
}
catch (PDOException $e) {
    $msgErreur = $e->getMessage();
    require 'view/vueErreur.php';
}
?>
