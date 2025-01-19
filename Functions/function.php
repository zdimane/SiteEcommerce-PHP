<?php
    $conn = new mysqli("localhost", "root", "", "ecommerce_cms","3307");
    if(mysqli_connect_error())
    {
        echo"the connexion was not established  ".mysqli_connect_error();
    }

    function getCats()
    {
        global $conn;
        $get_cats="select * from categories";
        $run_cats=mysqli_query($conn, $get_cats);
        while($row_cats=mysqli_fetch_array($run_cats))
        {
            $IdCat=$row_cats['IdCat'];
            $TitleCat=$row_cats['titleCat'];
            echo"<li><a href='indexx.php?cat=$IdCat'>$TitleCat</a></li>";
        }
    }

    function Brands()
    {
        global $conn;
        $get_Marque="select * from marques";
        $run_Marque=mysqli_query($conn, $get_Marque);
        while($row_Marque=mysqli_fetch_array($run_Marque))
        {
            $IdMarque=$row_Marque['IdMarque'];
            $TitleMarque=$row_Marque['TitleMarque'];
            echo"<li><a href='indexx.php?Marque=$IdMarque'>$TitleMarque</a></li>";
        }
    }

    // ___________________________________________Les fontion diyal l code diyal la barre li f janb________________________________________
    function get_Product()
    {
        if(!isset($_GET['cat']))
        {
            if(!isset($_GET['Marque']))
            {
                global $conn;
                $get_Boite="select * from products order by RAND() LIMIT 0,6";
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
            }

        }
    }

    function get_Product_by_categories_id()
    {
        if(isset($_GET['cat']))
        {
            global $conn;
            $IdCat=$_GET['cat'];
            $get_CategoriesPro="select * from products where product_cat=$IdCat";
            $run_CategoriesPro=mysqli_query($conn,$get_CategoriesPro);
            $CountCategories=mysqli_num_rows($run_CategoriesPro);
            if($CountCategories==0)
            {
                echo"<h2 style='padding:20px;'>No product where found in this Categories!! </h2>";
            }
            while ($rowCatPrd= mysqli_fetch_array ($run_CategoriesPro)){
                $Prd_id=$rowCatPrd['product_id'];
                $Prd_Cat=$rowCatPrd['product_cat'];
                $Prd_brand=$rowCatPrd['product_brand'];
                $Prd_titre=$rowCatPrd['product_title'];
                $Prd_Prix=$rowCatPrd['product_price'];
                $Prd_Image=$rowCatPrd['product_image'];
                
                
                echo"
                    <div id='single_pro'>
                    
                    <a href='Details.php?Prd_id=$Prd_id'><img src='admin_area/Product_images/$Prd_Image' width='180' height='180'/></a>
                    <h3>$Prd_titre</h3>
                    <p><b>Price: $Prd_Prix MAD</b></p>
                   
                    <a href='indexx.php?add_cart=$Prd_id'>
                        <button style='border-radius: 20px; width:150px;height:40px;'><i class='fa-solid fa-cart-plus'></i>  Ajouter au panier</button>
                        
                    </a>
                    </div>
                ";
            }
        }
    }

    function get_Product_by_Marque_id()
    {
        if(isset($_GET['Marque']))
        {
            global $conn;
            $IdMarque=$_GET['Marque'];
            $get_MarquePro="select * from products where product_brand=$IdMarque";
            $run_MarquePro=mysqli_query($conn,$get_MarquePro);
            $CountMarque=mysqli_num_rows($run_MarquePro);
            if($CountMarque==0)
            {
                echo"<h2 style='padding:20px;'>No product where found in this Brands!!</h2>";
            }
            while($rowMarPrd=mysqli_fetch_array($run_MarquePro))
            {
                $Mar_id=$rowMarPrd['product_id'];
                $Mar_Cat=$rowMarPrd['product_cat'];
                $Mar_brand=$rowMarPrd['product_brand'];
                $Mar_titre=$rowMarPrd['product_title'];
                $Mar_Prix=$rowMarPrd['product_price'];
                $Mar_Image=$rowMarPrd['product_image'];
                echo"
                     <div id='single_pro'>
                         
                     <a href='Details.php?Prd_id=$Mar_id'><img src='admin_area/Product_images/$Mar_Image' width='180' height='180'/></a>
                        <h3>$Mar_titre</h3>
                         <p><b>Price: $Mar_Prix MAD</b></p>
                         
                         <a href='indexx.php?add_cart=$Mar_id'>
                             <button style='border-radius: 20px; width:150px;height:40px;'><i class='fa-solid fa-cart-plus'></i>  Ajouter au panier</button>
                             
                         </a>
                     </div>
                ";
            }
        }
    }
    
    // __________________________________________________Janb_______________________________________________________________________
    function getipAddress(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    function totalPanier()
    {
        global $conn;
        $ip=getipAddress();
        $run_items=mysqli_query($conn,"select * from cart where ip_address='$ip'");
        echo $count_items=mysqli_num_rows($run_items);
    }
    
    function Add_cart()
    {
        //______________________ajouter dans table 'cart' le nombre de produit_________________________________________
        global $conn;
        if(isset($_GET['add_cart']))
        {
            //echo $_GET['add_cart'];
            $product_id= $_GET['add_cart'];
            $ip=getipAddress();
            $run_check=mysqli_query($conn,"select * from cart where product_id='$product_id'");
            if(mysqli_num_rows( $run_check)>0)
            {
                echo "";
            }
            else
            {
                $fetch_pro=mysqli_query($conn,"select * from products where product_id='$product_id'");
                $fetch_pro=mysqli_fetch_array($fetch_pro);
                $pro_title=$fetch_pro['product_title'];

                $insert_pro=mysqli_query($conn, "insert into cart (product_id,product_title,ip_address) values ('$product_id','$pro_title','$ip')");

                echo"<script>window.open('indexx.php','_self')</script>";
            }
        }
    }

    function total_price () 
    {
        global $conn;
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
                
                // Getting Quality of the product
                 $run_qty= mysqli_query ($conn, "select * from cart where product_id= '$product_id'");
                 $row_qty =mysqli_fetch_array ($run_qty) ;
                 $qty = $row_qty['quality'];
                 $values_qty =$values * $qty;
                $total += $values_qty;
            }
        }
        echo $total ." MAD";     
    }
?>
