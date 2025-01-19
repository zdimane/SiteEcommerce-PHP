<div class="view_product_box">

<h2 style="color:#ab0202;">Utilisateurs</h2>
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
               <th style="color:#ab0202;"><!-- <input type="checkbox" id="checkAll"/> -->Check</th> 
               <th style="color:#ab0202;">ID</th> 
               <th style="color:#ab0202;">Nom</th>        
               <th style="color:#ab0202;">E-mail</th>           
               <th style="color:#ab0202;">Image</th>               
                          
               <th style="color:#ab0202;">Statut</th>               
               <th style="color:#ab0202;">Supprimer</th>                      
            </tr>
        </thead>
        <?php
            $all_users=mysqli_query($conn,"select * from users order by id DESC");
            $j=1;
            while($row=mysqli_fetch_array($all_users)){
        ?> 
        <tbody>
            <tr>
                <td><input type="checkbox" name="deleteall[]" value="<?php echo $row['id'];?>" /></td>
                <td><?php echo $j; ?></td> 
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <?php if($row['image'] !=''){ ?>
                   <img src="../upload_images/<?php echo $row['image']; ?>" width="70" height="50" />
                   <?php }else{?>
                    <img src="../Image/profile_icon.png" width="70" height="50" />
                    <?php } ?>
                </td>
                <!-- <td><img src="ecommerce/upload_images/<?php  //echo $row['image']; ?>" width="70" height="50"/></td> -->
               
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
                <td><a href="index.php?action=view_users&delete_user=<?php echo $row['id']; ?>"style="color:white; text-decoration: none; border:0.1px solid red; background:red; ">✖ Supprimer</a></td>
                
            </tr>
            <?php $j++; }  ?>
        </tbody>
    
        <tr>
            <td><input type="submit" name="delete_all" value="Supprimer" style="border-radius: 20px;"/></td>
        </tr>
</table>
</form>
</div><!--view_product_box-->
<?php
// Delete Product
    if(isset ($_GET['delete_user']))
    {
        $delete_user = mysqli_query($conn,"delete from users where id='$_GET[delete_user]'");
        if ($delete_user)
        {
            echo "<script>alert('L'utilisateur a été supprimé avec succès!')</script>";
            echo"<script>windows.open('index.php?action=view_users','_self')</script>" ;
        }
            
    }
    // Remove items selected using foreach loop
    if(isset ($_POST['deleteall']))
    {
        $remove = $_POST['deleteall'];
      foreach ($remove as $key) 
        { 
            $run_remove = mysqli_query ($conn, "delete from users where id='$key'");
            if($run_remove)
            {
                echo "<script>alert('Les éléments sélectionnés ont été supprimés avec succès!')</script>";
                echo"<script>windows.open('index.php?acton=view_users','_self')</script>" ;
            }
            else
            {
                echo "<script>alert('Mysqli Failed: mysqli_error($conn) !')</script>";
            }   
        }
    }

?>