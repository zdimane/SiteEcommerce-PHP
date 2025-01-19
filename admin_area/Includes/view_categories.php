<div class="view_product_box">

<h2 style="color:#ab0202;">Catégories</h2>
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
               <th style="color:#ab0202;"></th> 
               <th style="color:#ab0202;">ID</th> 
               <th style="color:#ab0202;">Titre de la catégorie</th>           
               <th style="color:#ab0202;">Statut</th>               
               <th style="color:#ab0202;">Supprimer</th>               
               <th style="color:#ab0202;">Modifier</th>              
            </tr>
        </thead>
        <?php
            $all_categories=mysqli_query($conn,"select * from categories order by IdCat DESC");
            $j=1;
            while($row=mysqli_fetch_array($all_categories)){
        ?>
        <tbody>
            <tr>
                <td><input type="checkbox" name="deleteall[]" value="<?php echo $row['IdCat'];?>" /></td>
                <td><?php echo $j; ?></td> 
                <td><?php echo $row['titleCat']; ?></td>
               
                <td>
                <?php
                    if ($row['visible']==1)
                    {
                        echo "Approved";
                    }
                    else
                    {
                        echo "Pending";
                    }
                ?>
                </td>
                <td><a href="index.php?action=view_cat&delete_cat=<?php echo $row['IdCat']; ?>"style="color:white; text-decoration: none; border:0.1px solid red; background:red; ">✖ Supprimer</a></td>
                <td><a href="index.php?action=edit_cat&IdCat=<?php echo $row['IdCat']; ?>"style="color:white; text-decoration: none; border:0.1px solid green; background:green ">Modifier</a></td>
            </tr>
            <?php $j++; }  ?>
        </tbody>
    
        <tr>
            <td><input type="submit" name="delete_all" value="Suuprimer" style="border-radius: 20px;"/></td>
        </tr>
</table>
</form>
</div><!--view_product_box-->
<?php
// Delete category
    if(isset ($_GET['delete_cat']))
    {
        $delete_cat = mysqli_query($conn,"delete from categories where IdCat='$_GET[delete_cat]'");
        if ($delete_cat)
        {
            echo "<script>alert('La catégorie a été supprimée avec succès!')</script>";
            echo"<script>windows.open('index.php?acton=view_cat','_self')</script>" ;
        }
            
    }
    // Remove items selected using foreach loop
    if(isset ($_POST['deleteall']))
    {
        $remove = $_POST['deleteall'];
      foreach ($remove as $key) 
      {
            $run_remove = mysqli_query ($conn, "delete from categories where IdCat='$key'");
            if($run_remove)
            {
                echo "<script>alert('Les éléments sélectionnés ont été supprimés avec succès!')</script>";
                echo"<script>windows.open('index.php?acton=view_cat','_self')</script>" ;
            }
            else
            {
                echo "<script>alert('Mysqli Failed: mysqli_error($conn) !')</script>";
            }
            
      }
    }

?>