<head><link href="style/sst.css" type="text/css" rel="stylesheet"></head>
<div class="form_box">

     <form method="post" enctype="multipart/form-data">
       <table align="center" width="100%">
            <tr >
            <td colspan="7">
                <h2 style="color:#ab0202;">Ajouter une marque</h2>
                <div class="botom"></div><!--bottom-->
            </td>
            </tr>
            <tr>
                <td><b>Ajouter une nouvelle marque : </b></td>
                <td><input type="text" name="product_cat" size="60" required/></td>
            </tr>
           
            <tr>
                <td></td>
                <td colspan="7"><input type="submit" name="insert_brand" value="Ajouter" style="border-radius: 20px;"/></td>
            </tr>

       </table>
     </form>
</div><!--form_box-->
<?php
    if(isset ($_POST['insert_brand']))
    {
        $product_brand=mysqli_real_escape_string($conn,$_POST['product_cat']);
       
        $insert_brand=mysqli_query($conn,"insert into marques (TitleMarque) values ('$product_brand')");
        if ($insert_brand) 
        {
           echo "<script>alert ('La marque du produit a été insérée avec succès!')</script>";
           echo"<script>window.open(window.location.href,'_self')</script>";
        }        
    }
    
?>

<!-- action="insert_product.php" -->