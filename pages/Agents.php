<?php
    require_once('identifier.php');
    require_once("connexiondb.php");
    
    /*
    if(isset($_GET['nomF']))
        $nomf=$_GET['nomF'];
    else
        $nomf="";
    */
  
    $codeS=isset($_GET['nomA'])?$_GET['nomA']:"";
    
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
        $requete="select * from agent S
                where S.nom like '%$codeS%'
                limit $size
                offset $offset";

                

        
        $requeteCount="select count(*) C from agent
                where nom like '%$codeS%'";


    



    $resultatF=$pdo->query($requete);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrAgent=$tabCount['C'];
    $reste=$nbrAgent % $size;   
    if($reste===0) 
        $nbrPage=$nbrAgent/$size;   
    else
        $nbrPage=floor($nbrAgent/$size)+1;  ?>


<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des Agents</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            <div class="panel panel-success margetop60">
          
				<div class="panel-heading">Rechercher des Agents</div>
				<div class="panel-body">
					
					<form method="get" action="Agents.php" class="form-inline">
					
						<div class="form-group">
                            
                            <input type="text" name="nomA" 
                                   placeholder="Nom Agent"
                                   class="form-control"
                                   value="<?php echo $codeS ?>"/>
                                   
                        </div>

					



                        
                        
			            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                        
                       	<?php if ($_SESSION['code_user']['role']=='ADMIN') {?>
                       	
                            <a href="nouvelAgent.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                
                            Nouvel Agent
                                
                            </a>
                            
                        <?php } ?>                 
                         
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Agents (<?php echo $nbrAgent ?> Agents)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr> <th>Code Identification</th>
                                <th>Nom</th>
                               <th>Prenom</th>
                                <th>Date Naissance</th>
                                <th>Nationalité</th>
                                <th>Specialité</th>


                                <?php if ($_SESSION['code_user']['role']== 'ADMIN') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($Agent=$resultatF->fetch()){ ?>

                                <tr>  
                                <td><?php echo $Agent['Code_identification'] ?> </td>

                                    <td><?php echo $Agent['nom'] ?> </td>
                                    <td><?php echo $Agent['prenom'] ?> </td>
                                    <td><?php echo $Agent['date_naissance'] ?> </td>
                                    <td><?php echo $Agent['nationalite'] ?> </td>
                                    <td><?php echo $Agent['specialite'] ?> </td>

                                    

                                     <?php if ($_SESSION['code_user']['role']== 'ADMIN') {?>
                                        <td>
                                            <a href="editerAgent.php?idS=<?php echo $Agent['code_agent'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer l''agent'"
                                                href="supprimerAgent.php?idS=<?php echo $Agent['code_agent'] ?>">
                                                    <span class="glyphicon glyphicon-trash"></span>
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
            <a href="Agents.php?page=<?php echo $i;?>&nomA=<?php echo $codeS ?>">
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
