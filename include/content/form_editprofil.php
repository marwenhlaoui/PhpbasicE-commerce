
  <?php
      if (isset($_SESSION['user'])) {
        ///  
      }else{  
          header('Location:login.php');
      } 

      if (isset($_POST['submit'])) {
        if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password1'])) {
              
              $firstname = mysqli_real_escape_string($base,$_POST['firstname']);
              $lastname = mysqli_real_escape_string($base,$_POST['lastname']); 
              $pays = mysqli_real_escape_string($base,$_POST['pays']); 
              $adress = mysqli_real_escape_string($base,$_POST['adress']); 
              $postalcode = mysqli_real_escape_string($base,$_POST['postalcode']); 
              $phone = mysqli_real_escape_string($base,$_POST['phone']); 
              $pass = md5(mysqli_real_escape_string($base,$_POST['password1']));  
              $avatar = mysqli_real_escape_string($base,$_POST['avatar']); 

              $avatar = (!empty($avatar)) ? $avatar : "default/img/img_not_found.jpg" ;


              //echo $_POST['descproduit'].'<hr>'.$descproduit; 

              $editpro = "UPDATE abonne SET FIRST_NAME='".$firstname."', LAST_NAME='".$lastname."', PASSWORD='".$pass."' , COUNTRY='".$pays."', POSTAL_CODE='".$postalcode."', PHONE='".$phone."', ADDRESS='".$adress."', AVATAR='".$avatar."'  WHERE id=".$_SESSION['user']['ID']."";
              
             //die($editpro);
              $rq = mysqli_query($base,$editpro);

              $data = "SELECT * FROM `abonne` WHERE `ID` LIKE '".$_SESSION['user']['ID']."'";
              $datauser = $base->query($data)->fetch_array(MYSQLI_ASSOC);
              $_SESSION['user'] = $datauser;

          		if ($_SESSION['user']['ROLE'] == "1") {
                    header('Location: admin.php');
                }else{
                    header('Location: user.php');
                }
         }else{
            echo "<p class='alert error'><b>Attention !</b> Verifier que les coordonnées saisie correcte...</p>";
        }
      }
  ?>

