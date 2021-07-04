<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
    <title><?php echo "$vehicle[invMake] $vehicle[invModel]"; ?> | PHP Motors, Inc.</title>
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
        <h1><?php echo "$vehicle[invMake] $vehicle[invModel]"; ?></h1>
        <?php if (isset($message)){
            echo $message; }
        ?>
        <?php if (isset($vehicleDisplay)){
            echo '<div id="veh-display">';
            echo $vehicleDisplay;
            echo $thumbnails;
            echo '</div>'; }
        ?>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'?>
    </footer>
    </div> <!-- Wrapper ends -->
</body>
</html>