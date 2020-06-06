<?php

    $link = mysqli_connect('localhost','root','','lms');

    if(mysqli_connect_errno()){
        die("Error database connect: ".mysqli_connect_error());
    }

?>