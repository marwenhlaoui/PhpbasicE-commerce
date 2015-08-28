<article> 
	<?php  if (isset($_SESSION['user'])) {
					if ($_SESSION['user']['ROLE'] == "1") { ?> 
			<div class="paneloption">
				<a href="delete_produit.php?num=<?php echo $dataproduit['id'];?>" class="delete"><i class="ion ion-trash-a"></i></a>
				<a href="editproduit.php?num=<?php echo $dataproduit['id'];?>" class="edit"><i class="ion ion-edit"></i></a>
			</div>
			<?php } } ?>
	<h1><?php echo $dataproduit['nom']; ?></h1>
	<div class="pic">
		<img src="<?php echo $dataproduit['img']; ?>">
	</div>
	<div class="cont">
		<b>Prix : </b><?php echo $dataproduit['prix']; ?><b> DT  |  </b>
		<b>Quantité : </b><?php echo $dataproduit['quantite']; ?><br><br>
		<b>Description :</b><br><p><?php echo $dataproduit['description']; ?></p>
	</div>
</article>