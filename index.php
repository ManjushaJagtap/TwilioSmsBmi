<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php

require_once 'vendor/autoload.php'; // Loads the library
use Twilio\Twiml;

$response = new Twiml;
$response->message("I received your input!");

print $response;


?>