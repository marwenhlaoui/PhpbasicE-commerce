			<?php 
                     include('config.php');  
                      if (isset($_SESSION['user'])) {
                        if ($_SESSION['user']['ROLE'] == "1") { 

                                if (isset($_GET['id'])) {
                                    $iduser= $_GET['id'];
                                    $data = "SELECT * FROM `abonne` WHERE `ID` LIKE '".$iduser."'";
                                    $datauser = $base->query($data)->fetch_array(MYSQLI_ASSOC);
                                    if ((!empty($datauser))&&($datauser['ROLE'] != "1")) {
                                         $base->query("DELETE FROM abonne WHERE ID=".$iduser."");
                                        } 
                                       header('Location: listusers.php'); 
                                }else{
                                    header('Location: listusers.php');
                                }
                        }else{
                          header('Location:index.php');
                        }   
                      }else{  
                          header('Location:login.php');
                      } 

            ?> 