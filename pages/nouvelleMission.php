<?php 
    require_once('identifier.php');

    require_once('connexiondb.php');

    $Specialite="select  * from specialite";
    $resultat_spec=$pdo->query($Specialite);
    $result_spec =$resultat_spec->fetch();







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
                <div class="panel-heading">Veuillez saisir les données de la nouvelle mission</div>
                <div class="panel-body">
                    <form method="post" action="insertMission.php" class="form">
						
                        <div class="form-group">
                             <label for="titre">Titre:</label>
                            <input type="text" name="titre" 
                                   placeholder="Titre"
                                   class="form-control"/>
                        </div>


                        <div class="form-group">
                             <label for="Description">Desciption:</label>
                            <input type="text" name="Description" 
                                   placeholder=" Description"
                                   class="form-control"/>
                        </div>




                        <div class="form-group">
                             <label for="date_debut">Date Debut :</label>
                            <input type="date" name="date_debut" 
                                   placeholder="Date debut"
                                   class="form-control"/>
                        </div>
                         

                        <div class="form-group">
                             <label for="date_fin">Date Fin :</label>
                            <input type="date" name="date_fin" 
                                   placeholder="Date fin"
                                   class="form-control"/>
                        </div>


                        
                        <div class="form-group">
                             <label for="Pays">Pays :</label>
                            <input type="text" name="Pays" 
                                   placeholder="Pays"
                                   class="form-control"/>
                        </div>

                          
                        <div class="form-group">
                             <label for="Statut">Statut :</label>
                             <select name="Statut" class="form-control" id="Statut">
                                <option >En preparation</option>
                                <option >En cours</option>
                                <option >Terminé</option>
                                <option >Echec</option>

				            </select>
                        </div>


                        <div class="form-group">
                             <label for="Type">Type :</label>
                             <select name="Type" class="form-control" id="Type">
                                <option value="S">Surveillance</option>
                                <option value="I">Infiltration</option>
                                <option value="A">Autres</option>
				            </select>
                        </div>

                        <div class="form-group">
                             <label for="specialite">Specialite:</label>
                       
                        <select type="text" name="specialite"
                                   class="form-control">
                                   <?php while($specialite=$resultat_spec->fetch()){ ?>

                                   <option value =<?php echo $specialite['code_specialite'];?> > <?php echo $specialite['nom'];?>
                                   
                                   
                                   </option>
                                   <?php }?>

                                   </select>
                        </div>


                        <div class="form-group">
                             <label for="Agent">Specialite:</label>
                       
                        <select type="text" name="specialite"
                                   class="form-control">
                                   <?php while($specialite=$resultat_spec->fetch()){ ?>

                                   <option value =<?php echo $specialite['code_specialite'];?> > <?php echo $specialite['nom'];?>
                                   
                                   
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