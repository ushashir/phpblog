<?php
require('config/db.php');
//require('config/config.php');

$query = 'SELECT * FROM post ORDER BY created_at DESC';
//Get result
$result = mysqli_query($conn, $query);
//Feacth Data
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
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

        <?php foreach($posts as $post) : ?> 
            <div class="container">
             <h1>Posts</h1>
                <div class="well">
                 <h3><?php echo $post['title']; ?></h3>
                 <small>Created on <?php echo $post['created_at']; ?> by 
                    <?php echo $post['author']; ?></small>
                    <p> <?php echo $post['body'] ?> </p>
                    <a class="btn btn-default" href="post.php?id=<?php echo $post['id']; ?>">Read More</a>
                </div>     
            </div>
<?php endforeach; ?>

<?php include ('inc/footer.php')?>

</body>
</html>