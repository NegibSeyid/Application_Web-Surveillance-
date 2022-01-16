<?php
   require_once('identifier.php');
    require_once('connexiondb.php');
    $idS=isset($_GET['idS'])?$_GET['idS']:0;
    $requete="select * from cible where code_cible=$idS";
    $resultat=$pdo->query($requete);
    $Cible=$resultat->fetch();

    $nom=$Cible['nom'];
    $prenom=$Cible['prenom'];
    $nationalite=$Cible['nationalite'];
    $date_naissance=$Cible['date_naissance'];

    $mission=$Cible['code_mission'];


?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'une specialité</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition de la Cible :</div>
                <div class="panel-body">
                    <form method="post" action="updateCibles.php" class="form">
			

                    <div class="form-group" hidden =true>
                             <label for="idS">code de la cible:</label>
                            <input type="text" name="idS" 
                                   placeholder="Nom"
                                   class="form-control"
                                   value="<?php echo $idS ?>"/>
                        </div>

                        
                  
                    <div class="form-group">
                             <label for="nom">Nom de la Cible:</label>
                            <input type="text" name="nom" 
                                   placeholder="nom"
                                   class="form-control"
                                   value="<?php echo $nom ?>"/>
                        </div>



   
                        <div class="form-group">
                             <label for="prenom">Prenom de la Cible:</label>
                            <input type="text" name="prenom" 
                                   placeholder="prenom de la cible"
                                   class="form-control"
                                   value="<?php echo $prenom ?>"/>
                        </div>
                      

                        <div class="form-group">
                             <label for="nationalite">Nationalité de la cible:</label>
                            <input type="text" name="nationalite" 
                                   placeholder="nationalite de la cible"
                                   class="form-control"
                                   value="<?php echo $nationalite ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="mission">Mission de la cible:</label>
                            <input type="text" name="mission" 
                                   placeholder="mission"
                                   class="form-control"
                                   value="<?php echo $mission ?>"/>
                        </div>
                        
                        <div class="form-group">
                             <label for="date_naissance">Date Naissance de la cible:</label>
                            <input type="date" name="date_naissance" 
                                   placeholder="Date Naissance de la cible"
                                   class="form-control"
                                   value="<?php echo $date_naissance ?>"/>
                        </div>
                        
                   
                        
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>