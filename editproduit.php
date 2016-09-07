			<?php 
                     include('config.php');  
                    if (isset($_GET['num'])) {
                        $idproduit = $_GET['num'];
                        $data = "SELECT * FROM `produit` WHERE `id` LIKE '".$idproduit."'";
                        $dataproduit = $base->query($data)->fetch_array(MYSQLI_ASSOC);
                        if (empty($dataproduit)) {
                           header('Location: list_produit.php');
                         } 
                    }else{
                        header('Location: list_produit.php');
                    }

            ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <script type="text/javascript" src="<?php echo $design; ?>/script.js"></script> 
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $design; ?>/ion/css/ionicons.min.css"> 
        <title>Modifier <?php echo $dataproduit['nom'];?></title>
    </head>
    <body>
        <div class="header">
            <a href="<?php echo $url_home; ?>"><img class="logo" src="<?php echo $design; ?>/img/logo.png" alt="Espace Membre" /></a>
        </div>
        <div class="body">
    		<div class="divleft"></div>
    		<div class="content"> <?php include('include/content/form_editproduit.php'); ?> </div>
    		<div class="divright">
    			<?php include('include/divright/user.php');  ?>
    		</div> 
    		<?php include('include/footer.php'); ?>