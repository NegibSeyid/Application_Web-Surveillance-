<?php
    require_once('identifier.php');
    require_once("connexiondb.php");
    
    /*
    if(isset($_GET['nomF']))
        $nomf=$_GET['nomF'];
    else
        $nomf="";
    */
  
    $codeS=isset($_GET['titre'])?$_GET['titre']:"";
    
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
        $requete="select * from mission
                where titre like '%$codeS%'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) C from mission
                where titre like '%$codeS%'";



    $resultatF=$pdo->query($requete);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrMissions=$tabCount['C'];
    $reste=$nbrMissions % $size;   
    if($reste===0) 
        $nbrPage=$nbrMissions/$size;   
    else
        $nbrPage=floor($nbrMissions/$size)+1;  ?>


<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des Contacts</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            <div class="panel panel-success margetop60">
          
				<div class="panel-heading">Rechercher des Missions</div>
				<div class="panel-body">
					
					<form method="get" action="missions.php" class="form-inline">
					
						<div class="form-group">
                            
                            <input type="text" name="titre" 
                                   placeholder="titre"
                                   class="form-control"
                                   value="<?php echo $codeS ?>"/>
                                   
                        </div>

					



                        
                        
			            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                        
                       	<?php if ($_SESSION['code_user']['role']=='ADMIN') {?>
                       	
                            <a href="nouvelleMission.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                
Nouvelle Mission                                
                            </a>
                            
                        <?php } ?>                 
                         
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Missions (<?php echo $nbrMissions ?> Missions)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Date Debut</th>
                                <th>Date Fin</th>
                                <th>Statut</th>
                                <th>Type</th>
                                <th>Titre</th>
                                <th>Pays</th>
                                <th>Description</th>
                                <th>Specialite</th>



                                <?php if ($_SESSION['code_user']['role']== 'ADMIN') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($mission=$resultatF->fetch()){ ?>
                                <tr>
                                    <td><?php echo $mission['date_debut'] ?> </td>
                                    <td><?php echo $mission['date_fin'] ?> </td>
                                    <td><?php echo $mission['Statut'] ?> </td>

                                    <td><?php echo $mission['Type'] ?> </td>
                                    <td><?php echo $mission['Titre'] ?> </td>

                                    <td><?php echo $mission['Pays'] ?> </td>

                                    <td><?php echo $mission['Description'] ?> </td>

                                    <td><?php echo $mission['code_specialite'] ?> </td>

                                     <?php if ($_SESSION['code_user']['role']== 'ADMIN') {?>
                                        <td>
                                            <a href="editerMission.php?idS=<?php echo $mission['Code'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer la mission'"
                                                href="supprimerMission.php?idS=<?php echo $mission['Code'] ?>">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                            <a href="DetailMission.php?idS=<?php echo $mission['Code'] ?>">
                                                <span class="glyphicon glyphicon-list"></span>
                                            </a>
                                        </td>
                                        

                                        
                                         


                                    <?php }?>
                                    
                                </tr>
                            <?PHP } ?>
                       </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="mission.php?page=<?php echo $i;?>&nomS=<?php echo $codeS ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </body>
</HTML>
