<?php
    include("admin_area/Includes/Header.php");   
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Send an Email</title>            
            </head>
        <body style="font-family: Arial, Helvetica, sans-serif; display: grid; place-items: center; backround:white;">
            <center>
                <form action="https://formsubmit.co/d83088011891edd4129f0c04c9611555" method="POST" style="display: flex; flex-direction: column; width: 24rem; gap: 1rem; background:white ;">
                    <input type="text" name="Name" placeholder="Nom d'utilisateur"  style="padding: 1.4rem; background: transparent; border: 1px solid Oblack; border-radius:  20px;" required>
                    <input type="email" name="Email" placeholder="E-mail" style="padding: 1.4rem; background: transparent; border: 1px solid Oblack;  border-radius:  20px;" required>
                    <textarea name="Message" placeholder="     Message" style="height: 6rem; padding: 1.4rem; background: transparent; border: 1px solid Oblack; margin: 0; padding: 0; outline: 0; border-radius:  20px;" required></textarea>
                    <button type="submit"  style="width: 8rem; padding: 1.4rem; cursor: pointer; background: #ab0202; color:white; border-radius:  20px; border:#ab0202;">envoyer</button>
                </form>
            </center>          
        </body>
    </html>