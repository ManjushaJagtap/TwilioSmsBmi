Twilio
TALK TO SALES  SUPPORT PLANS  TALK TO SUPPORT  API STATUS  VISIT TWILIO.COM
Help Center
Twilio Support   Programmable Messaging   SMS

Start your search
Building an SMS keyword response application
SMS keyword applications are designed to send customized SMS replies based on the ‘Body’ of the incoming text message.

When an SMS message is received at your Twilio phone number, your application will fetch the ‘Body’ request parameter of the message. Your application will then match the text of your incoming message with the keywords you have listed and send a reply.

 

The following is a PHP code example of a SMS Keyword Response Application. When an animal name messaged to a Twilio phone number, the definition of the animal with a photo is replied in response.

<?php
// Code for Twilio Support Document: https://support.twilio.com/hc/en-us/articles/223134267-Building-an-SMS-Keyword-Response-Application
// Get the PHP helper library from twilio.com/docs/php/install
require __DIR__ . '/vendor/autoload.php'; // Loads the library. This may vary depending on how you installed the library.
use Twilio\Rest\Client;

/*
** Your Account Sid and Auth Token from twilio.com/user/account
*/
$sid = "AC7c22b85c625b7e97da50232ee1d49597";
$token = "aea5ba68af2f804d7700077f93df54ef";
$client = new Client($sid, $token);

/* 
** Array of response messages, to represent the function of a database.
*/
$responseMessages = array(
    'monkey'    => array('body' => 'Monkey. A small to medium-sized primate that typically has a long tail, most kinds of which live in trees in tropical countries.', 
                         'media' => 'https://cdn.pixabay.com/photo/2016/02/12/23/49/scented-monkey-1197100_960_720.jpg'),
    'dog'       => array('body' => 'Dog. A domesticated carnivorous mammal that typically has a long snout, an acute sense of smell, and a barking, howling, or whining voice.',
                         'media' => 'https://cdn.pixabay.com/photo/2016/10/15/12/01/dog-1742295_960_720.jpg'),
    'pigeon'   => array('body' => 'Pigeon. A stout seed- or fruit-eating bird with a small head, short legs, and a cooing voice, typically having gray and white plumage.',
                         'media' => 'https://cdn.pixabay.com/photo/2016/11/17/21/12/pigeon-1832742_960_720.jpg'),
    'owl'       => array('body' => 'Owl. A nocturnal bird of prey with large forward-facing eyes surrounded by facial disks, a hooked beak, and typically a loud call.',
                         'media' => 'https://cdn.pixabay.com/photo/2013/02/04/20/48/owl-77894_960_720.jpg')
);

/* 
** Default response message when receiving a message without key words.
*/
$defaultMessage = "Reply with one of the following keywords: monkey, dog, pigeon, owl.";

/*
** Read the contents of the incoming message fields.
*/ 
$body = $_REQUEST['Body']; 
$to = $_REQUEST['From'];
$from = $_REQUEST['To'];

/*
** Remove formatting from $body until it is just lowercase   
** characters without punctuation or spaces.
*/
$result = preg_replace("/[^A-Za-z0-9]/u", " ", $body); 
$result = trim($result); 
$result = strtolower($result); 
$sendDefault = true; // Default message is sent unless key word is found in following loop.

/*
** Choose the correct message response and set default to false.
*/
foreach ($responseMessages as $animal => $messages) {
    if ($animal == $result) {
        $body = $messages['body'];
        $media = $messages['media'];
        $sendDefault = false;
    }
}

// Send the correct response message.
if ($sendDefault != false) {
    $client->messages->create(
        $to,
        array(
            'from' => $from,
            'body' => $defaultMessage,
        )
    );
} else {
    $client->messages->create(
        $to,
        array(
            'from' => $from,
            'body' => $body,
            'mediaUrl' => $media,
        )
    );
}
Was this article helpful?   9 out of 23 found this helpful	Facebook Twitter LinkedIn Google+
Have more questions? Submit a request
Recently viewed articles
Receiving Two-Way SMS and MMS Messages with Twilio
Related articles
Receiving Two-Way SMS and MMS Messages with Twilio
Configuring Phone Numbers to Receive and Respond to SMS and MMS Messages
How to use templates with TwiML Bins
Forwarding SMS messages to another phone number
Sending and Receiving Limitations on Calls and SMS Messages
We can’t wait to see what you build.
 ABOUT TWILIO LEGAL PRIVACY TWILIO.ORG PRESS & MEDIA JOBS
COPYRIGHT © 2018 TWILIO, INC. ALL RIGHTS RESERVED.
