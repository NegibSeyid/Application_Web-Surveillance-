<?php
    session_start();
            
            require_once('connexiondb.php');
            $idS=isset($_GET['idS'])?$_GET['idS']:0;

            $requeteS="select count(*) S from specialite where code_specialite=$idS";
            $resultatS=$pdo->query($requeteS);
            $tabCountS=$resultatS->fetch();
            $nbrS=$tabCountS['S'];
            
                $requete="delete from specialite where code_specialite=?";
                $params=array($idS);
                $resultat=$pdo->prepare($requete);
                $resultat->execute($params);
                header('location:specialites.php');
          
         
        
    
    
    
    
?>