<?php

    $link = mysqli_connect('localhost','root','','library_MS');

    if(mysqli_connect_errno()){
        die("Error database connect: ".mysqli_connect_error());
    }

?>