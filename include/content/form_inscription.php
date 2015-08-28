<?php
  if (isset($_SESSION['user'])) {
        header('Location: index.php');
      }
  if (isset($_POST['submit'])) { 
        $firstname =mysqli_real_escape_string($base,$_POST["firstname"]);
        $lastname= mysqli_real_escape_string($base,$_POST["lastname"]);
        $email =mysqli_real_escape_string($base,$_POST["email"]);
        $login =mysqli_real_escape_string($base,$_POST['login']);
        $password =mysqli_real_escape_string($base,$_POST['password1']);
        $repassword =mysqli_real_escape_string($base,$_POST['password2']);

        $country =mysqli_real_escape_string($base,$_POST["pays"]);  
        $postalcode =mysqli_real_escape_string($base,$_POST["postalcode"]);
        $phone =mysqli_real_escape_string($base,$_POST["phone"]); 
        $adress =mysqli_real_escape_string($base,$_POST['adress']);
        $password =mysqli_real_escape_string($base,$_POST['password1']);
        $repassword =mysqli_real_escape_string($base,$_POST['password2']);
        $avatar = "default/img/img_not_found.jpg";

        if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($repassword) && !empty($login)) {
              
              //$niveau = $_POST['niveau'];
              $niveau = (!empty($_POST['niveau'])) ? $_POST['niveau']: "empty" ;

              $reqnumemail = "SELECT count(ID) FROM abonne WHERE E_MAIL LIKE '".$email."'";
              $result = $base->query($reqnumemail);  
              $numemail = $result->fetch_row(); 

              $reqnumlogin = "SELECT count(ID) FROM abonne WHERE LOGIN LIKE '".$login."'";
              $result2 = $base->query($reqnumlogin);  
              $numLOGIN = $result2->fetch_row(); 
  
              if ($numLOGIN['0'] == 0) {
              if ($numemail['0'] == 0) {

                   if ($password == $repassword) {
                
                      if ($niveau == "lycé") { $nv = $_POST['niveau-ly']; }
                      if ($niveau == "colège") {  $nv = $_POST['niveau-co']; }
                      if ($niveau == "Primaire") {  $nv = $_POST['niveau-pr']; }

                      if (!empty($nv)) {
                        $country = (!empty($country)) ? $country : "" ; 
                        $adress = (!empty($adress)) ? $adress : "" ;
                        $postalcode = (!empty($postalcode)) ? $postalcode : "" ;  
                        $phone = (!empty($phone)) ? $phone : "" ; 
                        $date_now = date('Y-m-d h:i:s');
                        $password = md5($password);
                        $req = "INSERT INTO `abonne` (`FIRST_NAME`, `LAST_NAME`, `LOGIN`, `PASSWORD`, `COUNTRY`, `POSTAL_CODE`, `E_MAIL`, `PHONE`,`ADDRESS`,`NIVEAU`,`NV`,`DATE_INSC`,`AVATAR`) VALUES ('$firstname', '$lastname', '$login', '$password','$country', '$postalcode', '$email', '$phone','$adress','$niveau', '$nv', '$date_now', '$avatar')";
                        $rq = mysqli_query($base,$req);
                        die("<p class='alert success'>Félicitations ! Votre nouveau compte a été créé avec succès !</p><br><center><a href='login.php'>Login</a> - <a href='index.php'>Home</a></center>");
                      }else{
                        echo "<p class='alert error'><b>Attention !</b> Veuillez remplir tous les champs obligatoires avant d'envoyer le formulaire. 1</p>";
                      }

                  }else{
                      echo "<p class='alert error'><b>Attention !</b> Verifier que les coordonnées saisie correcte...</p>";
                  }

              }else{
                  echo "<p class='alert error'><b>Attention !</b> Verifier que les coordonnées saisie correcte...<br>  votre adresse e-mail existe déjà ...</p>";
              }
              }else{
                  echo "<p class='alert error'><b>Attention !</b> Verifier que les coordonnées saisie correcte...<br>  votre Login existe déjà ...</p>";
              }
        }else{
          echo "<p class='alert error'><b>Attention !</b> Veuillez remplir tous les champs obligatoires avant d'envoyer le formulaire. 2</p>";
        }
      }

