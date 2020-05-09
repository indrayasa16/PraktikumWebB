<?php
    $connection = mysqli_connect("localhost","root","","sesion_user");
    if(!$connection){
        die("Error".mysqli_connect_error());
    }
?>