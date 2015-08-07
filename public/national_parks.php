<?php
require_once 'national_parks_procedural.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>National Parks</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style type="text/css">
    .error {
        background-color: yellow;
        color: salmon;
    }

    </style>
</head>
<body>
    <div class="container">
        <!-- DISPLAY NATIONAL PARKS DATA -->
        <h1>National Parks Data</h1>
        <?php foreach ($parks as $key => $park): ?>
            <h2> <?= $park['name'] ?> <small><strong> <?= $park['location']; ?> </strong></small></h2>
            <p> 
                <em>Date of establishment: <?= $park['date_established']; ?> </em> <br>
                <u>Area in acres: <?= $park['area_in_acres']; ?></u> <br> 
                <?= $park['description']; ?>
            </p>
        <?php endforeach; ?>
        <!-- END OF DATA DISPLAY -->
        <!-- PAGINATION STARTS -->
        <?php if ($page != 1): ?>
            <a style="float: left" class='btn btn-primary' href="?page=<?= $page - 1; ?>">Previous</a>
        <?php endif; ?>
        <?php if ($page < $totalPages): ?>
            <a style="float: right" class='btn btn-primary' href="?page=<?= $page + 1; ?>">NEXT</a>
        <?php endif; ?>
        <div class="container text-center">
            <?php for ($i = 1; $i <= $totalPages; $i += 1) { ?>
            <a class='btn btn-primary' href="?page=<?= $i ?>"><?= $i ?></a>
            <?php } ?>
        </div>
        <!-- PAGINATION ENDS -->
        <br>
        <br>
        <!-- FORM TO ADD PARK TO DATABASE -->
        <div class="container">
            <?php foreach ($errors as $error): ?>
                <p class="error"><?= $error . PHP_EOL ;?></p>
            <?php endforeach; ?>

            <form method="POST">
                <div class="form-group">
                    <label for="name">Name of National Park</label>
                    <input value="<?= Input::get('name') ?>" type="text" class="form-control" name="name" id="name" placeholder="Enter Name" require=' '>
                </div>
                <div class="form-group">
                    <label for="location">Location of Park</label>
                    <input value="<?= Input::get('location') ?>" type="text" class="form-control" name="location" id="location" placeholder="Please enter full name of state" require=' '>
                </div>
                 <div class="form-group">
                    <label for="date">Date of Establishment</label>
                    <input value="<?= Input::get('date') ?>" type="text" class="form-control" name="date" id="date" placeholder="Please enter mm/dd/yyyy" require=' '>
                </div>
                 <div class="form-group">
                    <label for="area">Area in Acres</label>
                    <input value="<?= Input::get('area') ?>" type="text" class="form-control" name="area" id="area" placeholder="Enter area of park in acres." require=' '>
                </div>
                 <div class="form-group">
                    <label for="description">Description of Park</label>
                    <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description of Park" require=' '><?= Input::get('description') ?></textarea>
                </div>
                <input class="btn btn-primary" type="submit" style="float: right">
            </form>
        </div>
        <!-- END FORM -->
    </div>
</body>
</html>