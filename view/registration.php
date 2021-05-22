<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
    <title>Account Registration | PHP Motors</title>
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
        <h1>Register</h1>
        <?php
        if (isset($message)){
            echo $message;
        }
        ?>
        <form action="/phpmotors/accounts/index.php" method="post" >
            <label for="clientFirstname">First Name</label><br>
            <input name="clientFirstname" id="clientFirstname" type="text"><br>
            <label for="clientLastname">Last Name</label><br>
            <input name="clientLastname" id="clientLastname" type="text"><br>
            <label for="clientEmail">Email</label><br>
            <input name="clientEmail" id="clientEmail" type="email"><br>
            <label for="clientPassword">Password</label><br>
            <input name="clientPassword" id="clientPassword" type="password"><br>
            <input type="submit" name="submit" id="regbtn" value="Register">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="register">
        </form>
        <br>
        <a href="/phpmotors/accounts/?action=login-page">You have an account??</a>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'?>
    </footer>
    </div> <!-- Wrapper ends -->
</body>
</html>