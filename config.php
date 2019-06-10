<?php
        //connecting to the server  

        //assigns the environmental variables
        $dbhost =  $_ENV['DATABASE_HOST'];
        $dbuser =  $_ENV['DATABASE_USER'];
        $dbpass =   $_ENV['DATABASE_PASSWORD'];
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

?> 