?>

<form  method='post' action="" >
<table > 
  <tr>
    <td colspan="2"><h3>Inscription</h3> </td> 
  </tr>
  <tr> <td colspan="2"><br>  </td></tr> 
  <tr>
    <td><p> Nom* : <p> </td>
    <td><input name="firstname" type="text"  /></td> 
  </tr>
  <tr>
    <td><p>Pr&eacute;nom* : <p></td>
    <td><input name="lastname" type="text"  /></td> 
  </tr> 
  <tr>
    <td><p>Niveau*  : <p></td>
    <td>
      <select name="niveau" onchange="optionniveau(this.value)">
        <option value="" selected disabled>Niveau</option>
        <option value="lycé">lycé</option>
        <option value="colège">Colège</option>
        <option value="Primaire">Primaire</option>
      </select> 
    </td>
  </tr>
  <tr><td colspan="2"> 
  <div id="tr_pri">
    <table><tr>
    <td><p>Niveau de Primaire*  : </p></td>  
    <td>
     <select name="niveau-pr"> 
       <option value="1ème année">1eme annee</option>
       <option value="2ème année">2eme annee</option>
       <option value="3ème année">3eme annee</option>
       <option value="4ème année">4eme annee</option>
       <option value="5ème année">5eme annee</option>
       <option value="6ème année">6eme annee</option>
     </select>
    </td>
    </tr></table>
  </div></td>
</tr>
  <tr><td colspan="2"> 
  <div id="tr_col">
    <table><tr> 
    <td><p>Niveau de col&egrave;ge*  : </p></td>  
    <td>
      <select name="niveau-co"> 
        <option value="7ème année">7eme annee</option>
        <option value="8ème année">8eme annee</option>
        <option value="9ème année">9eme annee</option>
      </select> 
    </td>
    </tr></table>
  </div></td>
</tr>
  <tr><td colspan="2"> 
  <div id="tr_lyc">
    <table><tr>  
    <td><p>Niveau de lyc&eacute;*  : </p></td> 
    <td>
      <select name="niveau-ly"> 
          <option value="1ème année">1eme annee</option>
          <option value="2ème année">2eme annee</option>
          <option value="3ème année">3eme annee</option>
          <option value="Bac">Bac</option>
      </select> 
    </td>
    </tr></table>
  </div></td>
</tr> 
  <tr>
    <td><p>Pays  : <p></td> 
    <td>
      <select  name="pays" >
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
                  selected="selected">France m&eacute;tropolitaine</option>
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
      <input name="adress" type="text"  />
    </td> 
  </tr> 
  <tr>
    <td><p>Code postale  : <p></td>  
    <td> <input name="postalcode" type="text" /> </td> 
  </tr>
  <tr>
    <td><p>T&eacute;l&eacute;phone  : <p></td>  
    <td> <input name="phone" type="tel" /> </td> 
  </tr>
  <tr> 
    <td><p> E-mail*  : <p></td> 
    <td><input name="email" type="email" /></td> 
  </tr>
  <tr>
    <td><p>Login*  : <p></td>  
    <td>
      <input name="login" type="text" />
    </td> 
  </tr>
  <tr>
    <td><p>Password*  : <p></td>  
    <td>
      <input name="password1" type="password" />
    </td> 
  </tr>
  <tr>
    <td><p>Re-Password* : <p></td>
    <td>
      <input name="password2"  type="password"  />
    </td> 
  </tr>  
  <tr>
    <td colspan="2"><input type="submit" name="submit" value="Submit Query" /></td>
  </tr>  
  <tr>
    <td colspan="2"><span> * champ obligatoire</span></td>
  </tr>

</table> 
</form>