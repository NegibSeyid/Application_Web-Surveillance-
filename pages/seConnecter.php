<?php
    session_start();
    require_once('connexiondb.php');
    
    $login=isset($_POST['login'])?$_POST['login']:"";
    
    $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";

    $requete="select code_user,login, adresse_mail,role,etat 
                from utilisateur where login='$login' 
                and pswd=MD5('$pwd')";
    
    $resultat=$pdo->query($requete);

    if($user=$resultat->fetch()){
       
        if($user['etat']==1){
            
            $_SESSION['code_user']=$user;
            header('location:../pages/missions.php');
            
        }else{
            
            $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Votre compte est désactivé.<br> Veuillez contacter l'administrateur";
            header('location:login.php');
        }
    }else{
        $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
        header('location:login.php');
    }

?>
