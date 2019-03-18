<?php

require_once("models/Connection.php"); 

class ManagerUsers extends Connexion 
{    
    public function VerifierLogin($email,$password){
        $sql = 'Call login (:email, :password)';
        $userConnect = self::getConnexion()->prepare($sql);
        $userConnect->bindParam('email',$email,PDO::PARAM_STR);
        $userConnect->bindParam('password',$password,PDO::PARAM_STR);
        $userConnect->execute();
        return $userConnect;

    }
}
?>