<?php
    include("admin_area/Includes/Header.php");
   
?>
                   
<div class="content_wrapper">

<?php if(isset ($_SESSION['user_id'])){ ?>

    <?php
        // Add_cart();
    ?>
    <div class="user_container">
        <div class="user_content">
            <?php
                if(isset($_GET['action'])){
                $action = $_GET['action'];
                }
                else
                {
                    $action='';
                }
                switch($action)
                {
                    case "edit_account";
                    include("Users/edit_account.php");
                    break;
                    
                    case "edit_profile";
                    include("Users/edit_profile.php");
                    break;

                    case "user_profile_picture";
                    include('Users/user_profile_picture.php');
                    break;

                    case "change_password";
                    include('Users/change_password.php');
                    break;

                    case "delete_account";
                    include('Users/delete_account.php');
                    break;

                    default;
                    echo "Do something";
                    break;
                }
                // if ($_GET['action']=='edit_account')
                // {
                //     echo $action;
                // }
            ?>
        </div><!-- /.Iser_content -->
        <div class="user_sidebar">
            <?php
            //hadi li badalt 
                $run_image=mysqli_query($conn, "select * from users where id='$_SESSION[user_id]'");
                $row_image=mysqli_fetch_array($run_image);
                if($row_image['image'] !=''){
            ?>
            <div class= "user_image" align="center">
                <img src="upload_images/<?php  echo $row_image['image']; ?>" />
                <!-- <img src="upload_images/<?php  //echo $row_image['image']; ?>" /> -->
            </div>
            <?php }else{ ?>
                <div class= "user_image" align="center">
                    <img src="Image/profile_icon.png" />
                </div>
            <?php } ?>
            <ul>
                <!-- <li><a href="my_account.php?action=my_order">My order</a></li> -->
                <li><a href="my_account.php?action=edit_account">Modifier le compte</a></li>
                <li><a href="my_account.php?action=edit_profile">Modifier le Profil</a></li>
                <li><a href="my_account.php?action=user_profile_picture">Photo de profil utilisateur</a></li>
                <li><a href="my_account.php?action=change_password">Changer le mot de passe</a></li>
                <li><a href="my_account.php?action=delete_account">Supprimer le compte</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div><!-- /.user sidebar -->

    </div><!-- /.user_container-->

                    <?php }else{ ?>
                        <h1>Page de confiuration du compte</h1>
                        <h5><a href="indexx.php?action=login" style= "color:#ab0202; text-decoration: none;">Connectez-vous à votre compte</a></h5>
                        
                    <?php } ?>
 
                    </div> <!-- content_wrapper -->
    </body>
</html>