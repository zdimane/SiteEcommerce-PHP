<?php
    include("admin_area/Includes/Header.php");
   
?>
        <div class="content_wrapper">
            <div class="shopping_cart_c"><!--shopping cart_container-->
                    <div id="Shopping_cart" align="right" style="padding:15px" >
                        <?php
                            if (isset ($_SESSION['customer_email']))
                            {
                            echo "<b>Your Email:</b>" . $_SESSION['customer_email'];
                            }
                            else
                            {
                                echo "";
                            }
                            
                        ?>
                        
                        <b style="color:navy"> </b> Produit : <?php totalPanier(); ?> Le prix total : <?php total_price () ; ?>

                    </div>
                    <form action="" method="post" enctype="multipart/form-data"> 
                    <table align="center" width="100%">
                            <tr align="center">
                                <th>Supprimer</th>
                                <th>Produit</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                            </tr>
                            <?php
                            $total = 0;
                            $ip = getipAddress ();
                            $run_cart=mysqli_query ($conn, "select * from cart where ip_address='$ip'");

                            while ($fetch_cart=mysqli_fetch_array ($run_cart))
                            {
                                $product_id = $fetch_cart['product_id'];
                                $result_product=mysqli_query ($conn, "select * from products where product_id = '$product_id'");
                                while ($fetch_product = mysqli_fetch_array ($result_product))
                                {
                                    $product_price = array ($fetch_product['product_price']);
                                    $product_title = $fetch_product['product_title'];
                                    $product_image = $fetch_product['product_image'];
                                    $sing_price = $fetch_product['product_price'];
                                    $values = array_sum ($product_price);
                                    // Getting Quantity of the product
                                    $run_qty= mysqli_query ($conn, "select * from cart where product_id= '$product_id'");
                                    $row_qty =mysqli_fetch_array ($run_qty) ;
                                    $qty = $row_qty['quality'];
                                    $values_qty =$values * $qty;
                                    $total += $values;               
                            ?>
                            <tr align="center">
                                <td><input type="checkbox" name="remove[]" value="<?php echo $product_id; ?>"/>check box</td>
                                <td><?php echo $product_title;?>
                                <br />
                                <img src="admin_area/product_images/<?php echo $product_image; ?> "  />
                                </td>
                                <td><input type="number" name="qty" size="4" value="<?php echo $qty; ?>"/></td>
                                <!-- <td>Price</td> -->
                                <td><?php echo $sing_price;?> MAD</td>
                            </tr>
                            <?php } } // End While ?>
                            <tr> 
                                <td colspan="4" align="right"><b> Total:</b></td>
                                <td><?php echo  total_price (); ?> </td>
                            </tr>
                            <tr align="center">
                                <td colspan="2"><input type="submit" name="update_cart" value="Modifier" style="border-radius: 20px;"/></td>
                                <td><input type="submit" name="continue" value="Continuer vos achats" style="border-radius: 20px;"/></td>
                                <!-- <td><button style="border-radius: 20px;"><a href="checkout.php" style="text-decoration:none;color:white; border-radius: 20px;">Checkout</a></button></td> -->
                                <!-- <td><button style="border-radius: 20px;"><a href="payment.php" style="text-decoration:none;color:white; border-radius: 20px;">Checkout</a></button></td> -->
                            </tr>
                        </table>
                    </form>
                    <?php
                        if (isset ($_POST ['remove'])) 
                        {
                            foreach ($_POST['remove'] as $remove_id) 
                            {
                                $supprimer=mysqli_query($conn,"delete from cart where product_id='$remove_id' AND ip_address='$ip'");
                                if($supprimer)
                                {
                                    echo"<script>window.open('Cart.php','_self')</script>";
                                }
                            }
                        }
                        if (isset ($_POST['continue']))
                        {
                            echo "<script>window.open('indexx.php','_self')</script>";
                        }
                    ?>
            </div><!--shopping cart_container-->
            
                <div id="box">
                    
                    <div id="BoiteProduit">
                        
                    </div><!-- Product Box -->
                </div>
        </div>         
        </div>   
   