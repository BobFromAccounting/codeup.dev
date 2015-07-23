<?php  
    session_start();

    if(isset($_GET['index']) && !empty($_SESSION['gamesArray'])){
        $games = $_SESSION['gamesArray'][$_GET['index']];
        $title = $games['title'];
        $studio = $games['studio'];
        $description = $games['description'];
    }else{
        header('Location: index.php');
    } 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Show Movie Info</title>
</head>
<body>
    <div class="container">
        <h1><?= $title; ?></h1>
        <h2><?= $studio; ?></h2>
        <p><?= $description; ?></p>
        <a href="index.php">Back</a>
    </div>
</body>
</html>