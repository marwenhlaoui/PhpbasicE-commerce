
  <?php
      if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['ROLE'] == "1") {
          ///
        }else{
          header('Location:index.php');
        }   
      }else{  
          header('Location:login.php');
      } 

      if (isset($_POST['submit'])) {
        if (!empty($_POST['nomproduit']) && !empty($_POST['prixproduit']) && !empty($_POST['quantproduit']) && !empty($_POST['descproduit'])) {
              
              $nomproduit = mysqli_real_escape_string($base,$_POST['nomproduit']);
              $imgproduit = mysqli_real_escape_string($base,$_POST['imgproduit']);
              $prixproduit = mysqli_real_escape_string($base,$_POST['prixproduit']);
              $quantproduit = mysqli_real_escape_string($base,$_POST['quantproduit']);
              $descproduit = mysqli_real_escape_string($base,nl2br($_POST['descproduit'])); 
              $imgproduit = (empty($imgproduit)) ? "default/img/img_not_found.jpg" : $imgproduit ;

              //echo $_POST['descproduit'].'<hr>'.$descproduit;
              //die();

              $editpro = "UPDATE produit SET nom='".$nomproduit."', img='".$imgproduit."', prix='".$prixproduit."', quantite='".$quantproduit."', description='".$descproduit."' WHERE id=".$dataproduit['id']."";
              
              $rq = mysqli_query($base,$editpro);
          		header('Location:list_produit.php');
         }else{
            echo "<p class='alert error'><b>Attention !</b> Verifier que les coordonnées saisie correcte...</p>";
        }
      }
  ?>
  <form method="post" action="">
<article>
	<h1><input type="text" name="nomproduit" value="<?php echo $dataproduit['nom']; ?>"></h1>
	<div class="pic">
		<img src="<?php echo $dataproduit['img']; ?>"><br>
		<input type="text" name="imgproduit" value="<?php echo $dataproduit['img']; ?>"></input>
	</div>
	<div class="cont">
		<b>Prix : </b><input type="number" name="prixproduit" value="<?php echo $dataproduit['prix']; ?>"></input><b> DT </b><br>
		<b>Quantité : </b><input type="number" step="any" name="quantproduit" value="<?php echo $dataproduit['quantite']; ?>"></input><br><br>
		<b>Description :</b><br>
		<p style="margin-left: -80px;"><textarea  name="descproduit" ><?php echo $dataproduit['description']; ?></textarea></p>
	</div> 
	<input type="submit" name="submit" value="Modifier <?php echo $dataproduit['nom']; ?>">
</article>
</form>