<?php
	if (isset($_SESSION['user'])) {
		if ($_SESSION['user']['ROLE'] == "1") {
			include('include/divright/admin_option.php');
		}else{
			include('include/divright/profil_option.php');
		} 	
	}else{ 
        include('include/divright/no_auth.php'); 
	}
?>