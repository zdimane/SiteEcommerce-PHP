<?php
    session_start();
    include("Functions/function.php");
    include("BD/bd.php");
?>
<!DOCTYPE html><!-- Declaration de HTML5 -->
<html>
    <head>
        <title>Dislog</title>
        <link rel="stylesheet" href="Styles/css.css" media="all"/>
        <script src="ecommerce/js/jquery-3.4.1.js"></script>

        <!-- _______________________menu _ _  _________________ -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
        <!-- _______________________menu _ _  _________________ -->
    </head>
    <body>
        <!--Main contrainer start here-->
<div class="main_wrapper">
    <div class="header_wrapper">
        <!-- _______________________menu _ _  _________________ -->
        <div class="menu-btn">
            <i class="fas fa-bars"></i>
        </div>
        <div id="mySidenav" class="side-bar">
            <div class="close-btn">
                <i class="fas fa-times"></i>
            </div>
            <div class="menu">
                <div class="item">
                    <a class="sub-btn">Categories<i class="fas fa-angle-right dropdown"></i></a>
                    <div class="sub-menu">
                    
                        <?php getCats();?>
                    </div>
                </div>
                <div class="item">
                    <a class="sub-btn">Marques<i class="fas fa-angle-right dropdown"></i></a>
                    <div class="sub-menu">
                    
                        <?php Brands();?>
                    </div>
                </div>
                <!-- <div class="item">
                    <a class="sub-btn"><i class="fa-solid fa-gears"></i>Settings<i class="fas fa-angle-right dropdown"></i></a>
                    <div class="sub-menu">
                        <a href="index_language.php" class="sub-item">Langue</a>
                        
                    </div>
                </div> -->
            </div>
        </div>
                    
                    <script type="text/javascript">
                        $(document).ready(function(){
                        //Squery for toggle sub menus
                            $('.sub-btn').click(function(){
                                $(this).next('.sub-menu').slideToggle();
                                $(this).find('.dropdown').toggleClass('rotate');
                            });
                            $('.menu-btn').click(function(){
                            $('.side-bar').addClass('active');
                            $('.menu-btn').css("visibility", "hidden");

                            });
                            // $('.close-btn').click(function(){
                            // $(".side-bar').removeClass('active');
                            // });
                            $('.close-btn').click(function(){
                            $('.side-bar').removeClass('active');
                            $('.menu-btn').css("visibility", "visible");

                            });
                        });
                    </script>
                    <!-- _______________________menu _ _  _________________ -->

                        <div class="header_logo">
                            <a href="indexx.php">
                                <img src="Image/ima.png"/>
                            </a>
                            <!-- <p>Dislog</p> -->
                        </div>
                        <div id="form">
                            <form method="get" action="Rechercher.php" enctype="multipart/form-data">
                                <input type="text" name="user_query" placeholder="Cherchez un produit"/>
                                <input type="submit" name="search" value="Rechercher" style="color:white; border-radius: 5px ; background:#ab0202;"/>
                            </form>
                        </div>
                        <div class="cart">
                            <ul>
                                <li class="dropdown_header_cart">
                                    <div id="notification_total_art" class="shopping_cart">
                                    <a href="Cart.php"><img src="Image/pin.png"/></a>
                                        <div id="notification_cart">
                                            <?php
                                                totalPanier();  
                                            ?>
                                        </div><!--notification_number-->
                                        <!-- panier -->
                                    </div>
                                </li>                           
                            </ul>
                            <?php if(!isset($_SESSION['user_id'])){ ?>

                            <div class="register_login">
                                <div class="login"><a href="indexx.php?action=login" >Connexion</a></div>
                                <div class="register"> <a href="Register.php" style="color:white;">Inscription</a></div>
                            </div><!-- register_login -->
                            <?php }else{ ?>
                                <?php
                                   //hadi hta hiya badalt fiha session
                                    $select_user=mysqli_query($conn, "select * from users where id='$_SESSION[user_id]'");
                                    $data_user=mysqli_fetch_array($select_user); 

                                ?>
                                <div id="profile">
                                    
                                    <ul>
                                        <li class="bar_header">
                                            <a>
                                                <?php if($data_user['image'] !=''){ ?>
                                                <span><img src="upload_images/<?php echo $data_user['image'];?>"></span>

                                                <?php }else{ ?>
                                                    <span><img src="Image/profile_icon.png"></span>                

                                                <?php } ?>
                                            </a>
                                            <ul class="bar_menu_header">
                                                <li><a href="my_account.php?action=edit_account"> Paramètres </a></li>
                                                <li><a href="logout.php"> Déconnecter </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>                            
                            <?php } ?>
                        </div>
                </div><!--header-->

<!-- _______________________________________HeaderFinish_________________________________________________________-->
<div class="menu_bar">
    <ul>
    </ul>
    <ul id="menu">
        <li><a href="indexx.php">Acceuil</a></li>
        <li><a href="All_products.php">Produits</a></li>
        <li><a href="my_account.php">Mon compte</a></li>
        <li><a href="Cart.php">Panier</a></li>
        <li><a href="contact.php">Contactez-nous </a></li>
        <li><a href="logout.php">Déconnecter</a></li>
    </ul>
</div>
<?php include("js/dropdownTop.php"); ?>
</html>
