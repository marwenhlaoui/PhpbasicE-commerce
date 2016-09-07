<?php
	
	 
	if (isset($_POST['install'])) {
		$hostname = $_POST['hostname'];
		$username = $_POST['user'];
		$userpassword = $_POST['password'];
		$_database = $_POST['db'];
		$seed = (!empty($_POST['seed'])) ? true : false ;
		
		if (!empty($hostname)&&!empty($username)&&!empty($_database)) {
			$userpassword = ($userpassword == "null") ? null : $userpassword ;
			$data = [
				'host' => $hostname,
				'root' => $username,
				'pass' => $userpassword,
				'db' => $_database,
			];
			$file = fopen("app/app.config","w");
			fwrite($file,json_encode($data));
			fclose($file);
			$link = mysqli_connect($hostname, $username, $userpassword); 
			$queryDB = "CREATE DATABASE IF NOT EXISTS ".$_database; 
			mysqli_query($link, $queryDB); 
			mysqli_select_db($link, $_database);
			if (!mysqli_connect_errno()) {
				$database_dir = "database/Table/";
				$seed_dir = "database/Seed/";
				require_once $database_dir."LoadData.php";
				foreach ($tabelFile as $table) {
					$query = file_get_contents($database_dir.$table); 
					mysqli_query($link, $query);  
				}
				if ($seed == true) {  
					require_once $seed_dir."SeedDatabase.php";
					foreach ($seedFile as $seed) {
						$query = file_get_contents($seed_dir.$seed); 
						mysqli_query($link, $query);  
					} 
				}
			}
			

    		header('location:index.php');
		}else{
			$msg = "Error Data ...";
		}
	}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Php basic E-commerce </title> 
    <link href="default/style.css" rel="stylesheet"> 
  </head>
  <body>
    
        <div class="sql_pg">
        	<?php if(!empty($msg)):?>
        	<div class="alert error"><?= $msg ?></div>
        	<?php endif; ?>
        	<h2>Créer votre configuration de base de données</h2>
			<br>
        	<form action="" method="post">
        		<input type="text" name="hostname" placeholder="Host Name">
        		<input type="text" name="user" placeholder="User Name">
        		<input type="password" name="password" placeholder="User Password">
        		<input type="text" name="db" placeholder="Database Name">
        		<label class="lab_chek"><br>
        			<input type="checkbox" name="seed">
        			générer des données virtuel
        		</label>
        		<input type="submit" name="install" value="Installer">
        	</form>
        </div>
 
  </body>
</html>