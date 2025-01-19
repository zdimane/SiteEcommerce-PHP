<head><link href="style/sst.css" type="text/css" rel="stylesheet"></head>
<?php
    $edit_cat=mysqli_query($conn,"select * from categories where IdCat='$_GET[IdCat]'");
    $fetch_cat=mysqli_fetch_array($edit_cat);
?>
<div class="form_box">

     <form method="post" enctype="multipart/form-data">
       <table align="center" width="100%">
            <tr >
            <td colspan="7">
                <h2 style="color:#ab0202;">Modifier la catégorie</h2>
                <div class="botom"></div><!--bottom-->
            </td>
            </tr>
            <tr>
                <td><b>Modifier la catégorie : </b></td>
                <td><input type="text" name="product_cat" value="<?php echo $fetch_cat['titleCat']; ?>" size="60" required/></td>
            </tr>
           
            <tr>
                <td></td>
                <td colspan="7"><input type="submit" name="edit_cat" value="Enregistrer" style="border-radius: 20px;"/></td>
            </tr>

       </table>
     </form>
</div><!--form_box-->
<?php
    if(isset ($_POST['edit_cat']))
    {
        $cat_title=mysqli_real_escape_string($conn,$_POST['product_cat']); //<!--product_cat-->   
        $edit_cat=mysqli_query($conn,"update categories set titleCat='$cat_title' where IdCat='$_GET[IdCat]'");
        if ($edit_cat) 
        {
            echo "<script>alert('La catégorie a été mise à jour avec succès ! ')</script>";
            echo"<script>window.open(window.location.href,'_self')</script>";
        }        
    }
    
?>

<!-- action="insert_product.php" -->