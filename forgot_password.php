<!-- 
<?php
    include('BD/bd.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width-device-width, initial-scale-1">
    <title>Site web</title>
  </head>
  <body>
   <h2> Forgot password</h2>
    <form method="post">
      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="enail" placeholder="Enter Email" name="email" required>
         <button type="submit">Send me a random password</button>
            <AFP/>
    </form>
  </body>
</html>
<?php
    // if(isset($_POST['email']))
    // {
    //     $password = uniqid();
    //     $hashedPassword=password_hash($password, PASSWORD_DEFAULT);
    //     $message = "Bonjour, voici votre nouveau mot de passe : $password";
    //     $headers ='Content-Type: text/plain; charset="utf-8"'." ";
    //     if (mail($_POST['email'], 'Mot de passe oublié', $message, $headers))
    //     {
    //         $sql = "UPDATE users SET password = ? WHERE email = ?";
    //         $stmt = $db->prepare($sql);
    //         $stmt->execute([$hashedPassword, $_POST['email']]);
    //         echo "Mail envoyé"; 
    //     }
    //     else
    //     {
    //         echo "Une erreur est survenue...";
    //     }
    // }
?>
   -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width-Ddevice -width, initial-scale=1.0">
      <title>Forgot Your Password In Php</title>
      <link rel="stylesheet" href="Styles/forgotstyle.css">
</head>
<body>
<div id="container">

<h2>Login</h2>
      <h2>Forgot Password</h2>

      <p>It's quick and easy.</p>
      <div id="line"></div>
      <form action="login.php" method="POST" autocomplete="off">
      <?php
      // if($errors > 0){
      //           foreach($errors AS $displayErrors){
      //           ?>
      //             <div id="alert"><?php //echo $displayErrors; ?></div>
      //           <?php
      //           }
      // }
        ?>
              <input type="email" name="email" placeholder="Email"><br>
              <input type="submit" name="find" value="Verify">

            </form>
    </div>
</body>
</html> -->
