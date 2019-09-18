 <?php
require('config/db.php');
//require('config/config.php');  

//Check for a submit
if(isset ($_POST['delete'])){
    //Get the form data
    $delete_id =  mysqli_real_escape_string($conn, $_POST['delete_id']);
   
$query = "DELETE  FROM post WHERE id = {'delete_id'}"; 

    
    if(mysqli_query($conn, $query)){
        header('Location:  '.'http://127.0.0.1/traversy_course/nawillinfo/index.php'.'');
        
    } else {
        echo 'ERROR: '.mysqli_error($conn);
    }
}

//Get id
$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = 'SELECT * FROM post WHERE id = '.$id;
//Get result
$result = mysqli_query($conn, $query);
//Feacth Data
$post = mysqli_fetch_assoc($result);
 //var_dump($posts);
//Free Result
mysqli_free_result($result);
//close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=	, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Nawiil Info Blog</title>

    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>

<?php include ('inc/header.php')?>

        <div class="container">
            <a href="http://127.0.0.1/traversy_course/nawillinfo/index.php" class="btn btn-default">Back</a>
            <h1><?php echo $post['title']; ?></h1>
                <small>Created on <?php echo $post['created_at']; ?> by 
                    <?php echo $post['author']; ?></small>
                    <p> <?php echo $post['body'] ?> </p> 
                    <hr>
                    <!-- <form class="pull-right" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="delete_id" value="<?php echo['id']; ?>">
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                    </form> -->
                    <a href="<?php echo 'http://127.0.0.1/traversy_course/nawillinfo/editpost.php';?>?id=<?php echo $post['id']; ?>"
                        class="btn btn-default">Edit Post</a>                                                                             
            </div>

            <?php include ('inc/footer.php')?>
            
</body>
</html>