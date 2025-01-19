<head><link href="style/sst.css" type="text/css" rel="stylesheet"></head>
<?php
    $edit_brand=mysqli_query($conn,"select * from marques where IdMarque='$_GET[IdMarque]'");
    $fetch_brand=mysqli_fetch_array($edit_brand);
?>
<div class="form_box">

     <form method="post" enctype="multipart/form-data">
       <table align="center" width="100%">
            <tr >
            <td colspan="7">
                <h2 style="color:#ab0202;">Modifier la marque</h2>
                <div class="botom"></div><!--bottom-->
            </td>
            </tr>
            <tr>
                <td><b>Modifier la marque : </b></td>
                <td><input type="text" name="product_brand" value="<?php echo $fetch_brand['TitleMarque']; ?>" size="60" required/></td>
            </tr>
           
            <tr>
                <td></td>
                <td colspan="7"><input type="submit" name="edit_brand" value="Enregistrer" style="border-radius: 20px;"/></td>
            </tr>

       </table>
     </form>
</div><!--form_box-->
<?php
    if(isset ($_POST['edit_brand']))
    {
        $brand_title=mysqli_real_escape_string($conn,$_POST['product_brand']); //<!--product_cat-->   
        $edit_brand=mysqli_query($conn,"update marques set TitleMarque='$brand_title' where IdMarque='$_GET[IdMarque]'");
        if ($edit_brand) 
        {
            echo "<script>alert('La marque a été mise à jour avec succès ! ')</script>";
            echo"<script>window.open(window.location.href,'_self')</script>";
        }        
    }
    
?>

<!-- action="insert_product.php" -->