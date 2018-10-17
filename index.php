
<?php
error_reporting(E_ALL);
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





$body = $_REQUEST['Body']; 
$to = $_REQUEST['From'];
$from = $_REQUEST['To'];
file_put_contents("php://stderr", substr($body,9,5).PHP_EOL);
file_put_contents("php://stderr", substr($body,23,5).PHP_EOL);
$height=substr($body,9,4);
$weight=substr($body,23,4);

$bmi=$weight / ($height * $height);  
if($bmi <="18.5")
{
	$client->messages->create(
        $to,
        array(
            'from' => $from,
			'body' => "Your BMI is : " + $bmi,
			'body' => "\n\nYou are UNDERWEIGHT \n\nFood Intake Necessary : \n\tMilk \n\tBanana \n\tDried Fruits \n\n Exercise Necessary : \n\tSwimming \n\tSquats \n\tCardio \n\tPullups \n\tDumbbell \n\tLateral \n\tRaises \n\tPushups",
        )
    );
	
}
$response->message("Body mass index is: " .$bmi. "kg/m<sup>2</sup>") ;

/* if($height !="1")
{
	$client->messages->create(
        $to,
        array(
            'from' => $from,
            'body' => "You are over weight",
        )
    );
}
 */
?>
