<?php
//$con=mysqli_connect("localhost:8278","root","","ecommerce_cms");
//$con = mysqli_connect('HOSTNAME','USERNAME','PASSWORD');
$conn = new mysqli("localhost", "root", "", "ecommerce_cms","3307");
if(mysqli_connect_error())
{
    echo"Failed to connect to mysql : ".mysqli_connect_error();
}

?>