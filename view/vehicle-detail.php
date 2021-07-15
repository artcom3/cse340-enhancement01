<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
?><!DOCTYPE html>
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
        <?php if (isset($vehicleDisplay)){
            echo '<div id="veh-display">';
            echo $vehicleDisplay;
            echo $thumbnails;
            echo '</div>'; }
        ?>
        <h2>Customer Reviews</h2>
        <h3>Review the <?php echo "$vehicle[invMake] $vehicle[invModel]"; ?></h3>
        <?php if (isset($message)){
            echo $message; }
        ?>
        <?php if (isset($_SESSION['loggedin'])) {
            echo "<fieldset>";
            echo "<form class='review-form' action='/phpmotors/reviews/' method='post'>";
            echo "    <label for='screenName'>Screen Name</label><br>";
            echo "    <input type='text' id='screenName' value=" . substr($_SESSION['clientData']['clientFirstname'], 0, 1) . $_SESSION['clientData']['clientLastname'] . " readonly><br>";
            echo "    <label for='reviewText'>Review Text</label><br>";
            echo "    <textarea name='reviewText' id='reviewText' required></textarea>";
            echo "    <br>";
            echo "    <input type='submit' name='submit' id='regrevbtn' value='Submit Review'>";
            echo "    <input type='hidden' name='action' value='addReview'>";
            echo "    <input type='hidden' name='invId' value='" . $vehicle['invId'] . "'>";
            echo "    <input type='hidden' name='clientId' value='" . $_SESSION['clientData']['clientId'] . "'>";
            echo "</form>";
            echo "</fieldset>";
        } else {
            echo "<p>You must to <a href='/phpmotors/accounts/?action=login-page'>log in</a> to review.</p>";
        }
        ?>
        <?php if (isset($reviewsList)){
            echo $reviewsList;
        } else {
            echo "<p>Be the first to write a review.</p>";
        }
        ?>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'?>
    </footer>
    </div> <!-- Wrapper ends -->
</body>
</html>
<?php unset($_SESSION['message']); ?>