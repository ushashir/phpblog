<?php
require('config/db.php');
require('config/config.php');

//Check for a submit
if(isset ($_POST['submit'])){
    //Get the form data
    $update_id =  mysqli_real_escape_string($conn, $_POST['update_id']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    

    $query = "UPDATE post SET
            title = '$title',
            author = '$author',
            body = '$body'
                 WHERE id = {$update_id}"; 

    
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
    <title>Edit Post | Nawiil Info Blog</title>

    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>

   <?php include ('inc/header.php')?>

            <div class="container">
             <h1>Edit Posts</h1>

             <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>" >
                </div>
                <div class="form-group">
                    <label for="">Author</label>
                    <input type="text" name="author" class="form-control" value="<?php echo $post['author']; ?>" >
                </div>
                <div class="form-group">
                    <label for="">Body</label>
                    <textarea name="body"  class="form-control" id="" cols="30" rows="10" ><?php echo $post['body']; ?></textarea> 
                    
                    <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">

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