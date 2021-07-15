<?php
/*************************
 * Reviews Model
 *************************/

// For inserting a new review into the reviews table 
function regReview($reviewText, $invId, $clientId) {
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'INSERT INTO reviews (reviewText, invId, clientId) VALUES (:reviewText, :invId, :clientId)';
    $stmt = $db->prepare($sql);
    // The next three lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

// For select reviews from the reviews table by inventory Id
function getReviewsByInvItem($invId) {
    $db = phpmotorsConnect();
    $sql = 'SELECT r.reviewId, r.reviewText, r.reviewDate, c.clientFirstname, c.clientLastname 
            FROM reviews AS r 
            INNER JOIN clients AS c ON r.clientId = c.clientId 
            WHERE invId = :invId
            ORDER BY reviewDate DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
}

// For select reviews from the reviews table by client Id
function getReviewsByClient($clientId) {
    $db = phpmotorsConnect();
    $sql = 'SELECT r.reviewId, r.reviewText, r.reviewDate, i.invMake, i.invModel 
            FROM reviews AS r 
            INNER JOIN inventory AS i ON r.invId = i.invId 
            WHERE clientId = :clientId
            ORDER BY reviewDate DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
}

// For select individual review
function getReviewInfo($reviewId) {
    $db = phpmotorsConnect();
    $sql = 'SELECT r.reviewId, r.reviewText, r.reviewDate, r.clientId, i.invMake, i.invModel 
            FROM reviews AS r 
            INNER JOIN inventory AS i ON r.invId = i.invId 
            WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $review = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $review;
}

// For update review in the reviews table
function updateReview($reviewId, $reviewText) {
    $db = phpmotorsConnect();
    $sql = 'UPDATE reviews SET reviewText = :reviewText WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

// For delete review from the reviews table
function deleteReview($reviewId) {
    $db = phpmotorsConnect();
    $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}


