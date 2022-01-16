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
                <div class="panel-heading">Veuillez saisir les données de la nouvelle specialité</div>
                <div class="panel-body">
                    <form method="post" action="insertSpecialite.php" class="form">
						
                        <div class="form-group">
                             <label for="niveau">Nom de la Speciamité:</label>
                            <input type="text" name="nomS" 
                                   placeholder="Nom de la Specialité"
                                   class="form-control"/>
                        </div>

                        		
                        <div class="form-group">
                             <label for="niveau">Domaaine de la Speciamité:</label>
                            <input type="text" name="domaineS" 
                                   placeholder="Domaine de la Specialité"
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