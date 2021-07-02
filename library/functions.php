<?php 

// Dynamic menu for Car classifications
function buildNavList($classifications) {
    $navList = '<ul>';
    $navList .= "<li><a href='/phpmotors/' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
        $navList .= "<li><a href='/phpmotors/vehicles/?action=classification&classificationName=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';

    return $navList;
}

// Build the classifications select list 
function buildClassificationList($classifications){ 
    $classificationList = '<select name="classificationId" id="classificationList">'; 
    $classificationList .= "<option>Choose a Classification</option>"; 
    foreach ($classifications as $classification) { 
        $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
    } 
    $classificationList .= '</select>'; 
    return $classificationList; 
}

// Check Email
function checkEmail($clientEmail) {
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}

// Check the password for a minimum of 8 characters,
//  at least one 1 capital letter, at least 1 number and
//  at least 1 special character
function checkPassword($clientPassword) {
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
    return preg_match($pattern, $clientPassword);
}

// Verify that the price is greater than 0
function checkPrice($invPrice) {
    $pattern = '/^([0-9]*[.])?[0-9]+$/';
    return preg_match($pattern, $invPrice);
}

// Verify that the stock is greater than 0 and integer
function checkStock($invStock) {
    $pattern = '/^\d+$/';
    return preg_match($pattern, $invStock);
}

// Verify that the classificationId entered is a valid classification Id
function checkClassId($classifications, $classificationId) {
    function getId($classification) {
        return $classification["classificationId"];
    }
    $classificationsIds = array_map("getId", $classifications);

    return in_array($classificationId, $classificationsIds);
}

// Build vehicles display
function buildVehiclesDisplay($vehicles) {
    $dv = '<ul id="inv-display">';
    foreach ($vehicles as $vehicle) {
        $dv .= '<li>';
        $dv .= "<a href='/phpmotors/vehicles/?action=vehicle&invId=$vehicle[invId]'><img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'></a>";
        $dv .= '<hr>';
        $dv .= "<a href='/phpmotors/vehicles/?action=vehicle&invId=$vehicle[invId]'><h2>$vehicle[invMake] $vehicle[invModel]</h2></a>";
        $dv .= "<span>$vehicle[invPrice]</span>";
        $dv .= '</li>';
    }
    $dv .= '</ul>';
    return $dv;
}

// Build specific vehicle display
function buildInvItemDisplay($vehicle) {
    $dv = '<div id="veh-display">';
    $dv .= '<div id="veh-left-column">';
    $dv .= "<img src='$vehicle[invImage]' alt='$vehicle[invMake] $vehicle[invModel]'>";
    $dv .= "<p><b>Price: $$vehicle[invPrice]</b></p>";
    $dv .= '</div>';
    $dv .= '<div id="veh-right-column">';
    $dv .= "<h2>$vehicle[invMake] $vehicle[invModel] Details</h2>";
    $dv .= "<ul>";
    $dv .= "<li>$vehicle[invDescription]</li>";
    $dv .= "<li>Color: $vehicle[invColor]</li>";
    $dv .= "<li># in Stock: $vehicle[invStock]</li>";
    $dv .= "</ul>";
    $dv .= '</div>';
    $dv .= '</div>';
    return $dv;
}