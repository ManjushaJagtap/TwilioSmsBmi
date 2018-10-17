
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

$client->messages->create(
	$to,
	array(
		'from' => $from,
		'body' => "Your BMI is : ".$bmi,
	)
);

if($bmi <="18.5")

{
	$client->messages->create(
        $to,
        array(
            'from' => $from,
			'body' => "\n\nYou are UNDERWEIGHT \n\nFood Intake Necessary : \n\tMilk \n\tBanana \n\tDried Fruits \n\n Exercise Necessary : \n\tSwimming \n\tSquats \n\tCardio \n\tPullups \n\tDumbbell \n\tLateral \n\tRaises \n\tPushups",
        )
    );
	
}

if($bmi >"18.5" and $bmi <="24.9")
{
	$client->messages->create(
        $to,
        array(
            'from' => $from,
			'body' => "\n\nYou are HEALTHY \n\nYou are good to go !! Continue with same diet plan and exercise",
        )
    );
	
}

if("25.0"<= $bmi and $bmi <="29.9")
{
	$client->messages->create(
        $to,
        array(
            'from' => $from,
			'body' => "\n\nYou are OVERWEIGHT \n\nFood Intake Necessary : \n\tVegetables \n\tSprouts \n\tYogurt \n\tGreen Tea \n\tFruits \n\n Exercise Necessary : \n\tBench Press \n\tIncline Bench Press \n\tCable Crossovers \n\tOne Arm Dumbbell Rows \n\tBar pulldowns \n\tDeadlifts",
        )
    );
}
		
if($bmi >="30.0")

{
	$client->messages->create(
        $to,
        array(
            'from' => $from,
			'body' => "\n\nYou are OBESE \n\nFood Intake Necessary : \n\tGreen Leafy Vegetables \n\tAvocado \n\t\Wheat \n\tSoyabean \n\tCocoa \n\tBerries \n\tGarlic \n\n Exercise Necessary : \n\tLeg Press \n\tLeg Extensions \n\tHamstring Curls \n\tSeated Calf Raises \n\tStanding Calf Raises",
        )
    );
}
?>
