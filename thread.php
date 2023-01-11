<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <!-- navigation bra -->
    <?php include './includes/_header.php';
            include './includes/_dbconnect.php'; 
    ?>
    <?php
        $id = $_GET['categoryid'];
        $sql = "SELECT * FROM category WHERE catagory_id = $id";
        $result = mysqli_query($conn , $sql);
        while($data = mysqli_fetch_assoc($result))
        {
            $categoryName = $data['catagory_title'];
            $categoryDec = $data['catagory_discription'];
        }
       
?>

    <div class="container my-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"><?php echo $categoryName  ?></h4>
            <p>Forum rules and posting guidelines
                Keep it friendly.<br>
                Be courteous and respectful.<br> Appreciate that others may have an opinion different from yours.<br>
                Stay on topic. ...<br>
                Share your knowledge. ...<br>
                Refrain from demeaning, discriminatory, or harassing behaviour and speech.</p>
            <hr>
            <p class="mb-0"><?php echo $categoryDec  ?></p>
        </div>
    </div>

    <!-- post your Questions -->
    <?php
            $comment_title = $comment_des = "";
            $id = $_GET['categoryid'];
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $comment_title = $_POST['comment_title'];
                $comment_des = $_POST['comment_des'];
                $sql = "SELECT * FROM comments";
                $result = mysqli_query($conn , $sql);
                $insertion = "INSERT INTO comments (`comment_title`, `comment_dec`, `time`, `comment_point`) VALUES ('$comment_title', '$comment_des', current_timestamp(), '$id')";
                
                $insertion_result = mysqli_query($conn , $insertion);
                if($insertion_result == true)
                {
                   echo' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   <strong>Congradulation!</strong>Your question has been posted.
                   <button type="button" onclick = "changepath()" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
                }
                else{
                    echo'<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                      Something wents wrong
                    </div>
                  </div>';
                }
            }
        
        ?>
    <div class="container">
        <h1 class="my-5 mb-5">Post Your Question</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

            <div class="form-group">
                <input type="text" name = "comment_title" class="form-control" id="exampleInputPassword1" placeholder="Your Question">
            </div>
            <div class="form-group">
                <textarea class="form-control" name = "comment_des" placeholder="Question Discription" id="exampleFormControlTextarea1"
                    rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary my-3 mb-5 w-25">Post</button>
        </form>
    </div>

    <div class="container">
        <h1>Questions</h1>
    </div>

    <?php

    //INSERT INTO `comments` (`comment_id`, `comment_title`, `comment_dec`, `time`, `comment_point`) VALUES (NULL, 'Unable to install pycham', 'Hello friends i have a problem with python extention and i ma unable to install pycham on my window.. Please help me', current_timestamp(), '1');
       
        $sql = 'SELECT * FROM comments';
        $result = mysqli_query($conn , $sql);
        $row = mysqli_num_rows($result); 
                $id = $_GET['categoryid'];
                $sql_row = " SELECT * FROM `comments` WHERE comment_point = $id";
                $result_for_rows = mysqli_query($conn , $sql_row);
                $number_of_rows = mysqli_num_rows($result_for_rows);  
                if($number_of_rows > 0)
                {
            while($data = mysqli_fetch_assoc($result))
            {
                if($data['comment_point'] == $id)
                {
                    echo'
                <div class="container mt-5 mb-5">
                <div class="media">
                <img class="mr-3" src="./p.png" width = "64px" height = "64px" alt="Generic placeholder image">
                <div class="media-body">
                  <h5 class="mt-0">'. $data['comment_title'].'</h5>
                  <p>'.  $data['comment_dec'].'   </p>
                </div>
              </div>
                </div>
                ';
                }
            }
        }
                else
                        {
                            echo '<div class="container my-5">
                            <div class="jumbotron">
                            <h1 class="display-4">No Discussion</h1>
                            <p class="lead">Be the first person to comment</p>
                            <hr class="my-4">
                            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                            <p class="lead">
                            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                            </p>
                        </div></div> ';
                        }
            


            
        
        
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>