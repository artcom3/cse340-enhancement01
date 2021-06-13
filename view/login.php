<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
    <title>Account Login | PHP Motors</title>
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
        <h1>Sign in</h1>
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        ?>
        <form action="/phpmotors/accounts/" method="post">
            <label for="clientEmail">Email</label><br>
            <input type="email" name="clientEmail" id="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> required><br>
            
            <label for="clientPassword">Password</label><br>
            <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
            <input type="password" name="clientPassword" id="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br>

            <input class="form-button" type="submit" value="Sign-in">
            <input type="hidden" name="action" value="Login">
        </form>
        <br>
        <a href="/phpmotors/accounts/?action=register-page">Not a member yet?</a>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'?>
    </footer>
    </div> <!-- Wrapper ends -->
</body>
</html>