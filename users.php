<?php
require_once("./include_functions.php");
protect_page(0);


// Declare variables
$_GET['populate'] = isset($_GET['populate']) ? $_GET['populate'] : '';
$fields = array();

foreach($_SESSION['all_users'] as $user) { // Get user information based on GET parameter
  if($user['id'] === $_GET['populate']) {
    $fields['id'] = $user['id'];
    $fields['username'] = $user['username'];
    $fields['name'] = $user['name'];
    $fields['access'] = $user['access'];
    $fields['flags'] = $user['flags'];
    $fields['attr_1'] = $user['attr_1'];
  }
}

$_SESSION['message_set'] = false;
echo $twig->render('users.html', array(
    'session' => $_SESSION,
    'settings' => $settings,
    'lang' => $_SESSION['lang'],
    'fields' => $fields
));
?>