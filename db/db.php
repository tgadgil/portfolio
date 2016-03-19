<?php

    $username = "team2_kfbuser";

    $password = "Batchz123";

    $hostname = "localhost";

    $database = "team2_kfb";

    $cnxn = @mysqli_connect($hostname, $username, $password, $database)

	or die("Error connecting to database: " . mysqli_connect_error());

    //echo 'Connected to database!';

?>