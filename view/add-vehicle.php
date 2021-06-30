<?php
if (!isset($_SESSION['loggedin'])) {
    header('Location: /phpmotors/');
    exit;
}
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('Location: /phpmotors/');
    exit;
}
// Dropdown input Select
$classificationList = '<select id="classificationId" name="classificationId">';
$classificationList .= "<option>Choose a Classification</option>";
foreach ($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'";

    if (isset($classificationId)) {
        if ($classification['classificationId'] === $classificationId) {
            $classificationList .= ' selected ';
        }
    }

    $classificationList .= ">$classification[classificationName]</option>";
}
$classificationList .= '</select>';

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
    <title>Add Vehicle | PHP Motors</title>
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
        <h1>Add Vehicle</h1>
        <?php
        if (isset($message)){
            echo $message;
        }
        ?>
        <form action="/phpmotors/vehicles/index.php" method="post">
            <label for="classificationId">Choose a car:</label><br>
            <?php echo $classificationList ?><br>

            <label for="invMake">Make</label><br>
            <input type="text" id="invMake" name="invMake" <?php if(isset($invMake)){echo "value='$invMake'";} ?> required><br>

            <label for="invModel">Model</label><br>
            <input type="text" id="invModel" name="invModel" <?php if(isset($invModel)){echo "value='$invModel'";} ?> required><br>
            
            <label for="invDescription">Description</label><br>
            <textarea id="invDescription" name="invDescription" required><?php if(isset($invDescription)){echo $invDescription;} ?></textarea><br>
            <br>
            <label for="invImage">Image Path</label><br>
            <input type="text" id="invImage" name="invImage" value="/phpmotors/images/no-image.png" <?php if(isset($invImage)){echo "value='$invImage'";} ?> required><br>

            <label for="invThumbnail">Thumbnail Path</label><br>
            <input type="text" id="invThumbnail" name="invThumbnail" value="/phpmotors/images/no-image.png" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} ?> required><br>
            <br>
            <label for="invPrice">Price</label><br>
            <input type="number" id="invPrice" name="invPrice" min="0" step="any" <?php if(isset($invPrice)){echo "value='$invPrice'";} ?> required><br>

            <label for="invStock">Stock</label><br>
            <input type="number" id="invStock" name="invStock" min="0" step="1" <?php if(isset($invStock)){echo "value='$invStock'";} ?> required><br>

            <label for="invColor">Color</label><br>
            <input type="text" id="invColor" name="invColor" <?php if(isset($invColor)){echo "value='$invColor'";} ?> required><br>
            <br>
            <input type="submit" name="submit" id="addvehbtn" value="Add Vehicle">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="reg-vehicle">

        </form>

    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'?>
    </footer>
    </div> <!-- Wrapper ends -->
</body>
</html>