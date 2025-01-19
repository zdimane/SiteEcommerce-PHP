
    <script>
        $ (document).ready (function () {
            $("#password_confirm2").on('keyup', function() {
                //alert('testing jquery');
                    var password_confirm1=$("#password_confirm1").val();
                    var password_confirm2=$("#password_confirm2").val();
                    //alert(password_confirm2);
                    if(password_confirm1==password_confirm2) 
                    {
                    $("#status_for_confirm_password").html('<strong style="color:green;">✔ Password match</strong>');
                    }
                else 
                {
                    $("#status_for_confirm_password").html('<strong style="color:red;"> ✖ Password do not match !</strong>');
                }
            }) ;
        }) ;
    </script>
    <?php
        $select_user=mysqli_query($conn, "select * from users where id='$_SESSION[user_id]'"); 
        $fetch_user=mysqli_fetch_array($select_user);
        
    ?>
    <div class="register_box">
        <form method="post" action="" enctype="multipart/form-data">

            <table align="left" width="70%">
                <tr align="left">
                    <td colspan="4">
                        <h2>Change password</h2>
                        <hr width="150%">
                    </td>
                </tr>
            

                <tr>
                    <td width="15%"><b>Current Password : </b></td>
                    <td colspan="3"><input type="password" name="current_password" required placeholder="Current Password"/></td> 
                </tr>

                <tr>
                    <td width="15%"><b>New Password : </b></td>
                    <td colspan="3"><input type="password" id="password_confirm1" name="new_password" required placeholder="New Password"/></td> 
                </tr>

                <tr>
                    <td width="35%"><b>Re-Type Password : </b></td>
                    <td colspan="3"><input type="password" id="password_confirm2"  name="confirm_new_password" required placeholder="Re-Type new Password"/>
                    <p Id="status_for_confirm_password"></p>
                    </td>
                </tr>
            
                <tr align="left">
                    <td ></td>
                    <td colspan="4">
                    <input type="submit" name="change_password" value="Save"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <?php
        if(isset ($_POST['change_password']))
        {
            $current_password=trim($_POST['current_password']);
            $hash_current_password=md5($current_password);
            $new_password = trim($_POST['new_password']);
            $hash_new_password= md5($new_password) ;
            //echo"<script>alert('$hash_password= md5($password)')</script>";
            $confirm_new_password=trim ($_POST['confirm_new_password']);
            $select_password=mysqli_query($conn,"select * from users where password='$hash_current_password' and id='$_SESSION[user_id]'");

            //Check if current password not empty
            if(mysqli_num_rows($select_password)==0)
            {
                echo"<script>alert('your current password is wrong ! ')</script>";
            }
            elseif($new_password != $confirm_new_password)
            {
                echo"<script>alert('your password do not match ! ')</script>";  
            }
            else
            {
                $modifier = mysqli_query($conn,"update users set password='$hash_new_password' where id='$_SESSION[user_id]'");
                if($modifier)
                {
                    echo"<script>alert('your password was updated successfuly ! ')</script>"; 
                    echo"<script>window.open(window.location.href,'_self')</script>"; 
                }
                else
                {
                    echo"<script>alert('Database query failed: mysqli_error($conn) ! ')</script>"; 
                }
            }
            
        }                                  
    ?> 

                            
