<?php
// Get the database connection file
require_once 'library/connections.php';
// Get functions library
require_once 'library/functions.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';

// Get the array of classifications
$classifications = getClassifications();

// Dynamic menu for car classifications
$navList = buildNavList($classifications);


$action = filter_input(INPUT_GET, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
}

switch ($action) {
    case 'template':
        include 'view/template.php';
        break;
    
    default:
        include 'view/home.php';
}
