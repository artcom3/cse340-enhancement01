<?php
/*************************
 * Reviews Controller
 *************************/

// Create or access a Session
session_start();

// Get required resources
require_once '../library/connections.php';
require_once '../model/main-model.php';
require_once '../model/vehicles-model.php';
require_once '../model/reviews-model.php';
require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();
// Build a navigation bar using the $classifications array
$navList = buildNavList($classifications);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case 'addReview':
        // Filter and store the data
        $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING));
        $invId      = trim(filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT));
        $clientId   = trim(filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT));


        // Check for missing data
        if (empty($reviewText) || empty($invId) || empty($clientId)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            $_SESSION['message'] = $message;
            header("location: /phpmotors/vehicles/?action=vehicle&invId=$invId");
            exit; 
        }

        // Send the data to the model
        $regOutcome = regReview($reviewText, $invId, $clientId);

        // Check and report the result
        if ($regOutcome === 1) {
            $message = "<p>Congratulations, the review was successfully added</p>";
            $_SESSION['message'] = $message;
            header("location: /phpmotors/vehicles/?action=vehicle&invId=$invId");
            exit; 
        } 
        else {
            $message = "<p>Sorry, the review registration failed. Please try again.</p>";
            $_SESSION['message'] = $message;
            header("location: /phpmotors/vehicles/?action=vehicle&invId=$invId");
            exit;
        }
        break;
    
    case 'edit':
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
        $review = getReviewInfo($reviewId);
        if (count($review) < 1) {
            $message = 'Sorry, no review information could be found.';
        }
        include '../view/review-update.php';
        exit;
        break;

    case 'updateReview':
        $reviewId   = trim(filter_input(INPUT_POST, 'reviewId', FILTER_VALIDATE_INT));
        $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING));

        if (empty($reviewId) || empty($reviewText)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            header('location: /phpmotors/accounts/');
            exit; 
        }

        $updateResult = updateReview($reviewId, $reviewText);
        if ($updateResult) {
            $message = "<p>The review was updated successfully.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;
        } else {
            $message = "<p>Sorry, the review was not updated.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;
        }

        break;

    case 'del':
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
        $review = getReviewInfo($reviewId);
        if (count($review) < 1) {
            $message = 'Sorry, no review information could be found.';
        }
        include '../view/review-delete.php';
        exit;
        break;

    case 'deleteReview':
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
        
        $deleteResult = deleteReview($reviewId);
        if ($deleteResult) {
            $message = "<p class='notice'>The review was successfully deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;
        } else {
            $message = "<p class='notice'>Error: the review was not deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;
        }
        break;

    default:
        header('/phpmotors/accounts/');
        break;
}