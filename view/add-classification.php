<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
    <title>Add Classification | PHP Motors</title>
</head>
<body>
    <div id="wrapper">
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/header.php'?>
    </header>
    <nav>
        <?php 
            echo $navList;
        ?>
    </nav>
    <main>
        <h1>Add Classification</h1>
        <?php
        if (isset($message)){
            echo $message;
        }
        ?>
        <form action="/phpmotors/vehicles/index.php" method="post">
            <label for="classificationName">Classification Name</label><br>
            <input type="text" id="classificationName" name="classificationName"><br>
            <input type="submit" name="submit" id="addclasbtn" value="Add Classification">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="reg-classification">
        </form>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'?>
    </footer>
    </div> <!-- Wrapper ends -->
</body>
</html>