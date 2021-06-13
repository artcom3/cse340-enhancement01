<div id="top-header">
    <img src="/phpmotors/images/site/logo.png" alt="PHP Motors logo" id="logo">
    <?php 
    if (isset($_SESSION['loggedin'])) {
        echo "<a href='/phpmotors/accounts'>Welcome " . $_SESSION['clientData']['clientFirstname'] ."</a>";
        echo "<a href='/phpmotors/accounts?action=Logout' title='Log Out from PHP Motors' id='logOut'>Log Out</a>";
    } else {
        echo "<a href='/phpmotors/accounts?action=login-page' title='Login or Register with PHP Motors' id='acc'>My Account</a>";
    }
    ?>
</div>