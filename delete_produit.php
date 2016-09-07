			<?php 
                     include('config.php');  
                      if (isset($_SESSION['user'])) {
                        if ($_SESSION['user']['ROLE'] == "1") { 

                                if (isset($_GET['num'])) {
                                    $idproduit = $_GET['num'];
                                    $data = "SELECT * FROM `produit` WHERE `id` LIKE '".$idproduit."'";
                                    $dataproduit = $base->query($data)->fetch_array(MYSQLI_ASSOC);
                                    if (!empty($dataproduit)) {
                                         $base->query("DELETE FROM produit WHERE id=".$idproduit."");
                                        } 
                                       header('Location: list_produit.php'); 
                                }else{
                                    header('Location: list_produit.php');
                                }
                        }else{
                          header('Location:index.php');
                        }   
                      }else{  
                          header('Location:login.php');
                      } 

            ?> 