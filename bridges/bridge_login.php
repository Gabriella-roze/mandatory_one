<?php
// ###############################
// Backend Validation
// ###############################

// Validate: email
if( ! isset($_POST['user_email']) ){
  $login_error = 'Email is missing';
  header("Location: /mandatory-1/login/error/$login_error");
  exit();
}
if( ! filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL) ){
  $login_error = 'Email is not valid';
  header("Location: /mandatory-1/login/error/$login_error");
  exit();
}

// Validate: password
if( ! isset($_POST['user_password']) ){
  $login_error = 'Password is missing';
  header("Location: /mandatory-1/login/error/$login_error");
  exit();
}
if( strlen($_POST['user_password']) < 5 || strlen($_POST['user_password']) > 20){
  $login_error = 'Wrong credentials';
  header("Location: /mandatory-1/login/error/$login_error");
  exit();
}

// ###############################
// Connect to database
// ###############################
require_once(__DIR__.'/../db.php');
// Find user in db and redirect accordingly
try{
  // Find user with given email
  $q = $db->prepare('SELECT * FROM User WHERE email = :email AND password = :password LIMIT 1');
  $q->bindValue(':email', $_POST['user_email']);
  $q->bindValue(':password', $_POST['user_password']);
  $q->execute();
  $user = $q->fetchAll();
  // The user is not found in the db
  if( count($user) == 0 ){
    $login_error = 'Wrong credentials';
    header("Location: /mandatory-1/login/error/$login_error");
    exit();
  }
  // The user is found in the db
  // The password is correct
  session_start();
  unset($user[0]->password);
  $_SESSION['user'] = $user[0];
  header('Location: /mandatory-1/admin');
  exit();
}catch(PDOException $ex){
  $login_error = 'We could not connect to database. Please try again later.';
  header("Location: /mandatory-1/login/error/$login_error");
  exit();
}