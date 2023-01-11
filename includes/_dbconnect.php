<?php
    $servername = "localhost";
    $uername = "root";
    $password = "";
    $database = "ecommerce";

    // ---< CONNECTING DATABASE>-----
        $conn = mysqli_connect($servername , $uername , $password , $database);
        if(!$conn)
        {
            echo 'database has not been created due to the following error____'. mysqli_connect_error($conn);
        }

?>