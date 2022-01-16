<?php
    require_once('identifier.php');
    require_once("connexiondb.php");
    
    /*
    if(isset($_GET['nomF']))
        $nomf=$_GET['nomF'];
    else
        $nomf="";
    */
  
    $codeS=isset($_GET['nomC'])?$_GET['nomc']:"";
    
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
        $requete="select * from contact
                where nom like '%$codeS%'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) C from contact
                where nom like '%$codeS%'";



    $resultatF=$pdo->query($requete);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrContact=$tabCount['C'];
    $reste=$nbrContact % $size;   
    if($reste===0) 
        $nbrPage=$nbrContact/$size;   
    else
        $nbrPage=floor($nbrContact/$size)+1;  ?>


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
          
				<div class="panel-heading">Rechercher des Contacts</div>
				<div class="panel-body">
					
					<form method="get" action="Contacts.php" class="form-inline">
					
						<div class="form-group">
                            
                            <input type="text" name="nomC" 
                                   placeholder="Nom du contact"
                                   class="form-control"
                                   value="<?php echo $codeS ?>"/>
                                   
                        </div>

					



                        
                        
			            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                        
                       	<?php if ($_SESSION['code_user']['role']=='ADMIN') {?>
                       	
                            <a href="nouvelContact.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                
                                Nouveau Contact
                                
                            </a>
                            
                        <?php } ?>                 
                         
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Contacts (<?php echo $nbrContact ?> Contacts)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>nom</th><th>Prenom</th>
                                <th>Date Naissance</th>
                                <th>Nationalie</th>

                                <?php if ($_SESSION['code_user']['role']== 'ADMIN') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($contact=$resultatF->fetch()){ ?>
                                <tr>
                                    <td><?php echo $contact['nom'] ?> </td>
                                    <td><?php echo $contact['prenom'] ?> </td>
                                    <td><?php echo $contact['date_naissance'] ?> </td>
                                    <td><?php echo $contact['nationalite'] ?> </td>

                                     <?php if ($_SESSION['code_user']['role']== 'ADMIN') {?>
                                        <td>
                                            <a href="editerContact.php?idS=<?php echo $contact['code_contact'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer le contact'"
                                                href="supprimerContact.php?idS=<?php echo $contact['code_contact'] ?>">
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
            <a href="specialites.php?page=<?php echo $i;?>&nomS=<?php echo $codeS ?>">
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
