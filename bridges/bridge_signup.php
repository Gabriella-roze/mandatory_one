<?php
// Backend Validation
// Validate: name
if( strlen($_POST['name']) < 2 || strlen($_POST['name']) > 50){
    $error_message = 'Name must be at least 2 characters and no longer than 50 characters.';
    header("Location: /mandatory-1/signup/error/$error_message");
    exit();
}
// Validate: last name
if( strlen($_POST['last_name']) < 2 || strlen($_POST['last_name']) > 50){
    $error_message = 'Last name must be at least 2 characters and no longer than 50 characters.';
    header("Location: /mandatory-1/signup/error/$error_message");
    exit();
}
// Validate: age
if( strlen($_POST['age']) < 2 || strlen($_POST['age']) > 50){
    $error_message = 'Age must be between 1 and 200.';
    header("Location: /mandatory-1/signup/error/$error_message");
    exit();
}
// Validate: email
if( ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
    $error_message = 'The email is not valid.';
  header('Location: /mandatory-1/signup/error/$error_message');
  exit();
}
// Validate: password
if( empty($_POST['password']) || strlen($_POST['password']) < 5 || strlen($_POST['password']) > 50){
    $error_message = 'The password must be at least 5 characters and no more than 20 characters.';
  header('Location: /mandatory-1/signup/error/$error_message');
  exit();
}
// Validate: repeat password
if( empty($_POST['repeat_password']) || $_POST['repeat_password'] != $_POST['password']){
    $error_message = 'Passwords must match.';
    header('Location: /mandatory-1/signup/error/$error_message');
    exit();
  }

// If success
// Connect to data base
require_once(__DIR__.'/../db.php');
// Create a user and store it in database
try{
  // Prepare an insert statement
  $q = "INSERT INTO User (name, last_name, email, age, password) VALUES (:name, :last_name, :email, :age, :password)";
  $statement = $db->prepare($q);
  // Bind parameters to statement
  $statement->bindParam(':name',  $_POST['name']);
  $statement->bindParam(':last_name', $_POST['last_name']);
  $statement->bindParam(':email', $_POST['email']);
  $statement->bindParam(':age', $_POST['age']);
  $statement->bindParam(':password', $_POST['password']);
  // Execute the prepared statement
  $statement->execute();
  echo "Records inserted successfully.";
  header('Location: /mandatory-1/login');
  exit();
} catch(PDOException $e){
  echo 'Email is already in use';
  exit();
}

// Close statement
unset($statement);
// Close connection
unset($db);