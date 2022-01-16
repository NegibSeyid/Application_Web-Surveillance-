<?php
    require_once('identifier.php');
?>

<nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="container-fluid">
	
		<div class="navbar-header">
		
			<a href="../index.php" class="navbar-brand">Agence de Surveillance</a>
			
		</div>
		
		<ul class="nav navbar-nav">

		<li><a href="missions.php">
		<i class="fa fa-tags"></i>
                    &nbsp  Missions
            </a>
         </li>



		<?php if ($_SESSION['code_user']['role']=='ADMIN') {?>
		
			<li><a href="Agents.php">
			<i class="fa fa-users"></i>
                    &nbsp  Agents
                </a>
            </li>

			
			<li><a href="Contacts.php">
			<i class="fa fa-users"></i>
                    &nbsp  Contacts
                </a>
            </li>
			
			<li><a href="specialites.php">
                    <i class="fa fa-tags"></i>
                    &nbsp  Specialités
                </a>
            </li>

			<li><a href="cibles.php">
                    <i class="fa fa-tags"></i>
                    &nbsp  Cibles
                </a>
            </li>

			
				
			<li><a href="Planques.php">
				<i class="fa fa-tags"></i>
                        &nbsp  Planques
                    </a>
            </li>
				


				
			<li><a href="utilisateurs.php">
			<i class="fa fa-users"></i>
                    &nbsp  Utilisateurs
                </a>
            </li>
				<?php }?>
			
		</ul>
		
		
		<ul class="nav navbar-nav navbar-right">
					
			<li>
				<a href="editerUtilisateur.php?id=<?php echo $_SESSION['code_user']['code_user'] ?>">
                    <i class="fa fa-user-circle-o"></i>
					<?php echo  ' '.$_SESSION['code_user']['login']?>
				</a> 
			</li>
			
			<li>
				<a href="seDeconnecter.php">
                    <i class="fa fa-sign-out"></i>
					&nbsp Se déconnecter
				</a>
			</li>
							
		</ul>
		
	</div>
</nav>
