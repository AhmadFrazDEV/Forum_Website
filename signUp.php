<?php

session_start();
    include './includes/_dbconnect.php';
    $name = $email = $password = $confirm = "";
    $nameErr = $emailErr = $passwordErr = $confirmErr = "";
    $confarmationErr = "";
    $flag = false;
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $name = $_POST['Username'];
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        $confirm = $_POST['Confirm_Password'];

        if(empty($name))
        {
            $nameErr = "Required";
        }
        if(empty($email))
        {
            $emailErr = "Required";
        }
        if(empty($password))
        {
            $passwordErr = "Required";
        }
        if(empty($confirm))
        {
            $confirmErr = "Required";
        }

        if($password != $confirm)
        {
            $confarmationErr = "Password Does not match. Try Again";
            $flag = true;
        }
            

        if((!(empty($name))) && (!(empty($email))) && (!(empty($password))) && $flag == false )
        {
            
            $sql = 'SELECT * FROM users';
            $result = mysqli_query($conn , $sql);
            $insert = "INSERT INTO `users` (`user_name`, `user_email`, `user_password`) VALUES ('$name', '$email', '$password')";
            $result2 = mysqli_query($conn , $insert);
            $_SESSION['email'] = $email;
            echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Congradulation New User!</strong>Now you are Ready for more Features. You can login Now.Best Of Luck
        <button type="button" onclick = "changepath()" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
            
            

        }
        else{
            echo "<script> alert('error');  </script>";
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
#formContainer {
    width: 40%;
    height: 550px;
    box-shadow: 0px 3px 5px black;
    position: relative;
    top: 100px;
    margin-bottom:20px;

}

#input {
    width: 100%;
    border: none;
    border-bottom: 2px solid gray;
    text-align: center;
}

#button {
    width: 100%;
}
#error
{
    color: red;
}
</style>
<script>

  function changepath()
  {
    window.location.href = "./index.php";
  }
</script>
<body>


    <div class="container mb-5" id="formContainer">
        <form ation = "<?php $_SERVER['PHP_SELF']; ?>" method = "post">
            <h2 class="text-center mb-5">Registration</h2>
            <div class="mb-5">

                <input type="tex" placeholder="Username" name = "Username" class="form-control" id="input"
                    id="exampleInputPassword1" value = "<?php echo $nameErr; ?>">
            </div>
            <div class="mb-5">

                <input type="email" placeholder="Email" name = "Email" class="form-control" id="input" id="exampleInputEmail1"
                    aria-describedby="emailHelp" value = "<?php echo $nameErr; ?>">

            </div>
            <div class="mb-5">

                <input type="password" placeholder="Password" name = "Password" class="form-control" id="input"
                    id="exampleInputPassword1" value = "<?php echo $nameErr; ?>">
            </div>
            <div class="mb-5">

                <input type="password" placeholder="Confirm Password" name = "Confirm_Password" class="form-control" id="input"
                    id="exampleInputPassword1" value = "<?php echo $nameErr; ?>">
            </div>
            <span class = "text-center" style = "color:red;"><?php  echo $confarmationErr  ?>   </span>
            <button type="submit" id="button" class="btn btn-primary mt-3">Signup</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>