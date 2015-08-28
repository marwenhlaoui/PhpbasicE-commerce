<?php
	if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['ROLE'] == "1") {
          
		    $allusers = "SELECT * FROM `abonne`";
		    $users = $base->query($allusers); 

        }else{
          header('Location:index.php');
        }   
      }else{  
          header('Location:login.php');
      }
?>
   
		<div class="table_list"> 
			<table>
		      <thead>
		        <tr>
		          <th>#</th>
		          <th>Avatar</th>
		          <th>Nom</th>
		          <th>E-mail</th>
		          <th>Login</th>
		          <th></th>
		        </tr>
		      </thead>
		      <tbody>
<?php  while($user = $users->fetch_array()) {?>
		<?php if ($user['ROLE'] == "1") { ?>
		        <tr>
		          <td><?php echo $user['ID'];?></td>
		          <td><img src="<?php echo $user['AVATAR'];?>"></td>
		          <td><?php echo $user['LAST_NAME']." ".$user['FIRST_NAME']; ?></td>
		          <td><?php echo $user['E_MAIL'];?></td>
		          <td><?php echo $user['LOGIN'];?></td>
		          <td><a href="admin.php" class="option"><i class="ion ion-person"></i></a></td>
		        </tr> 
		<?php }else{?>
		        <tr>
		          <td><?php echo $user['ID'];?></td>
		          <td><img src="<?php echo $user['AVATAR'];?>"></td>
		          <td><?php echo $user['LAST_NAME']." ".$user['FIRST_NAME']; ?></td>
		          <td><?php echo $user['E_MAIL'];?></td>
		          <td><?php echo $user['LOGIN'];?></td>
		          <td><a href="delete_user.php?id=<?php echo $user['ID'];?>" class="delete"><i class="ion ion-trash-a"></i></a></td>
		        </tr>  
<?php }}?>
		      </tbody>
		    </table>   
		</div>