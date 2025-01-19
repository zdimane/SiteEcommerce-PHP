<?php
    include("admin_area/Includes/Header.php");
   
?>
<div class="content_wrapper">
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
    <div class="register_box">
        <form method="post" action="" enctype="multipart/form-data">

            <table align="left" width="70%">
                <tr align="left">
                    <td colspan="4">
                        <h2 style="color:#ab0202;">Inscription</h2>
                        
                        <span>
                        Vous avez déjà un compte ?<a href="indexx.php?action=login" style= "color:#ab0202; text-decoration: none;" >Connexion</a><br/><br/>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="15%" style="color:#ab0202;"><b>Nom : </b></td>
                    <td colspan="3"><input type="text" name="name" required placeholder="Name"/></td>
                </tr>
                <tr>
                    <td width="15%" style="color:#ab0202;"><b>E-mail : </b></td>
                    <td colspan="3"><input type="email" name="email" required placeholder="Email"/></td>
                </tr>
                <tr>
                    <td width="15%" style="color:#ab0202;"><b>Mot de passe : </b></td>
                    <td colspan="3"><input type="password" id="password_confirm1"  name="password" required placeholder="Password"/></td>
                </tr>
                <tr>
                    <td width="25%" style="color:#ab0202;"><b>Confirmez le mot de passe : </b></td>
                    <td colspan="3"><input type="password" id="password_confirm2" name="confirm_password" required placeholder="Confirm Password"/>
                    <p Id="status_for_confirm_password"></p><!--validation password -->
                    </td>
                </tr>
                <tr>
                    <td width="15%" style="color:#ab0202;"><b>Image : </b></td>
                    <td colspan="3"><input type="file" name="image" placeholder="Password"/>
                    </td>
                </tr>
                <tr>
                    <td width="158" style="color:#ab0202;"><b>Ville :</b></td>
                    <td colspan="3"><input type="text" name="city" required placeholder="City" /></td>
                </tr>
                <tr>
                    <td width="15%" style="color:#ab0202;"><b>Contact : </b></td>
                    <td colspan="3"><input type="text" name="contact" required placeholder="Contact"/></td>
                </tr>
                <tr>
                    <td width="15%" style="color:#ab0202;"><b>Addresse : </b></td>
                    <td colspan="3"><input type="text" name="address" required placeholder="Address"/></td>
                </tr>
                <tr align="left">
                    <td ></td>
                    <td colspan="4">
                    <input type="submit" name="register" value="S'inscrire" style="background:#ab0202; width:150px; border-radius: 20px;"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <?php
        if(isset ($_POST['register']))
        {
            if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['name']))
            {
                $ip=getipAddress();
                $name=$_POST['name'];
                $email=trim($_POST['email']);
                $password = trim($_POST['password']);
                $hash_password= md5($password) ;
                //echo"<script>alert('$hash_password= md5($password)')</script>";
                $confirm_password=trim ($_POST['confirm_password']);
                $contact=$_POST['contact'];
                $image =$_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                $city=$_POST['city'];
                $address = $_POST['address'];
                $check_exist=mysqli_query ($conn, "select * from users where email='$email'");
                $email_count= mysqli_num_rows($check_exist);
                $row_register=mysqli_fetch_array($check_exist);
                if( $email_count > 0)
                {
                    echo"<script>alert('Désolé, votre adresse e-mail  $email existe déjà !')</script>";
                }
                elseif(isset($row_register['email'])!=$email && $password == $confirm_password)
                {
                    move_uploaded_file($image_tmp, "upload_images/$image");
                    $run_insert= mysqli_query($conn, "insert into users (ip_address,name,email,password,city,contact,user_address,image) values('$ip','$name','$email','$hash_password','$city','$contact','$address','$image')");
                    
                    if($run_insert)
                    {
                        $utilisateur=mysqli_query($conn,"select * from users where email='$email'");
                        $row_utilisateur=mysqli_fetch_array( $utilisateur);
                        echo $_SESSION['user_id']= $row_utilisateur['id']."</br>"; 
                        echo $_SESSION['role'] = $row_utilisateur['role'];
                                            
                    }
                    $run_cart=mysqli_query($conn,"select * from cart where ip_address='$ip'");
                    $check_cart=mysqli_num_rows($run_cart);
                    if($check_cart==0)
                    {
                        $_SESSION['email']=$email;
                        echo"<script>alert('Le compte a été créé avec succès')</script>";
                        echo"<script>window.open('Customer/my_account.php','_self')</script>";
                        
                        
                    }
                    else
                    {
                        $_SESSION['email']=$email;
                        echo"<script>alert('Le compte a été créé avec succès')</script>";
                        echo"<script>window.open('indexx.php','_self')</script>";
                    }
                }
            }   
        }                                  
    ?>  
                                
</div>        