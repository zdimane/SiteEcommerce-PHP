<?php
    include("admin_area/Includes/Header.php");
   
?>
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
                                   <table>
                                       <tr>
                                  <?php
                                    if(isset($_GET['Prd_id']))
                                    {
                                        // echo $_GET['Prd_id'];
                                        $product_id=$_GET['Prd_id'];
                                        $run_query_by_prd_id=mysqli_query($conn,"select * from products where product_id='$product_id'");
                                        while($row_prd=mysqli_fetch_array($run_query_by_prd_id))
                                        {
                                            $Prd_id=$row_prd['product_id'];
                                            $Prd_Cat=$row_prd['product_cat'];
                                            $Prd_brand=$row_prd['product_brand'];
                                            $Prd_titre=$row_prd['product_title'];
                                            $Prd_Prix=$row_prd['product_price'];
                                            $Prd_Image=$row_prd['product_image'];
                                            $Prd_desc=$row_prd['product_desc'];
                                            //imagecreatefrompng(string $Product_images): GdImage|false; 
                                            echo
                                            "
                                                <div id='single_pro'>
                                                <img src='admin_area/Product_images/$Prd_Image' width='180' height='180'/>
                                                <h4>$Prd_titre</h4>
                                                <p><b>Prix: $Prd_Prix MAD</b></p>
                                               
                                                <a href='indexx.php?add_cart=$Prd_id'>
                                                    <button style='border-radius: 20px;'><i class='fa-solid fa-cart-plus'></i>  Ajouter au panier</button>
                                                </a>
                                                </div>
                                            ";
                                        }
                                    }
                                  ?>
                                  </tr>
                                  <tr><?php
                                   echo"<h1>$Prd_desc</h1>";
                                   
                                  ?></tr>
                                  </table>
                                </div><!-- Product Box -->
                           </div>
                    </div>
                     <!-- <div class="footer">
                        <h2 style="text-align:center;padding-top:30px">&copy;2022-<?php echo date('Y');?>by www.Dislog-group.com</h2>
                    </div>  -->
        </div>   
    </body>
</html>