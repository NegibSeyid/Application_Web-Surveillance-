<?php 
    require_once('identifier.php');
    require_once('connexiondb.php');
    $Specialite="select  distinct nom from specialite ";

    $resultat_spec=$pdo->query($Specialite);

    $result_spec =$resultat_spec->fetch();

    
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <tit>Nouvel Agent</tit>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Veuillez saisir les données du nouvel Agent</div>
                <div class="panel-body">
                    <form method="post" action="insertAgent.php" class="form">

                    <div class="form-group">
                             <label for="Code">Code Identification:</label>
                            <input type="text" name="Code" 
                                   placeholder="Code Identification"
                                   class="form-control"/>
                        </div>
						
                        <div class="form-group">
                             <label for="Nom">Nom Agent:</label>
                            <input type="text" name="nom" 
                                   placeholder="Nom Agent"
                                   class="form-control"/>
                        </div>


                        <div class="form-group">
                             <label for="Prenom">Prenom Agent:</label>
                            <input type="text" name="prenom" 
                                   placeholder="Prenom Agent"
                                   class="form-control"/>
                        </div>


                        <div class="form-group">
                             <label for="date_naissance">Date Naissance :</label>
                            <input type="date" name="date_naissance" 
                                   placeholder="Date Naissance "
                                   class="form-control"/>
                        </div>

                        
                        <div class="form-group">
                             <label for="nationalite">Nationalité :</label>
                            <input type="text" name="nationalite" 
                                   placeholder="Nationalite "
                                   class="form-control"/>
                        </div>


                    
                      
                        <div class="form-group">
                             <label for="specialite">Specialite:</label>
                       
                        <select type="text" name="specialite"
                                   class="form-control">
                                   <?php foreach( $result_spec as $specialite){?>
                           
                                   <option > <?php echo $specialite;?>

                                   
                                   
                                   
                                   </option>
                                   <?php }?>
 

                                   </select>
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