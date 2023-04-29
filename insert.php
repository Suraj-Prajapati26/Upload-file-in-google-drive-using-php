<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('1065293136026-m69v8npcc6826ejod57q8jj3b6cdvnhr.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/zzz/hello.php');
$client->addScope(Google_Service_Drive::DRIVE_FILE);

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    // echo "Access Token: " . $_SESSION['access_token'];
  
    if ($client->isAccessTokenExpired() && isset($_SESSION['refresh_token']) && $_SESSION['refresh_token']) {
      $client->fetchAccessTokenWithRefreshToken($_SESSION['refresh_token']);
      $_SESSION['access_token'] = $client->getAccessToken();
    }
  
    $service = new Google_Service_Drive($client);
  
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
      $fileMetadata = new Google_Service_Drive_DriveFile(array(
        'name' => $_FILES['file']['name'],
        'parents' => array('1VFqR4BIP6gZUoHO0PpKSFREiHa4Y_hKM'),
        'mimeType' => $_FILES['file']['type']
      ));
      $content = file_get_contents($_FILES['file']['tmp_name']);
      $file = $service->files->create($fileMetadata, array(
        'data' => $content,
        'mimeType' => $_FILES['file']['type'],
        'uploadType' => 'multipart',
        'fields' => 'id'
      ));
      echo "Thank you, your file has been uploaded!";
    } else {
      echo "There was an error uploading your file. Error code: " . $_FILES['file']['error'];
    }
  } else {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . $authUrl);
  }
  