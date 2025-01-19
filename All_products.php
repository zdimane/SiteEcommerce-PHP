<?php
    include("admin_area/Includes/Header.php");
   
?>

                    <!-- <div class="menu_bar">
                        <ul id="menu">
                            <li><a href="indexx.php">Home</a></li>
                            <li><a href="All_products.php">All products</a></li>
                            <li><a href="Customer/my_account.php">My account</a></li>
                            <li><a href="Cart.php">shopping cart</a></li>
                            <li><a href="Contact.php">Contact us</a></li>
                        </ul>
                    </div> -->
                    <div class="content_wrapper">
                           <div id="box">
                               <div id="BoiteProduit">
                                   <?php
                                     $get_Boite="select * from products ";
                                     $run_Boite=mysqli_query ($conn, $get_Boite);
                                     while($row_Boite=mysqli_fetch_array($run_Boite))
                                       { 
                                             $Prd_id=$row_Boite['product_id'];
                                             $Prd_Cat=$row_Boite['product_cat'];
                                             $Prd_brand=$row_Boite['product_brand'];
                                             $Prd_titre=$row_Boite['product_title'];
                                             $Prd_Prix=$row_Boite['product_price'];
                                             $Prd_Image=$row_Boite['product_image'];
                                             //imagecreatefrompng(string $Product_images): GdImage|false; 
                                             echo
                                             "
                                                 <div id='single_pro'>
                                                 <a href='Details.php?Prd_id=$Prd_id'><img src='admin_area/Product_images/$Prd_Image' width='180' height='180'/></a>
                                                 <h3>$Prd_titre</h3>
                                                 <p><b>$Prd_Prix MAD</b></p>
                                                
                                                 <a href='indexx.php?add_cart=$Prd_id'>
                                                     <button style='border-radius: 20px; width:150px;height:40px;'><i class='fa-solid fa-cart-plus'></i>  Ajouter au panier</button>
                                                 </a>
                                                 </div>
                                             ";
                                        }
                                   ?>
                                    <?php
                                       get_Product_by_categories_id();
                                   ?>
                                    <?php
                                      get_Product_by_Marque_id();
                                   ?>
                                </div><!-- Product Box -->
                           </div>
                    </div>
                     <div class="footer">
                        <h2 style="text-align:center;padding-top:30px">&copy;2022-<?php echo date('Y');?>by www.Dislog-group.com</h2>
                    </div> 
        </div>   
    </body>
</html>
<!-- <a href='Details.php?Prd_id=$Prd_id'>voir</a> -->