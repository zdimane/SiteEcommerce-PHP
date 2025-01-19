
<?php
 //hadi
    $select_user=mysqli_query($conn, "select * from users where id='$_SESSION[user_id]'"); 
    $fetch_user=mysqli_fetch_array($select_user);  
?>
<div class="register_box">
    <form method="post" action="" enctype="multipart/form-data">

        <table align="left" width="70%">
            <tr align="left">
                <td colspan="4">
                    <h2>User profile picture</h2>
                    <hr width="150%">
                </td>
                
            </tr>
            
            <tr>
                <td width="15%"><b>Image : </b></td>
                <td colspan="3">
                    <input type="file" name="image" />
                    <div>
                        <img src="upload_images/<?php echo $fetch_user['image']?>" width="100" height="70"/>

                    </div>
                </td>
            </tr>
            
            <tr align="left">
                <td ></td>
                <td colspan="4">
                <input type="submit" name="user_profile_picture" value="Save"/>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php
    if(isset ($_POST['user_profile_picture']))
    {
        //Ckeck if file not empty
        if(!empty($_FILES['image']['name']))
        {
            $image =$_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $target_file="upload_images/" . $image;
            $upOk =1;
           // $message ='';
            //Check if the size

            if($_FILES["image"]["size"]<5098888)
            {
                //Check if already exists
                // if(file_exists($target_file))
                // {
                //     $upOk=0;
                //     $message .="Sorry, file already exists .";
                // }if($upOk == 0)//Ckeck if uploaded is 
                // {
                //     $message .= "Sorry, your file was not uploaded ";
                // }
                // else
                // {
                    if(move_uploaded_file($image_tmp,$target_file))
                    {
                        $update_image= mysqli_query($conn,"update users set image='$image' where id='$_SESSION[user_id]'");
                       // $message .= "The file" . basename($image) . "has been uploaded";
                    }
                    else
                    {
                        //$message .= "Sorry, there was an error uploading your file";
                    }
                // }
            }//end if the size more than 5 MB:
            else
            {
                $message .="File size max 5 MB.";
            }    
            
        }
    }                                  
?> 
<!-- <p style="color:blue;top:50px">
    <?php 
        // if(isset($message))
        // {
        //     // echo $message;
        //     // echo "<script>alert ('$message')</script>";
        //     // echo "<script>window.open (window.location.href,'_self)</script>";
        // }

    ?>
</p>
                             -->
