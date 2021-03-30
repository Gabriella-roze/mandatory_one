<?php
// ###############################
// Backend Validation
// ###############################

// Validate: name
if( ! isset($_POST['name']) ){
  $error_message = 'Name is missing';
  header("Location: /signup/error/$error_message");
  exit();
}
if( strlen($_POST['name']) < 2 ){
  $error_message = 'Name is too short. It must be at least 2 characters and no longer than 50 characters.';
  header("Location: /mandatory-1/signup/error/$error_message");
  exit();
}
if( strlen($_POST['name']) > 50){
  $error_message = 'Name is too long. It must be at least 2 characters and no longer than 50 characters.';
  header("Location: /mandatory-1/signup/error/$error_message");
  exit();
}

// Validate: last name
if( ! isset($_POST['last_name']) ){
  $error_message = 'Last name is missing';
  header("Location: /signup/error/$error_message");
  exit();
}
if( strlen($_POST['last_name']) < 2 ){
  $error_message = 'Last name is too short. It must be at least 2 characters and no longer than 50 characters.';
  header("Location: /mandatory-1/signup/error/$error_message");
  exit();
}
if( strlen($_POST['last_name']) > 50){
  $error_message = 'Last name is too long. It must be at least 2 characters and no longer than 50 characters.';
  header("Location: /mandatory-1/signup/error/$error_message");
  exit();
}

// Validate: age
if( ! isset($_POST['age']) ){
  $error_message = 'Age is missing';
  header("Location: /signup/error/$error_message");
  exit();
}
if( ! ctype_digit($_POST['age']) ) {
  $error_message = 'Age must be a digit.';
  header("Location: /mandatory-1/signup/error/$error_message");
  exit();
}
if( $_POST['age'] < 0 ) { 
  $error_message = 'Age input is a negative number. It must be between 1 and 200.';
  header("Location: /mandatory-1/signup/error/$error_message");
  exit();
}
if( $_POST['age'] > 200 ) { 
  $error_message = 'Age input value is too large. It must be between 1 and 200.';
  header("Location: /mandatory-1/signup/error/$error_message");
  exit();
}

// Validate: email
if( ! isset($_POST['email']) ){
  $error_message = 'Email is missing';
  header("Location: /signup/error/$error_message");
  exit();
}
if( ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
  $error_message = 'The email is not valid.';
  header('Location: /mandatory-1/signup/error/$error_message');
  exit();
}

// Validate: password
if( ! isset($_POST['password']) ){
  $error_message = 'Password is missing';
  header("Location: /signup/error/$error_message");
  exit();
}
if( strlen($_POST['password']) < 5 ){
  $error_message = 'The password is too short. It must be at least 5 characters and no more than 20 characters.';
  header('Location: /mandatory-1/signup/error/$error_message');
  exit();
}
if( strlen($_POST['password']) > 50){
  $error_message = 'The password is too large. It must be at least 5 characters and no more than 20 characters.';
  header('Location: /mandatory-1/signup/error/$error_message');
  exit();
}

// Validate: repeat password
if( ! isset($_POST['repeat_password']) ){
  $error_message = 'Repeat password input field is empty. You must repeat your password.';
  header("Location: /signup/error/$error_message");
  exit();
}
if( $_POST['repeat_password'] != $_POST['password']){
  $error_message = 'Repeat password input field does not match password input field. Passwords must match.';
  header('Location: /mandatory-1/signup/error/$error_message');
  exit();
  }


// If validation was a success

// ###############################
// Connect to data base
// ###############################
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
  header('Location: /mandatory-1/login');
  exit();
} catch(PDOException $e){
  exit();
}