<form  method='post' action="" >
<table >  
  <tr> <td colspan="2"><br>  </td></tr> 
  <tr>
    <td><p> Avatar : <p> </td>
    <td><input name="avatar" type="text"  value="<?php echo $_SESSION['user']['AVATAR'];?>"/></td> 
  </tr>
  <tr>
    <td><p> Nom* : <p> </td>
    <td><input name="firstname" type="text"  value="<?php echo $_SESSION['user']['FIRST_NAME'];?>"/></td> 
  </tr>
  <tr>
    <td><p>Pr&eacute;nom* : <p></td>
    <td><input name="lastname" type="text"  value="<?php echo $_SESSION['user']['LAST_NAME'];?>"/></td> 
  </tr>   
  <tr>
    <td><p>Pays  : <p></td> 
    <td>
      <select  name="pays" >
        <option  value="<?php echo $_SESSION['user']['COUNTRY'];?>" selected="selected"><?php echo $_SESSION['user']['COUNTRY'];?></option>
        <option  value="A&ccedil;ores">A&ccedil;ores</option>
        <option  value="Afghanistan">Afghanistan</option>
        <option  value="Afrique" du="du" sud="sud">Afrique du Sud</option>
        <option  value="Albanie">Albanie</option>
        <option  value="Alg&eacute;rie">Alg&eacute;rie</option>
        <option  value="Allemagne">Allemagne</option>
        <option  value="Andorre">Andorre</option>
        <option  value="Angola">Angola</option>
        <option  value="Arabie" saoudite="saoudite" (royaume)>Arabie Saoudite (royaume)</option>
        <option  value="Argentine">Argentine</option>
        <option  value="Australie">Australie</option>
        <option  value="Autriche">Autriche</option>
        <option  value="Belgique">Belgique</option>
        <option  value="B&eacute;nin">B&eacute;nin</option>
        <option  value="Bi&eacute;lorussie">Bi&eacute;lorussie</option>
        <option  value="Bosnie-Herz&eacute;govine">Bosnie-Herz&eacute;govine</option>
        <option  value="Br&eacute;sil">Br&eacute;sil</option>
        <option  value="Bulgarie">Bulgarie</option>
        <option  value="Burkina" fasso="fasso">Burkina Fasso</option>
        <option  value="Cameroun">Cameroun</option>
        <option  value="Canada">Canada</option>
        <option  value="Chili">Chili</option>
        <option  value="Chine">Chine</option>
        <option  value="Chypre">Chypre</option>
        <option  value="Colombie">Colombie</option>
        <option  value="Cor&eacute;e">Cor&eacute;e</option>
        <option  value="Croatie">Croatie</option>
        <option  value="Danemark">Danemark</option>
        <option  value="Djibouti">Djibouti</option>
        <option  value="Egypte">Egypte</option>
        <option  value="Equateur">Equateur</option>
        <option  value="Espagne">Espagne</option>
        <option  value="Estonie">Estonie</option>
        <option  value="Etats-Unis">Etats-Unis</option>
        <option  value="Finlande">Finlande</option>
        <option  value="France" m&eacute;tropolitaine="m&eacute;tropolitaine" 
                  >France m&eacute;tropolitaine</option>
        <option  value="Gr&egrave;ce">Gr&egrave;ce</option>
        <option  value="Guadeloupe">Guadeloupe</option>
        <option  value="Guyane">Guyane</option>
        <option  value="Hong" kong="kong">Hong Kong</option>
        <option  value="Hongrie">Hongrie</option>
        <option  value="Ile" maurice="maurice">Ile Maurice</option>
        <option  value="Inde">Inde</option>
        <option  value="Indon&eacute;sie">Indon&eacute;sie</option>
        <option  value="Irlande">Irlande</option>
        <option  value="Islande">Islande</option>
        <option  value="Isra&euml;l">Isra&euml;l</option>
        <option  value="Italie">Italie</option>
        <option  value="Japon">Japon</option>
        <option  value="Kenya">Kenya</option>
        <option  value="La" r&eacute;union="r&eacute;union" (ile de)="de)">La R&eacute;union (ile de)</option>
        <option  value="Lettonie">Lettonie</option>
        <option  value="Liban">Liban</option>
        <option  value="Liechtenstein">Liechtenstein</option>
        <option  value="Lituanie">Lituanie</option>
        <option  value="Luxembourg">Luxembourg</option>
        <option  value="Mac&eacute;doine">Mac&eacute;doine</option>
        <option  value="Madagascar">Madagascar</option>
        <option  value="Malaisie">Malaisie</option>
        <option  value="Mali">Mali</option>
        <option  value="Malte">Malte</option>
        <option  value="Maroc">Maroc</option>
        <option  value="Martinique">Martinique</option>
        <option  value="Mauritanie">Mauritanie</option>
        <option  value="Mayotte">Mayotte</option>
        <option  value="Mexique">Mexique</option>
        <option  value="Namibie">Namibie</option>
        <option  value="N&eacute;pal">N&eacute;pal</option>
        <option  value="Niger">Niger</option>
        <option  value="Nig&eacute;ria">Nig&eacute;ria</option>
        <option  value="Norv&egrave;ge">Norv&egrave;ge</option>
        <option  value="Nouvelle" cal&eacute;donie="cal&eacute;donie">Nouvelle Cal&eacute;donie</option>
        <option  value="Nouvelle" z&eacute;lande="z&eacute;lande">Nouvelle Z&eacute;lande</option>
        <option  value="Oman">Oman</option>
        <option  value="Ouganda">Ouganda</option>
        <option  value="Pakistan">Pakistan</option>
        <option  value="Paraguay">Paraguay</option>
        <option  value="Pays-Bas">Pays-Bas</option>
        <option  value="P&eacute;rou">P&eacute;rou</option>
        <option  value="Philippines">Philippines</option>
        <option  value="Pologne">Pologne</option>
        <option  value="Polyn&eacute;sie" fran&ccedil;aise="fran&ccedil;aise">Polyn&eacute;sie Fran&ccedil;aise</option>
        <option  value="Porto" rico="rico">Porto Rico</option>
        <option  value="Portugal">Portugal</option>
        <option  value="Qatar">Qatar</option>
        <option  value="Qu&eacute;bec">Qu&eacute;bec</option>
        <option  value="R&eacute;publique" tch&egrave;que="tch&egrave;que">R&eacute;publique Tch&egrave;que</option>
        <option  value="Roumanie">Roumanie</option>
        <option  value="Royaume" uni="uni">Royaume Uni</option>
        <option  value="Russie">Russie</option>
        <option  value="Rwanda">Rwanda</option>
        <option  value="Salvador">Salvador</option>
        <option  value="S&eacute;n&eacute;gal">S&eacute;n&eacute;gal</option>
        <option  value="Singapour">Singapour</option>
        <option  value="Slovaquie">Slovaquie</option>
        <option  value="Slov&eacute;nie">Slov&eacute;nie</option>
        <option  value="St" pierre="pierre" et="et" miquelon="miquelon">St Pierre et Miquelon</option>
        <option  value="Su&egrave;de">Su&egrave;de</option>
        <option  value="Suisse">Suisse</option>
        <option  value="Syrie">Syrie</option>
        <option  value="Ta&iuml;wan">Ta&iuml;wan</option>
        <option  value="Tanzanie">Tanzanie</option>
        <option  value="Tchad">Tchad</option>
        <option  value="Tha&iuml;lande">Tha&iuml;lande</option>
        <option  value="Togo">Togo</option>
        <option  value="Tunisie">Tunisie</option>
        <option  value="Turquie">Turquie</option>
        <option  value="Ukraine">Ukraine</option>
        <option  value="Uruguay">Uruguay</option>
        <option  value="Venezu&eacute;la">Venezu&eacute;la</option>
        <option  value="Vi&ecirc;t-Nam">Vi&ecirc;t-Nam</option>
        <option  value="Wallis" et="et" futuna="futuna">Wallis et Futuna</option>
        <option  value="Yougoslavie">Yougoslavie</option>
        <option  value="Zimbabwe">Zimbabwe</option>
      </select>
     </td> 
  </tr>
  <tr>
    <td><p>Adresse  : <p></td>  
    <td>
      <input name="adress" type="text"  value="<?php echo $_SESSION['user']['ADDRESS'];?>"/>
    </td> 
  </tr> 
  <tr>
    <td><p>Code postale  : <p></td>  
    <td> <input name="postalcode" type="text" value="<?php echo $_SESSION['user']['POSTAL_CODE'];?>"/> </td> 
  </tr>
  <tr>
    <td><p>T&eacute;l&eacute;phone  : <p></td>  
    <td> <input name="phone" type="tel" value="<?php echo $_SESSION['user']['PHONE'];?>"/> </td> 
  </tr>
  <tr>
    <td><p>Password*  : <p></td>  
    <td>
      <input name="password1" type="password" />
    </td> 
  </tr>  
  <tr>
    <td colspan="2"><input type="submit" name="submit" value="Modifier" /></td>
  </tr>  

</table> 
</form>