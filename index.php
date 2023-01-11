<?php
    session_start();
    include './includes/_dbconnect.php'; 
    if($_SESSION['loggedin'] == true && isset($_SESSION['loggedin']))
    {
        include './includes/_nav_for_login.php';
        
    }
    else
    {
        include './includes/_header.php'; 
        $_SESSION['loggedin'] = false;
        unset($_SESSION['loggedin']);
        session_destroy();
    }
    
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>
/* Float four columns side by side */
.column {
    float: left;
    width: 25%;
    padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {
    margin: 0 -10px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
    .column {
        width: 100%;
        display: block;
        margin-bottom: 20px;
    }
}

/* Style the counter cards */
.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    padding: 50px;
    text-align: center;
    background-color: #f1f1f1;  
    
}
@kaeframes animationCard{
    to{width: 40px; height:4px;}
}
.container .containercard:hover{
    animation: animationCard 3s linear 0s infinite alternate both;
}
</style>
<script>

  function changepath()
  {
    window.location.href = "./index.php";
  }
</script>
<body>
    
   


    <!-- slide image -->
    
        <img src="s1 (1).jpg" alt="backgroung" class="w-100" height="500px">
        <div class="container text-center">
        <p style="position:relative; top: -200px; color:white; font-size:20px; font-family: arial;">Welcome to my
            E-Commarce Website. Rate my web and carry on your Shopping
            <br>. If you get anything poor just report it
        </p>
        </div>
    <!-- </div> -->

    <div class="container text-center">
        <h1>Categories</h1>
    </div>

    

    <!-- categories cards -->
    <?php


        $sql = "SELECT * FROM category";
        $result = mysqli_query($conn , $sql);

        while($data = mysqli_fetch_assoc($result))
        {
          $id = $data['catagory_id'];
            echo'
            <div class="container ">
          <a class = "containercard" href = "./thread.php?categoryid='.$id.'" style = "color:black;">  <div class="column align-items-center justify-content-center mb-5 mt-5 ml-5">
                <div class="card">
                    <h3>'. $data['catagory_title'].'</h3>
                    <p>'. substr($data['catagory_discription'] , 0 , 50).'</p>
                </div>
            </div> </a>
        </div>
            '; 
        }
       
    ?>


    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <!-- <?php 
        include './includes/_footer.html';
    ?> -->
</body>

</html>