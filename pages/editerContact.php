<?php
   require_once('identifier.php');
    require_once('connexiondb.php');
    $idS=isset($_GET['codeS'])?$_GET['codeS']:0;
    $requete="select * from contact where code_contact=$idS";
    $resultat=$pdo->query($requete);
    $contact=$resultat->fetch();
    $nom=$contact['nom'];
    $prenom=$contact['prenom'];

    $date_naissance=$contact['date_naissance'];

    $nationalite=$contact['nationalite'];



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
                <div class="panel-heading">Edition le contact :</div>
                <div class="panel-body">
                    <form method="post" action="updateContact.php" class="form">
			




                    <div class="form-group" hidden=true>
                             <label for="niveau">id:</label>
                            <input type="text" name="idC" 
                                   placeholder="CODE"
                                   class="form-control"
                                   value="<?php echo $idS ?>"/>
                        </div>
                  
                    <div class="form-group">
                             <label for="niveau">nom:</label>
                            <input type="text" name="nom" 
                                   placeholder="CODE"
                                   class="form-control"
                                   value="<?php echo $nom ?>"/>
                        </div>

   
                        <div class="form-group">
                             <label for="niveau">Prenom:</label>
                            <input type="text" name="prenom" 
                                   placeholder="Nom"
                                   class="form-control"
                                   value="<?php echo $nom ?>"/>
                        </div>
                      

                     

                        <div class="form-group">
                             <label for="date_naissance">Date Naissance :</label>
                            <input type="date" name="date_naissance" 
                                   placeholder="Date Naissance "
                                   class="form-control"

                                   value="<?php echo $date_naissance ?>"/>
                        </div>

                        
                        <div class="form-group">
                             <label for="nationalite">nationalité :</label>
                            <input type="text" name="nationalite" 
                                   placeholder="Nationalite "
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