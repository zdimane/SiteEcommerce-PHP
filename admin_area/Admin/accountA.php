<?php
    //include("admin_area/Includes/Header.php");
   
?>
 <head><link href="style/sst.css" type="text/css" rel="stylesheet"></head>                  

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
                    include("Admin/edit_accountA.php");
                    break;
                    
                    case "edit_profile";
                    include("Admin/edit_profileA.php");
                    break;

                    case "user_profile_picture";
                    include('Admin/user_profile_pictureA.php');
                    break;

                    case "change_password";
                    include('Admin/change_passwordA.php');
                    break;

                    case "delete_account";
                    include('Admin/delete_accountA.php');
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
                <li><a href="accountA.php?action=edit_account">Edit Account</a></li>
                <li><a href="accountA.php?action=edit_profile">Edit Profile</a></li>
                <li><a href="accountA.php?action=user_profile_picture">User profile picture</a></li>
                <li><a href="accountA.php?action=change_password">Change Password</a></li>
                <li><a href="accountA.php?action=delete_account">Delete Account</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div><!-- /.user sidebar -->

    </div><!-- /.user_container-->

                    <?php }else{ ?>
                        <h1>Account Setting Page</h1>
                        <h5><a href="indexx.php?action=login" style= "color:#ab0202; text-decoration: none;">Log In To Your Account</a></h5>
                        
                    <?php } ?>
 
                    </div> <!-- content_wrapper -->
    </body>
</html>