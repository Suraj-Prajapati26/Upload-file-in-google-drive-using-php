<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('YOUR-CLIENT-ID');
$client->setClientSecret('YOUR-CLIENT-SECRET');
$client->setRedirectUri('REDIRECT-URI');
$client->addScope(Google_Service_Drive::DRIVE_FILE);

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: http://localhost/zzz/insert.php');
}

// Add the debugger
$debug_backtrace = debug_backtrace();
var_dump($debug_backtrace);

// Your code here

?>
