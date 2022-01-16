<?php
   require_once('identifier.php');
    require_once('connexiondb.php');
    $idS=isset($_GET['idS'])?$_GET['idS']:0;
    $requete="select * from agent  where code_agent=$idS";
    $resultat=$pdo->query($requete);
    $Agent=$resultat->fetch();

    $nom=$Agent['nom'];
    $prenom=$Agent['prenom'];

    $date_naissance=$Agent['date_naissance'];

    $nationalite=$Agent['nationalite'];
    $code=$Agent['code_identification'];


?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un agent</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition de l'agent :</div>
                <div class="panel-body">
                    <form method="post" action="updateAgent.php" class="form">
			
                     



                    <div class="form-group" hidden=true>
                             <label for="niveau">id:</label>
                            <input type="text" name="idC" 
                                   placeholder="CODE"
                                   class="form-control"
                                   value="<?php echo $idS ?>"/>
                                   </div>

                        <div class="form-group" >
                             <label for="code">code Identification :</label>
                            <input type="text" name="code" 
                                   placeholder="code"
                                   class="form-control"
                                   value="<?php echo $code?>"/>
                        </div>

   
                        <div class="form-group">
                             <label for="nom">Nom:</label>
                            <input type="text" name="nom" 
                                   placeholder="Nom"
                                   class="form-control"
                                   value="<?php echo $nom ?>"/>
                        </div>
                      

                        <div class="form-group">
                             <label for="prenom">prenom:</label>
                            <input type="text" name="prenom" 
                                   placeholder="prenom"
                                   class="form-control"
                                   value="<?php echo $prenom ?>"/>
                        </div>
                        
                        <div class="form-group">
                             <label for="date_naissance">date_naissance:</label>
                            <input type="text" name="date_naissance" 
                                   placeholder="date_naissance"
                                   class="form-control"
                                   value="<?php echo $date_naissance ?>"/>
                        </div>

                        <div class="form-group">
                             <label for="nationalite">nationalite:</label>
                            <input type="text" name="nationalite" 
                                   placeholder="nationalite"
                                   class="form-control"
                                   value="<?php echo $nationalite ?>"/>
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