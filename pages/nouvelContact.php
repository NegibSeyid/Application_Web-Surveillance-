<?php 
    require_once('identifier.php');
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <tit>Nouvelle Secialite</tit>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Veuillez saisir les données du nouveau contact</div>
                <div class="panel-body">
                    <form method="post" action="insertContact.php" class="form">
						
                        <div class="form-group">
                             <label for="Nom">Nom du contact:</label>
                            <input type="text" name="nom" 
                                   placeholder="Nom contact"
                                   class="form-control"/>
                        </div>


                        <div class="form-group">
                             <label for="Prenom">Prenom du contact:</label>
                            <input type="text" name="prenom" 
                                   placeholder="Prenom contact"
                                   class="form-control"/>
                        </div>

                        <div class="form-group">
                             <label for="date_naissance">Date Naissance :</label>
                            <input type="date" name="date_naissance" 
                                   placeholder="Date Naissance "
                                   class="form-control"/>
                        </div>

                        
                        <div class="form-group">
                             <label for="nationalite">nationalité :</label>
                            <input type="text" name="nationalite" 
                                   placeholder="Nationalite "
                                   class="form-control"/>
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