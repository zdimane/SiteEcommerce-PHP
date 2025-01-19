
<?php
    session_start ();
    if(!isset($_SESSION['role']) && $_SESSION['role'] !='admin')
    {
        echo"<script>window.open('login.php','_self')</script>";
    }
    else{
?>
<?php include ('Includes/bd.php'); ?>
<head><link href="style/sst.css" type="text/css" rel="stylesheet"></head>
<!DOCTYPE html><!-- HTML5 Declaration -->
    <html>
        <head>
            <title> Web Developer</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="../js/jquery-3.4.1.js"></script>
        <head>
        <body>
            <div class="container">
                <div class="header">
                    <div class="Navbar">
                        <h3><a class="admin_name">Admin -<?php echo $_SESSION['name'];?></a></h3>
                    </div><!-- /.Navbar-->
                    <div class="Navbar_right">
                        <ul class="dropdown_navbar_right">
                            <li>
                                <a><i class="fa fa-user"></i>&nbsp;<i class="fa fa-caret-down"></i></a>
                                <ul class="subnavbar_right">
                                    <!-- <li><a href="accountA.php">user Account</a></li> -->
                                    <li><a href="logout_admin.php">Déconnecter</a></li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div><!-- /.Navbar_right-->
                </div><!-- /.heade -->
                <div class="body">
                    <div class="left_sidebar">
                        <div class="left_sidebar_box">
                            <ul class="left_sidebar_first_level">
                                <li><a href="../index.php" terget="_blank"><i class="fa fa-dashboard"></i> Site</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-th-large"></i> &nbsp;Produits<i class="arrow fa fa-angle-left"></i></a>
                                    <ul class="left_sidebar_second_level">
                                        <li><a href="index.php?action=add_product">Ajouter un produit</a></li>
                                        <li><a href="index.php?action=view_product">Voir les produits</a></li>

                                    </ul><!-- /.left_sidebar_second_level -->
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-plus"></i> &nbsp;Catégories<i class="arrow fa fa-angle-left"></i></a>
                                    <ul class="left_sidebar_second_level">
                                        <li><a href="index.php?action=add_cat">Ajouter des catégories</a></li>
                                        <li><a href="index.php?action=view_cat">Afficher les catégories</a></li>

                                    </ul><!-- /.left_sidebar_second_level -->
                                </li>
                                <li><!-- /.Brand -->
                                    <a href="#"><i class="fa fa-plus"></i> &nbsp;Marques<i class="arrow fa fa-angle-left"></i></a>
                                    <ul class="left_sidebar_second_level">
                                        <li><a href="index.php?action=add_brand">Ajouter une marque</a></li>
                                        <li><a href="index.php?action=view_brand">Voir les marques</a></li>

                                    </ul><!-- /.left_sidebar_second_level -->
                                </li><!-- /.Brand -->
                                <li><!-- /.Brand -->
                                    <a href="#"><i class="fa fa-gift"></i> &nbsp;Admin<i class="arrow fa fa-angle-left"></i></a>
                                    <ul class="left_sidebar_second_level">
                                        <!-- <li><a href="index.php?action=add_user">Add User</a></li> -->
                                        <li><a href="index.php?action=view_users">Utilisateurs</a></li>

                                    </ul><!-- /.left_sidebar_second_level -->
                                </li><!-- /.Brand -->
                            </ul><!-- /.left_sidebar_first_level -->
                        </div><!-- /.left_sidebar_box -->
                    </div><!-- /.left_sidebar -->
                     <div class="content">
                        <div class="content_box">
                            <?php
                                if(isset($_GET['action']))
                                {
                                    $action=$_GET['action'];
                                }
                                else
                                {
                                    $action='';
                                }
                                switch($action)
                                {
                                    case 'add_product';
                                    include ('Includes/insert_product.php');
                                    break;

                                    case 'view_product';
                                    include ('Includes/view_product.php');
                                    break;

                                    case 'edit_pro';
                                    include ('Includes/edit_product.php');
                                    break;

                                    case 'add_cat';
                                    include ('Includes/insert_category.php');
                                    break;

                                    case 'view_cat';
                                    include ('Includes/view_categories.php');
                                    break;

                                    case 'edit_cat';
                                    include ('Includes/edit_category.php');
                                    break;

                                    case 'add_brand';
                                    include ('Includes/insert_brand.php');
                                    break;

                                    case 'view_brand';
                                    include ('Includes/view_brand.php');
                                    break;

                                    case 'edit_brand';
                                    include ('Includes/edit_brand.php');
                                    break;

                                    case 'view_users';
                                    include ('Includes/view_user.php');
                                    break;
                                }
                            ?>
                        </div><!--content box-->
                    </div><!-- content -->
                </div><!-- /.body -->
            </div><!-- /.container -->
        </body>
    </html>

<script>
    $(document).ready (function () {
        //drop down menu right
        $(".dropdown_navbar_right").on ('click', function () {
        $(this).find (".subnavbar_right").slideToggle ('fast');
        });
        // Collapse Left Sidebar
        $(".left_sidebar_first_level li").on('click',this, function(){
            $(this).find(".left_sidebar_second_level").slideToggle ('fast');
        });
    });
</script>
<?php } //end else?>