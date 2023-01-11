<?php

  session_start();
  $_SESSION['loggedin']=false;
    include './includes/_dbconnect.php';
    $email = $password = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $email = $_POST['Email'];
      $password = $_POST['Password'];

      $sql = 'SELECT * FROM users';
      $result = mysqli_query($conn , $sql);
      
      while($data = mysqli_fetch_assoc($result))
      {
          if($email == $data['user_email'] && $password == $data['user_password'])
          {
            $_SESSION['loggedin'] = true;
            echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Congradulation New User!</strong>Now you are Ready for more Features.
        <button type="button" onclick = "changepath()" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
            
          }
      }
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
  #formContainer
  {
    width:40%;
    height: 400px;
    box-shadow: 0px 3px 5px black;
    position: relative;
    top: 150px;
    
  }
  #input
  {
    width:100%;
    border:none;
    border-bottom:2px solid gray;
    text-align:center;
  }
  #button
  {
    width:100%;
  }
</style>
<script>

  function changepath()
  {
    window.location.href = "./index.php";
  }
</script>
<body>


    <div class="container" id = "formContainer">
        <form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "post">
            <h2 class = "text-center mb-5">Login</h2>
            <div class="mb-5">
                
                <input type="email" name = "Email" placeholder = "Email" class="form-control" id ="input"  id="exampleInputEmail1" aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3">
                
                <input type="password" name = "Password" placeholder = "Password" class="form-control" id ="input" id="exampleInputPassword1">
            </div>
            
            <button type="submit" id = "button" class="btn btn-primary mt-5">Logn</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>