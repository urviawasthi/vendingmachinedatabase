<?php
        //connecting to the server  

        //assigns the environmental variables
        $dbstring =  getenv('CLEARDB_DATABASE_URL');
        $conn = mysqli_connect($dbstring);

?> 