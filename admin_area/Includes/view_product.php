<div class="view_product_box">

<h2 style="color:#ab0202;">Produits</h2>
<hr/>
<head><link href="style/sst.css" type="text/css" rel="stylesheet"></head>
<div class="border_bottom"></div>

<form action="" method="post" enctype="multipart/form-data">
    <!-- <div class="search_admin">
        <input type="text" id="search" placeholder="Type to search..."/>
    </div> -->
    <table with="100%">
        <thead>
            <tr>
                <th style="color:#ab0202;">Check</th> 
               <th style="color:#ab0202;">ID</th> 
               <th style="color:#ab0202;">Titre</th>        
               <th style="color:#ab0202;">Prix</th>           
               <th style="color:#ab0202;">Image</th>               
               <th style="color:#ab0202;">Vues</th>               
               <th style="color:#ab0202;">Date</th>               
               <th style="color:#ab0202;">Statut</th>               
               <th style="color:#ab0202;">Supprimer</th>               
               <th style="color:#ab0202;">Modifier</th>              
            </tr>
        </thead>
        <?php
            $all_product=mysqli_query($conn,"select * from products order by product_id DESC");
            $j=1;
            while($row=mysqli_fetch_array($all_product)){
        ?>
        <tbody>
            <tr>
                <td><input type="checkbox" name="deleteall[]" value="<?php echo $row['product_id'];?>" /></td>
                <td><?php echo $j; ?></td> 
                <td><?php echo $row['product_title']; ?></td>
                <td><?php echo $row['product_price']; ?>MAD</td>
                <td><img src="Product_images/<?php echo $row['product_image']; ?> " width="70" height="50" /></td>
                <td><?php echo $row['views']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td>
                <?php
                    if ($row['visible']==1)
                    {
                        echo "Approuvé";
                    }
                    else
                    {
                        echo "en attendant";
                    }
                ?>
                </td>
                <td><a href="index.php?action=view_product&delete_product=<?php echo $row['product_id']; ?>"style="color:white; text-decoration: none; border:0.1px solid red; background:red; ">✖Supprimer</a></td>
                <td><a href="index.php?action=edit_pro&product_id=<?php echo $row['product_id']; ?>" style="color:white; text-decoration: none; border:0.1px solid green; background:green ">Modifier</a></td>
            </tr>
            <?php $j++; }  ?>
        </tbody>
    
        <tr>
            <td><input type="submit" name="delete_all" value="Remove" style="border-radius: 20px;"/></td>
        </tr>
</table>
</form>
</div><!--view_product_box-->
<?php
// Delete Product
    if(isset ($_GET['delete_product']))
    {
        $delete_product = mysqli_query($conn,"delete from products where product_id='$_GET[delete_product]'");
        if ($delete_product)
        {
            echo "<script>alert('Le produit a été supprimé avec succès!')</script>";
            echo"<script>windows.open('index.php?acton=view_product','_self')</script>" ;
        }
            
    }
    // Remove items selected using foreach loop
    if(isset ($_POST['deleteall']))
    {
        $remove = $_POST['deleteall'];
      foreach ($remove as $key) 
      {
            $run_remove = mysqli_query ($conn, "delete from products where product_id='$key'");
            if($run_remove)
            {
                echo "<script>alert('Les éléments sélectionnés ont été supprimés avec succès!')</script>";
                echo"<script>windows.open('index.php?acton=view_product','_self')</script>" ;
            }
            else
            {
                echo "<script>alert('Mysqli Failed: mysqli_error($conn) !')</script>";
            }
            
      }
    }

?>