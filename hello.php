<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('1065293136026-m69v8npcc6826ejod57q8jj3b6cdvnhr.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/zzz/hello.php');
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
