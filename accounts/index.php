<?php
/*************************
 * Accounts Controller
 *************************/

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get functions library
require_once '../library/functions.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';


// Get the array of classifications
$classifications = getClassifications();

// Dynamic menu for car classifications
$navList = buildNavList($classifications);


$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'Login':
        // Filter and store the data
        $clientEmail    = trim(filter_input(INPUT_POST, 'clientEmail'   , FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
        // Check data
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);
        
        // Check for missing data
        if(empty($clientEmail) || empty($checkPassword)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/login.php';
            exit; 
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClientByEmail($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Add new cookie-welcome message
        setcookie('firstname', $_SESSION['clientData']['clientFirstname'], strtotime('+1 year'), '/');
        // Send them to the admin view
        include '../view/admin.php';
        exit;

        break;

    case 'Register':
        // Filter and store the data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
        $clientLastname  = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
        $clientEmail     = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword  = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
        // Check data
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);
        // Check for an existing email
        $existingEmail = checkExistingEmail($clientEmail);
        if ($existingEmail) {
            $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
            include '../view/login.php';
            exit;
        }
        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit; 
        }
        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
        
        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
        
        // Check and report the result
        if ($regOutcome === 1) {
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            $_SESSION['message'] = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            header('Location: /phpmotors/accounts/?action=login-page');
            exit;
        } else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/registration.php';
            exit;
        }

        break;

    case 'UpdateAccount':
        include '../view/client-update.php';
        exit;
        break;
    
    case 'modifyAccount':
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
        $clientLastname  = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
        $clientEmail     = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientId        = trim(filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT));
        // Check data and existing email
        $clientEmail     = checkEmail($clientEmail);
        // TO DO: Avoid if the email is the same;
        //$existingEmail   = checkExistingEmail($clientEmail);

        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) ) {
            $messageAcco = '<p>Please provide information for all empty form fields.</p>';
            include '../view/client-update.php';
            exit; 
        }
        $updateResult = updateClient($clientFirstname, $clientLastname, $clientEmail, $clientId);
        if ($updateResult) {
            $_SESSION['clientData'] = getClientById($clientId);
            $message = "<p>$clientFirstname. Your information has been updated.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;
        } else {
            $messageAcco = "<p class='notice'>Sorry $clientFirstname, we could not updated your account information. Please try again.</p>";
            include '../view/client-update.php';
            exit;
        }
        break;
    
    case 'modifyPassword':
        // Filter and store password
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
        $clientId       = trim(filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT));
        $checkPassword  = checkPassword($clientPassword);

        if (empty($checkPassword)) {
            $messagePass = '<p>Please make sure your password matches the desired pattern.</p>';
            include '../view/client-update.php';
            exit; 
        }
        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
        $updateResult = updatePassword($hashedPassword, $clientId);
        if ($updateResult) {
            $_SESSION['clientData'] = getClientById($clientId);
            $message = "<p>".$_SESSION['clientData']['clientFirstname']." Your password has been updated.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;
        } else {
            $messagePass = "<p class='notice'>Sorry".$_SESSION['clientData']['clientFirstname']."we could not updated your password. Please try again.</p>";
            include '../view/client-update.php';
            exit;
        }
        break;

    case 'Logout':
        session_unset();
        session_destroy();
        setcookie('firstname', null, -1, '/');
        header('Location: /phpmotors/');
        exit;
        break;

    case 'login-page':
        include '../view/login.php';
        break;

    case 'register-page':
        include '../view/registration.php';
        break;

    default:
        include '../view/admin.php';
        break;
}