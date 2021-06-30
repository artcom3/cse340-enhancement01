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
    <title>Account Management | PHP Motors</title>
</head>
<body>
    <div id="wrapper">
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/header.php'?>
    </header>
    <nav>
        <?php echo $navList; ?>
    </nav>
    <main>
        <h1>Account Management</h1>
        
        <h2>Account Update</h2>
        <?php
        if (isset($messageAcco)){
            echo $messageAcco;
        }
        ?>
        <form action="/phpmotors/accounts/" method="post">
        <fieldset>
            <label for="clientFirstname">First Name</label><br>
            <input type="text" name="clientFirstname" id="clientFirstname" <?php if(isset($_SESSION['clientData']['clientFirstname'])) {echo "value=".$_SESSION['clientData']['clientFirstname']; } ?> required><br>   

            <label for="clientLastname">Last Name</label><br>
            <input type="text" name="clientLastname" id="clientLastname" <?php if(isset($_SESSION['clientData']['clientLastname'])) {echo "value=".$_SESSION['clientData']['clientLastname']; } ?> required><br>
            
            <label for="clientEmail">Email</label><br>
            <input type="email" name="clientEmail" id="clientEmail" <?php if(isset($_SESSION['clientData']['clientEmail'])) {echo "value=".$_SESSION['clientData']['clientEmail']; } ?> required placeholder="Enter a valid email address" ><br>
        
            <input type="submit" name="submit" id="modaccbtn" value="Update Account">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="modifyAccount">
            <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId']; } ?>">

        </fieldset>
        </form>
        <h2>Password Update</h2>
        <?php
        if (isset($messagePass)){
            echo $messagePass;
        }
        ?>
        <form action="/phpmotors/accounts/" method="post">
        <fieldset>
            <label for="clientPassword">New Password</label><br>
            <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
            <input type="password" name="clientPassword" id="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br>
        
            <input type="submit" name="submit" id="modpassbtn" value="Update Password">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="modifyPassword">
            <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId']; } ?>">
        </fieldset>
        </form>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'?>
    </footer>
    </div> <!-- Wrapper ends -->
</body>
</html>