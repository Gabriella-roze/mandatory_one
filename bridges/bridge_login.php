<?php
// Backend Validation
// Validate: email
if( ! filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL) ){
  header('Location: /mandatory-1/login/error');
  exit();
}
// Validate: password
if( empty($_POST['user_password']) || strlen($_POST['user_password']) < 5 || strlen($_POST['user_password']) > 20){
  header('Location: /mandatory-1/login/error');
  exit();
}
// Connect to data base
require_once(__DIR__.'/../db.php');
// Find user in db and redirect accordingly
try{
  // Find user with given email
  $q = $db->prepare('SELECT * FROM User WHERE email = :email');
  $q->bindValue(':email', $_POST['user_email']);
  $q->execute();
  $user = $q->fetchAll();
  // The user is not found in the db
  if( count($user) == 0 ){
    header('Location: /mandatory-1/login/error');
    exit();
  }
  // The user is found in the db
  // Is the password correct
  if ($user[0]->password != $_POST['user_password']) {
    header('Location: /mandatory-1/login/error');
    exit();
  }
  // The password is correct
  session_start();
  $_SESSION['user'] = $user[0];
  header('Location: /mandatory-1/admin');
  exit();
}catch(PDOException $ex){
  echo $ex;
}