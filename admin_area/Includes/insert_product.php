<head><link href="style/sst.css" type="text/css" rel="stylesheet"></head>
<div class="form_box">

     <form method="post" enctype="multipart/form-data">
       <table align="center" width="100%">
            <tr >
            <td colspan="7">
                <h2 style="color:#ab0202;">Ajouter un produit</h2>
                <div class="botom"></div><!--bottom-->
            </td>
            </tr>
            <tr>
                <td><b>Titre du produit:</b></td>
                <td><input type="text" name="product_title" size="60" required/></td>
            </tr>
            <tr>
                <td><b>Catégorie de produit:</b></td>
                <td>
                    <select name="product_cat">
                        <option>Choisir une catégorie</option>
                        <?php
                            $get_cats="select * from categories";
                            $run_cats=mysqli_query($conn, $get_cats);
                            while($row_cats=mysqli_fetch_array($run_cats))
                            {
                                $IdCat=$row_cats['IdCat'];
                                $TitleCat=$row_cats['titleCat'];
                                echo "<option value='$IdCat'>$TitleCat</option>";

                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>Marque de produit:</b></td>
                <td>
                    <select name="product_brand">
                        <option>Sélectionnez une marque</option>
                        <?php
                            $get_Marque="select * from marques";
                            $run_Marque=mysqli_query($conn, $get_Marque);
                            while($row_Marque=mysqli_fetch_array($run_Marque))
                            {
                                $IdMarque=$row_Marque['IdMarque'];
                                $TitleMarque=$row_Marque['TitleMarque'];
                                echo "<option value='$IdMarque'>$TitleMarque</option>";

                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>Image du produit: </b></td>
                <td><input type="file" name="product_image" required/></td>
            </tr>
            <tr>
                <td><b>Prix ​​du produit: </b></td>
                <td><input type="text" name="product_price" required/></td>
            </tr>
            <tr>
                <td valign="top"><b>Description du produit:</b></td>
                <td><textarea name="product_desc" rows="10" required></textarea></td>
            </tr>
            <tr>
                <td ><b>Mots clés du produit: </b></td>
                <td><input type="text" name="product_keywords" required/></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="7"><input type="submit" name="insert_post" value="Ajouter un produit" style="border-radius: 20px;"/></td>
            </tr>

       </table>
     </form>
</div><!--form_box-->
<?php
    if(isset ($_POST['insert_post']))
    {
        // $product_brand = $_POST['product_brand'];
        // echo $product_brand;
        $product_title=$_POST['product_title'];
        $product_cat=$_POST['product_cat'];
        // $product_brand=$_POST['product_brand'];
        // $product_brand=isset($_POST['product_brand'])?$_POST['product_brand']:NULL;
        $product_brand=$_POST['product_brand'];
        $product_price=$_POST['product_price'];
        $product_desc= trim (mysqli_real_escape_string ($conn, $_POST['product_desc']));
        $product_keywords=$_POST['product_keywords'];

        // Getting the image from the field
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES ['product_image']['tmp_name'];
        move_uploaded_file ($product_image_tmp, "Product_images/$product_image");
        $insert_product = " insert into products (product_cat,product_brand,product_title,Product_price,product_desc,product_image,product_keywords) 
        values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
        $insert_pro=mysqli_query ($conn, $insert_product);
        if ($insert_pro) 
        {
           echo "<script>alert ('Le produit a été inséré avec succès!')</script>";
           //echo "<script>window.open ('indexx.php?insert_product.php','_self')</script>";
        }        
    }
    
?>

<!-- action="insert_product.php" -->