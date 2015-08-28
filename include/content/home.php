Bonjour<?php if(isset($_SESSION['user'])){echo ' '.htmlentities($_SESSION['user']['LAST_NAME'], ENT_QUOTES, 'UTF-8');} ?>,<br />
Bienvenue sur notre site.<br />
Vous pouvez <a href="list_produit.php">voir la liste des produits</a>.<br /><br />