<?php
require_once(__DIR__.'/router.php');

// ##################################################
get('/mandatory-1', 'serve_index');
function serve_index(){
  $page_title = 'Welcome';
  require_once(__DIR__.'/views/view_top.php');
  require_once(__DIR__.'/views/view_index.php');
  require_once(__DIR__.'/views/view_bottom.php');
  exit();
}

// ##################################################
get('/mandatory-1/admin', 'serve_admin');
function serve_admin(){
  session_start();
  if( ! isset( $_SESSION['user'] ) ){
    header('Location: /mandatory-1/login');
    exit();
  }
  require_once(__DIR__.'/views/view_admin.php');
  exit();
}

// ##################################################
get('/mandatory-1/deactivate_user', 'deactivate_user');
function deactivate_user(){
  require_once(__DIR__.'/bridges/bridge_deactivate_user.php');
  exit();
}

// ##################################################
get('/mandatory-1/login', 'serve_login');
function serve_login(){
  $page_title = 'login';
  require_once(__DIR__.'/views/view_top.php');
  require_once(__DIR__.'/views/view_login.php');
  require_once(__DIR__.'/views/view_bottom.php');
  exit();
}

// ##################################################
get('/mandatory-1/login/error/:login_error', 'serve_login_error');
function serve_login_error($login_error){
  $page_title = 'login';
  $display_error = true;
  require_once(__DIR__.'/views/view_top.php');
  require_once(__DIR__.'/views/view_login.php');
  require_once(__DIR__.'/views/view_bottom.php');
  exit();
}

// ##################################################
get('/mandatory-1/logout', 'serve_logout');
function serve_logout(){
  require_once(__DIR__.'/bridges/bridge_logout.php');
  exit();
}

// ##################################################
get('/mandatory-1/show-users', 'serve_users');
function serve_users(){
  $page_title = 'Users';
  require_once(__DIR__.'/views/view_top.php');
  require_once(__DIR__.'/views/view_users.php');
  require_once(__DIR__.'/views/view_bottom.php');
  exit();
}

// ##################################################
get('/mandatory-1/signup', 'serve_signup');
function serve_signup(){
  $page_title = 'Signup';
  require_once(__DIR__.'/views/view_top.php');
  require_once(__DIR__.'/views/view_signup.php');
  require_once(__DIR__.'/views/view_bottom.php');
  exit();
}
// ##################################################
get('/mandatory-1/signup/error/:error_message', 'serve_signup_error');
function serve_signup_error($error_message){
  $page_title = 'Signup';
  $display_error = true;
  require_once(__DIR__.'/views/view_top.php');
  require_once(__DIR__.'/views/view_signup.php');
  require_once(__DIR__.'/views/view_bottom.php');
  exit();
}

// ##################################################
post('/mandatory-1/login', 'login');
function login(){
  require_once(__DIR__.'/bridges/bridge_login.php');
  exit();
}

// ##################################################
post('/mandatory-1/signup', 'signup');
function signup(){
  require_once(__DIR__.'/bridges/bridge_signup.php');
  exit();
}

// ##################################################
any('/404', 'error404');
function error404(){
  echo 'Not found';
  exit();
}