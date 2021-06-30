<?php
if (!isset($_SESSION['loggedin'])) {
    header('Location: /phpmotors/');
    exit;
}
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('Location: /phpmotors/');
    exit;
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
    <title><?php if(isset($invInfo['invMake'])){ 
        echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>
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
        <h1><?php if(isset($invInfo['invMake'])){ 
            echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?></h1>
            
        <?php
        if (isset($message)){
            echo $message;
        }
        ?>
        <p>Confirm Vehicle Deletion. The delete is permanent.</p>
        <form action="/phpmotors/vehicles/index.php" method="post">
        <fieldset>
            <label for="invMake">Make</label><br>
            <input type="text" id="invMake" name="invMake" <?php if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?> required><br>

            <label for="invModel">Model</label><br>
            <input type="text" id="invModel" name="invModel" <?php if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?> required><br>
            
            <label for="invDescription">Description</label><br>
            <textarea id="invDescription" name="invDescription" required><?php if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }?></textarea><br>
            <br>

            <input type="submit" name="submit" id="delvehbtn" value="Delete Vehicle">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="deleteVehicle">
            <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){ echo $invInfo['invId']; } elseif(isset($invId)){ echo $invId; }?>">
        </fieldset>
        </form>

    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'?>
    </footer>
    </div> <!-- Wrapper ends -->
</body>
</html>
<?php unset($_SESSION['message']); ?>