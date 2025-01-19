<style>
    .delete_account
    {
        padding:10px;
    }
    .delete
    {
        width:50%;
        margin:20px;
        /* float:right; */
        float:center;
    }
    .delete input[type=submit]
    {
        padding:7px 10px;
        margin:40px;
        float:center;
        border: none;
    }
    .yes_btn
    {
        background:#828181 ;
        color:white;
    }
    .cancel
    {
        background:#828181 ;
        color:white;
    }
    .yes_btn:hover
    {
        background:red ;
    }
    .cancel:hover
    {
        background:red ;
    }
</style>

<div class="delete_account">
    <h1 style="text-align:left">Confirm Box</h1>
    <hr/>

    <div class="delete">
        <h4> Are you sure want to delete your account ?</h4>
        <form action="" method="post">
            <input type="submit" class="yes_btn" name="yes" value="Yes" />
            <input type="submit" class="cancel" value="Cancel" background="#828181"/>
        </form>
    </div><!--delete-->

</div><!-- delete_account -->

<?php
    if(isset($_POST['yes']))
    {
        $delete_account=mysqli_query($conn,"delete from users where id='$_SESSION[user_id]' ");
        session_destroy();
        echo"<script>alert('your account has been deleted ! ')</script>";
        echo"<script>window.open('indexx.php','_self')</script>";
    }
    if(isset($_POST['cancel']))
    {
        echo"<script>window.open('window.location.href','_self')</script>";
    }
?>