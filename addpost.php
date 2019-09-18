<?php
require('config/db.php');
require('config/config.php');

//Check for a submit
if(isset ($_POST['submit'])){
    //Get the form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    

    $query = "INSERT INTO post(title, author, body) VALUES('$title', '$author', '$body' )"
    ;
    if(mysqli_query($conn, $query)){
        header('Location:  '.'http://127.0.0.1/traversy_course/nawillinfo/index.php'.'');
        
    } else {
        echo 'ERROR: '.mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=	, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Post | Nawiil Info Blog</title>

    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>

   <?php include ('inc/header.php')?>

            <div class="container">
             <h1>Add Posts</h1>

             <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Author</label>
                    <input type="text" name="author" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Body</label>
                    <textarea name="body" class="form-control" id="" cols="30" rows="10" ></textarea>
                    <input type="submit" name="submit" value="submit" class="btn btn-primary" >
                </div>
             </form>
                
            </div>


<?php include ('inc/footer.php')?>

</body>
</html>

<!-- value="<?php echo $post['title']; ?>"
value="<?php echo $post['body']; ?>"
value="<?php echo $post['author']; ?>" -->