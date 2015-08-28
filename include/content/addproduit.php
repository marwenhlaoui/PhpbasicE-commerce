
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
              $imgproduit = (empty($imgproduit)) ? "urldefult" : $imgproduit ;

              //echo $_POST['descproduit'].'<hr>'.$descproduit;
              //die();

              $addpro = "INSERT INTO `produit` (`nom`, `img`, `prix`, `quantite`, `description`) VALUES ('$nomproduit', '$imgproduit', '$prixproduit', '$quantproduit','$descproduit')";
              $rq = mysqli_query($base,$addpro);
            die("<p class='alert success'>Félicitations ! Votre nouveau produit a été ajouter avec succès !</p><br><center><a href='addproduit.php'>Ajouter un autre produit</a> - <a href='list_produit.php'>Voir tous les produit</a></center>"); 
        }else{
            echo "<p class='alert error'><b>Attention !</b> Verifier que les coordonnées saisie correcte...</p>";
        }
      }
  ?>
    <form action="" method="post">
        <table>
        <tr>
          <td colspan="2">Nom de produit : </td>
          <td colspan="2"><input type="text" name="nomproduit" placeholder="Entrer nom de produit "></input></td>
        </tr>
        <tr>
          <td colspan="2">Image de produit : </td>
          <td colspan="2"><input type="text" name="imgproduit" placeholder="Entrer url d'image de produit"></input></td>
        </tr>
        <tr >
          <td colspan="2" style="min-width: 160px; "></td>
          <td>Prix :  <input type="number" name="prixproduit" placeholder="00 DT"></input></td> 
          <td>quantité :  <input type="number" step="any" name="quantproduit" ></input></td>
        </tr> 
        <tr>
          <td>Description : </td>
          <td colspan="3"><textarea  name="descproduit" ></textarea></td>
        </tr>
        <tr>
          <td colspan="4"><input type="submit" name="submit" value="Ajouter"></td> 
        </tr>
      </table>
</form>