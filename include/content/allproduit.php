<?php
	
    $allproduit = "SELECT * FROM `produit`";
    $produits = $base->query($allproduit); 
?>

<?php  while($produit = $produits->fetch_array()) {?>   
		<div class="plist">
			<?php  if (isset($_SESSION['user'])) {
					if ($_SESSION['user']['ROLE'] == "1") { ?> 
			<div class="paneloption">
				<a href="delete_produit.php?num=<?php echo $produit['id'];?>" class="delete"><i class="ion ion-trash-a"></i></a>
				<a href="editproduit.php?num=<?php echo $produit['id'];?>" class="edit"><i class="ion ion-edit"></i></a>
			</div>
			<?php } } ?>
			<a href="produit.php?num=<?php echo $produit['id'];?>"><h3><?php echo $produit['nom']; ?></h3></a>
			<a href="produit.php?num=<?php echo $produit['id'];?>"><img src="<?php echo $produit['img']; ?>"></a> 
			<p>
				<b class="plistop">Prix : </b><?php echo $produit['prix']; ?>DT<br>
				<b class="plistop">Quantité : </b> <?php echo $produit['quantite']; ?> 
			</p> 
		</div> 
<?php }?>