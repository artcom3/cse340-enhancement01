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
        <form action="/phpmotors/accounts/">
        <label for="clientEmail">Email</label><br>
        <input name="clientEmail" id="clientEmail" type="email"><br>
        <label for="clientPassword">Password</label><br>
        <input name="clientPassword" id="clientPassword" type="password"><br>
        <input class="form-button" type="submit" value="Sign-in">
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