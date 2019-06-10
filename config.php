<?php
        //connecting to the server  

        //assigns the environmental variables
        $dbhost =  $_SERVER['DATABASE_HOST'];
        $dbuser =  $_SERVER['DATABASE_USER'];
        $dbpass =   $_SERVER['DATABASE_PASSWORD'];
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

?> 