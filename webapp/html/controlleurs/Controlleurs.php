<?php 
session_start();
require('Models/ManagerUsers.php');

function Login(){
    if(!empty($_POST)){
        $userInscript = new ManagerUsers;
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        $user = $userInscript->VerifierLogin($email, $password);
        if($donnees = $user->fetch())
        {
            $_SESSION['username'] = $donnees['first_name'] . ' ' . $donnees['last_name'];
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
    require('views/home.php');
}

function Inscription(){
    require('views/inscription.php');
}

function Schedule(){

}

function About(){
    require('views/about.php');
}

?>
