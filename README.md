# Upload-file-in-google-drive-using-php
In this u can upload a file in google drive using php.
Through this code u can upload a select a file from your computer and upload it in a particular folder of a google drive.

#To upload a file to Google Drive using PHP, you can use the Google Drive API PHP client library. Here are the steps you can follow:
1. Create a new project in the Google Developers Console and enable the Google Drive API.

2. Install the Google API PHP client library using composer:
    composer require google/apiclient:^2.0
    
3. Create a new OAuth 2.0 client ID and download the client secret JSON file.

4. Create a new PHP script and include the necessary libraries:
    like i did in "file.php"
    require_once __DIR__ . '/vendor/autoload.php';
    session_start();
    
5. Set up the client credentials in your code:

    In the file.php and insert.php you have to enter your credentials that you generated from the Google Developers Console
    
    $client = new Google_Client();
    $client->setClientId('YOUR_CLIENT_ID');
    $client->setClientSecret('YOUR_CLIENT_SECRET');
    $client->setRedirectUri('REDIRECT_URI');
    $client->addScope(Google_Service_Drive::DRIVE_FILE);
    
    NOTE: the credentials should be same in your console, file.php, insert.php and hello.php. If the credentials are not same it will give you error.
    
    
 How this code works:
 
 file.php: 
        from this you will select the file which u want to upload. After clicking submit it will take you to the insert.php
 insert.php: 
                The code first initializes the Google_Client object and sets the necessary parameters, such as the client ID, client secret, redirect URI, and scope                    for accessing Google Drive files.

        If the user has already granted access to the application, the access token and refresh token are retrieved from the session. If the access token has expired,          the refresh token is used to obtain a new access token.

        Then, the code checks if a file has been uploaded using the $_FILES superglobal. If a file has been uploaded successfully, the code creates a new               Google_Service_Drive_DriveFile object, sets the necessary metadata for the file, reads the file content, and uploads the file to Google Drive using the                 Google_Service_Drive->files->create() method.

        If the file upload is successful, a success message is displayed. If there is an error uploading the file, an error message is displayed.

        If the user has not yet granted access to the application, they are redirected to the Google OAuth2 authorization page to grant access.
    
    NOTE: in a insert.php there is one line where:
    'parents' => array('YOUR_FOLDER_ID')
    IN THIS YOU HAVE TO ENTER YOUR FOLDER ID WHERE YOU WANT TO UPLOAD FILE
    you will get this by opening that folder IN DRIVE-> in url after /folders/YOUR_FOLDER_ID
    
    
 hello.php:
 
        This code initializes a Google client and sets its credentials and redirect URI for authentication. If a code is present in the GET parameters, the client is authenticated using the code, and the access token is stored in the session. Finally, a debug backtrace is printed, and the execution is stopped. This code is incomplete and requires additional code to handle the actual file upload to Google Drive.
        
        IT WILL REDIRECT YOU TO THE insert.php CAUSE I MENTIONED THIS FILE IN The redirect location 
    
    
  IF YOU ARE GETTING ANY ERROR KINDLY CHECK THE CREDENTIALS IN EVERY PAGE+ IN CONSOLE. CHECK THE FOLDER ID YOU ARE GIVING IS PRESENT OR NOT. THE REDIRECT URI SHOULD BE SAME IN THE CONSOLE AND IN THE CODE

