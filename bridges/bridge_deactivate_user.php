<?php
session_start();
// Connect to data base
require_once(__DIR__.'/../db.php');
try{
    // Prepare an update statement
    $q = "UPDATE User SET active=0 WHERE email=:email";
    $statement = $db->prepare($q);
    // Bind parameters to statement
    $statement->bindParam(':email', $_SESSION['user']->email);
    // Execute the prepared statement
    $statement->execute();
    header('Location: /mandatory-1/logout');
    exit();
} catch(PDOException $e){
    echo $e;
    exit();
}
// Close statement
unset($statement);
// Close connection
unset($db);