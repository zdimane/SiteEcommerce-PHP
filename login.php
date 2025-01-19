<div class="login_box">
    <form method="post" action="" >
        <table align="left" width="70%">
            <tr align="left">
                <td colspan="4">
                    <h4 style="color:#ab0202;">Login</h4>
                    <span>
                    Vous n'avez pas de compte ?<a href="Register.php" style= "color:#ab0202; text-decoration: none;">Inscrivez-vous ici</a><br/><br/>
                    </span>
                </td>
            </tr>
            <tr>
                <td width="15%" style="color:#ab0202;"><b>E-mail : </b></td>
                <td colspan="3"><input type="email" name="email" required placeholder="E-mail"/></td>
            </tr>
            <tr>
                <td width="15%" style="color:#ab0202;"><b>Mot de passe : </b></td>
                <td colspan="3"><input type="password" name="password" required placeholder="Mot de passe"/></td>
            </tr>
            <tr>
                <td ></td>
                <td colspan="4">
                    <!-- <a href="checkout.php?forgot_pass" style= "color:red; text-decoration: none;">
                        forgot password ?
                    </a> -->
                    <a href="forgot_password.php" style= "color:#ab0202; text-decoration: none;">
                    mot de passe oublié ?
                    </a>
                </td>
            </tr>
            <tr>
                <td ></td>
                <td colspan="4" >
                   <input type="submit" name="login" value="Connexion" style="background:#ab0202; width:150px; border-radius: 20px;"/>
                </td>
            </tr>
        </table>
    </form>
</div>
<?php
    if(isset ($_POST['login']))
    {  
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $password= md5($password) ;
        $run_login = mysqli_query($conn, "select * from users where password='$password'AND email='$email'" );
        $check_login=mysqli_num_rows($run_login);

        $row_login=mysqli_fetch_array($run_login);
        if($check_login==0)
        {
            echo"<script>alert('l'email ou le mot de passe est incorrect, veuillez réessayer ! ')</script>";
            // echo" <div class='alert alert-primary' role='alert'>
            //             email or password is incorrect , please try again ! 
            //         </div>";
                    
            exit();
        }
        $ip=getipAddress();
        $run_cart= mysqli_query ($conn, "select * from cart where ip_address='$ip'");
        $check_cart= mysqli_num_rows($run_cart);

        if ($check_login > 0 AND $check_cart==0)
        {
            $_SESSION['user_id']=$row_login['id'];
            $_SESSION['role']=$row_login['role'];
            $_SESSION['email']=$email;
            echo "<script>alert ('Vous vous êtes connecté avec succès!')</script>";
            echo "<script>wipdow.open ('Customer/my_account.php','_self')</script>";
        }
        else
        { 
            $_SESSION['user_id']=$row_login['id'];
            $_SESSION['role']=$row_login['role'];
            $_SESSION['email']=$email;
            echo "<script>alert ('Vous vous êtes connecté avec succès !')</script>";
            // echo "<script>window.open ('checkout.php','_self')</script>";                     
        }
    } 
                
?>