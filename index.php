<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php

require_once 'vendor/autoload.php'; // Loads the library
use Twilio\Twiml;
$number = $_POST['From'];
$body = $_POST ['Body'];

$response = new Twiml;
$body = $_REQUEST['Body'];
if( $body == 'hello' ){
    $response->message('Hi!');
}else if( $body == 'bye' )
{
    $response->message('Goodbye');
}
print $response;


?>