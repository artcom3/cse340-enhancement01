<?php
if (!isset($_SESSION['loggedin'])) {
    header('Location: /phpmotors/');
    exit;
}
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
    <title>Content Title | PHP Motors</title>
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
        <h1><?php echo $_SESSION['clientData']['clientFirstname'] .' '. $_SESSION['clientData']['clientLastname'] ?></h1>
        <?php if (isset($_SESSION['loggedin'])) {echo '<p>You are logged in.</p>'; } ?>
        <?php
        if (isset($message)){
            echo $message;
        }
        ?>
        <ul>
            <li>First name: <?php echo $_SESSION['clientData']['clientFirstname']?></li>
            <li>Last name: <?php echo $_SESSION['clientData']['clientLastname']?></li>
            <li>Email Address: <?php echo $_SESSION['clientData']['clientEmail']?></li>
        </ul>
        
        <h2>Account Management</h2>
        <p><a href='/phpmotors/accounts/?action=UpdateAccount'>Update Account Information</a></p>
        
        <?php
            if ($_SESSION['clientData']['clientLevel'] > 1) {
                echo '<h2>Inventory Management</h2>';
                echo '<p>Go to <a href="/phpmotors/vehicles/">Vehicle Management</a></p>';
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