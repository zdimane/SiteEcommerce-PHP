<head><link href="style/sst.css" type="text/css" rel="stylesheet"></head>
<?php
    $edit_product=mysqli_query($conn,"select * from products where product_id='$_GET[product_id]'");
    $fetch_edit=mysqli_fetch_array($edit_product);
?>
<div class="form_box">

     <form method="post" enctype="multipart/form-data">
       <table align="center" width="100%">
            <tr >
            <td colspan="7">
                <h2 style="color:#ab0202;">Modifier le produit</h2>
                <div class="botom"></div><!--bottom-->
            </td>
            </tr>
            <tr>
                <td><b>Titre du produit:</b></td>
                <td><input type="text" name="product_title" value="<?php echo $fetch_edit['product_title']; ?>" size="60" required/></td>
            </tr>
            <tr>
                <td><b>catégorie de produit:</b></td>
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
                                if($fetch_edit['product_cat']==$IdCat)
                                {
                                    echo "<option value='$fetch_edit[product_cat]' selected>$TitleCat</option>";
                                }
                                else
                                {
                                    echo "<option value='$IdCat'>$TitleCat</option>";
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>Product Brand:</b></td>
                <td>
                    <select name="product_brand">
                        <option>Marque de produit</option>
                        <?php
                            $get_Marque="select * from marques";
                            $run_Marque=mysqli_query($conn, $get_Marque);
                            while($row_Marque=mysqli_fetch_array($run_Marque))
                            {
                                $IdMarque=$row_Marque['IdMarque'];
                                $TitleMarque=$row_Marque['TitleMarque'];
                                if($fetch_edit['product_brand']==$IdMarque)
                                {
                                    echo "<option value='$fetch_edit[product_brand]' selected>$TitleMarque</option>";
                                }
                                else
                                {
                                    echo "<option value='$IdMarque'>$TitleMarque</option>";
                                }                             
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td valign="top"><b>Image du produit: </b></td>
                <td>
                    <input type="file" name="product_image" />
                    <div class="edit_image">
                        <img src="Product_images /<?php echo $fetch_edit['product_image']; ?> " width="100" height="70"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td><b>Prix ​​du produit: </b></td>
                <td><input type="text" name="product_price" value="<?php echo $fetch_edit['product_price']; ?>" /></td>
            </tr>
            <tr>
                <td valign="top"><b>Description du produit:</b></td>
                <td><textarea name="product_desc" value="<?php echo $fetch_edit['product_desc']; ?>" rows="10"></textarea></td>
            </tr>
            <tr>
                <td ><b>Mots clés du produit: </b></td>
                <td><input type="text" name="product_keywords" value="<?php echo $fetch_edit['product_keywords']; ?>" /></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="7"><input type="submit" name="edit_product" value="Enregistrer" style="border-radius: 20px;"/></td>
            </tr>
       </table>
     </form>
</div><!--form_box-->
<?php
    if(isset ($_POST['edit_product']))
    {
        
        $product_title=trim(mysqli_real_escape_string($conn,$_POST['product_title']));
        $product_cat=$_POST['product_cat'];
        
        $product_brand=$_POST['product_brand'];
        $product_price=$_POST['product_price'];
        $product_desc= trim (mysqli_real_escape_string ($conn, $_POST['product_desc']));
        $product_keywords=$_POST['product_keywords'];
        $date=date("F d, Y");
        // Getting the image from the field
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES ['product_image']['tmp_name'];
        if(!empty($_FILES['product_image']['name']))
        {
            if(move_uploaded_file ($product_image_tmp, "Product_images/$product_image"))
            {
                $update_product=mysqli_query($conn,"update products set product_cat='$product_cat',
                product_brand='$product_brand',product_title='$product_title',product_price='$product_price',
                product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords',date='$date' where product_id='$_GET[product_id]'");
            }
        }
        else
        {
            $update_product=mysqli_query($conn,"update products set product_cat='$product_cat',product_brand='$product_brand',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_keywords='$product_keywords',date='$date' where product_id='$_GET[product_id]'");
        }
        if($update_product)
        {
            echo "<script>alert('Le produit a été mis à jour avec succès ! ')</script>";
            echo"<script>window.open(window.location.href,'_self')</script>";
        } 
    } 
?>

<!-- action="insert_product.php" -->