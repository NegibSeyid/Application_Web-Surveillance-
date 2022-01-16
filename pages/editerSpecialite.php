<?php
   require_once('identifier.php');
    require_once('connexiondb.php');
    $idS=isset($_GET['idS'])?$_GET['idS']:0;
    $requete="select * from specialite where code_specialite=$idS";
    $resultat=$pdo->query($requete);
    $specialite=$resultat->fetch();
    $nomS=$specialite['nom'];
    $DomaineS=$specialite['Domaine'];

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
                <div class="panel-heading">Edition de la specialité :</div>
                <div class="panel-body">
                    <form method="post" action="updateSpecialite.php" class="form">
			
                        
                  
                    <div class="form-group" hidden=true>
                             <label for="niveau">code de la specialité:</label>
                            <input type="text" name="idS" 
                                   placeholder="CODE"
                                   class="form-control"
                                   value="<?php echo $idS ?>"/>
                        </div>

   
                        <div class="form-group">
                             <label for="niveau">Nom de la specialité:</label>
                            <input type="text" name="nomS" 
                                   placeholder="Nom de la specialité"
                                   class="form-control"
                                   value="<?php echo $nomS ?>"/>
                        </div>
                      

                        <div class="form-group">
                             <label for="niveau">Domaine de la specialité:</label>
                            <input type="text" name="DomaineS" 
                                   placeholder="Domaine de la specialité"
                                   class="form-control"
                                   value="<?php echo $DomaineS ?>"/>
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