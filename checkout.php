<?php
    include("admin_area/Includes/Header.php");   
?>
                    <div class="content_wrapper">                       
                    <?php
                        if(!isset($_SESSION['user_id']))
                        {
                            include ('login.php');
                        }
                        else
                        {
                            include ('payment.php');
                        } 
                    ?>   
                    </div>                    
    </body>
</html>