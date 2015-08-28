<?php 
	 if (isset($_SESSION['user'])) { 

	 	if ($_SESSION['user']['ROLE']== "1") {

	 		header('Location: admin.php');
	 	}
	 	
      }else{
        header('Location: login.php');
      }
      
	//var_dump($_SESSION) 
?>
	
	<article>   
		<div class="paneloption" style="display:block;">
			<a href="edit_infos.php" class="delete"><i class="ion ion-wrench"></i></a> 
		</div>  
		<div class="pic">
			<img src="<?php echo $_SESSION['user']['AVATAR']; ?>">
		</div>
		<div class="cont">
			<h2><?php echo $_SESSION['user']['LAST_NAME']." ".$_SESSION['user']['FIRST_NAME']; ?> <span class="tag"><i class="ion ion-chevron-left"></i> <?php echo $_SESSION['user']['LOGIN']; ?> <i class="ion ion-chevron-right"></i></span></h2> <br>
			<p>
				<b>E-mail : </b><?php echo $_SESSION['user']['E_MAIL']; ?><br>
				<b>Pays : </b><?php echo $_SESSION['user']['COUNTRY']; ?><br>
				<b>Adresse : </b><?php echo $_SESSION['user']['ADDRESS'].'- '.$_SESSION['user']['POSTAL_CODE']; ?><br>
				<b>Téléphone : </b><?php echo $_SESSION['user']['PHONE']; ?><br>
				<b>Niveau: </b><?php echo $_SESSION['user']['NIVEAU'].' ['.$_SESSION['user']['NV'].']'; ?><br>
			</p>
		</div>
	</article>