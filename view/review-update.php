<?php
if (!isset($_SESSION['loggedin'])) {
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
    <title>Review Update | PHP Motors</title>
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
        <?php if (isset($review)){ 
            echo "<h1>$review[invMake] $review[invModel] Review</h1>";
            echo "<p>Reviewed on " . date("F j, Y", strtotime($review['reviewDate'])) . "</p>";
        }?>
        <?php
        if (isset($message)){
            echo $message;
        }
        ?>
        <form class="review-form" action="/phpmotors/reviews/" method="post">
        <fieldset>
            <label for="reviewText">Review Text</label><br>
            <textarea id="reviewText" name="reviewText" required><?php if(isset($review['reviewText'])){echo $review['reviewText']; }?></textarea><br>
            <input type="submit" name="submit" id="updrevbtn" value="Update Review">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="updateReview">
            <input type="hidden" name="reviewId" value="<?php if(isset($review['reviewId'])){ echo $review['reviewId']; }?>">
        </fieldset>
        </form>

    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'?>
    </footer>
    </div> <!-- Wrapper ends -->
</body>
</html>