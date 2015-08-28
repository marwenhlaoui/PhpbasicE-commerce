<?php
include('config.php'); 
 //  var_dump($_SESSION);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <script type="text/javascript" src="<?php echo $design; ?>/script.js"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $design; ?>/ion/css/ionicons.min.css"> 
        <link rel="shortcut icon" href="<?php echo $design; ?>/img/logo.ico" type="image/x-icon">
        <title><?php echo $title;?></title>
    </head>
    <body>
		<div class="header">
        	<a href="<?php echo $url_home; ?>">
                <img class="logo2 lpic" src="<?php echo $design; ?>/img/logo1.png" />
                <img class="logo2" src="<?php echo $design; ?>/img/logo2.png" />
            </a>
	    </div>
    	<div class="body">