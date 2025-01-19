<?php
    include("admin_area/Includes/Header.php");
   
?>
                    <div class="content_wrapper">
                        
                            <?php
                                Add_cart();
                            ?>
                            <?php //if(!isset ($_GET['action'])){ ?>



                        <!-- <div id="sidebar">
                            <div id="sidebar_title">Categories</div>
                            <ul id="cats">
                                <?php
                                //    getCats();
                                ?>
                            </ul>
                            <div id="sidebar_title">Brands</div>
                            <ul id="cats">
                                <?php
                                    // Brands();
                                ?>
                                
                            </ul>
                        </div>  -->
                           <div id="box">
                              
                               <div id="BoiteProduit">
                                   <?php if(!isset($_GET['action'])){?>
                                    <?php get_Product();?>
                                    <?php get_Product_by_categories_id();?>
                                    <?php get_Product_by_Marque_id();?>
                                    <?php //}else{ ?>
                                    <?php //include('login.php'); ?>
                                    <?php //} ?>
                                </div><!-- Product Box -->
                           </div>
                           <?php }else{ ?>
                            <?php
                                 include('login.php'); 
                                }
                            ?>

                    </div> <!-- content_wrapper -->

                    <!-- <div class=footer>
                    <?php
                        //include("admin_area/Includes/footer.php"); 
                    ?>
                    </div> -->

    </body>
</html>