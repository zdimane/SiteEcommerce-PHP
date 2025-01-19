<?php
    //include("admin_area/Includes/Header.php");
   
?>

                    <!-- <div class="menu_bar">
                        <ul id="menu">
                            <li><a href="indexx.php">Home</a></li>
                            <li><a href="All_products.php">All_products</a></li>
                            <li><a href="Customer/my_account.php">My account</a></li>
                            <li><a href="Cart.php">shopping_cart</a></li>
                            <li><a href="Contact.php">Contact us</a></li>
                        </ul>
                    </div> -->
                    <div class="content_wrapper">
                        <!-- <div id="sidebar">
                            <div id="sidebar_title">Categories</div>
                            <ul id="cats">
                                <?php
                                //    getCats();
                                ?>
                            </ul>
                            <div id="sidebar_title">Brands</div>
                            <ul id="cats">
                                <?php
                                    // Brands();
                                ?>
                                
                            </ul>
                        </div>  -->
                           <div id="box">
                               <div id="BoiteProduit">
                                   <?php
                                        if(isset($_GET['search']))
                                        {
                                            $search_query=$_GET['user_query'];
                                            $run_query_by_prd_id=mysqli_query($conn,"select * from products where product_keywords like'%$search_query%'");
                                            while($row_prd=mysqli_fetch_array($run_query_by_prd_id))
                                            {
                                                $Prd_id=$row_prd['product_id'];
                                                $Prd_Cat=$row_prd['product_cat'];
                                                $Prd_brand=$row_prd['product_brand'];
                                                $Prd_titre=$row_prd['product_title'];
                                                $Prd_Prix=$row_prd['product_price'];
                                                $Prd_Image=$row_prd['product_image'];
                                                //imagecreatefrompng(string $Product_images): GdImage|false; 
                                                echo
                                                "
                                                    <div id='single_pro'>
                                                       <a href='Details.php?Prd_id=$Prd_id'><img src='admin_area/Product_images/$Prd_Image' width='180' height='180'/></a>
                                                        <h3>$Prd_titre</h3>
                                                        <p><b>Prix:$Prd_Prix MAD</b></p>
                                                       
                                                        <a href='indexx.php?add_cart=$Prd_id'>
                                                            <button style='border-radius: 20px; width:150px;height:40px;'><i class='fa-solid fa-cart-plus'></i>  Ajouter au panier</button>
                                                        </a>
                                                    </div>
                                                ";
                                            }
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
                     <!-- <div class="footer">
                        <h2 style="text-align:center;padding-top:30px">&copy;2022-<?php echo date('Y');?>by www.Dislog-group.com</h2>
                    </div>  -->
        </div>   
    </body>
</html>