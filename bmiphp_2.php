<html>  
<head>  
<title>BMI Calculator</title>  
</head>  
<body>  
<h3>BMI Calculator</h3>  
<?php  

require_once 'vendor/autoload.php'; // Loads the library
use Twilio\Twiml;

$height=0;  
$width=0;  
 
$response = new Twiml;

if ($_POST['heightmtr']!=strval(floatval($_POST['heightmtr'])))   
{  
    $response->message("Invalid Height! Plz try again!");    
    exit;  
}  

$height=$_POST['heightmtr'];  

if ($height<0 || $height>3)  
{  
	$response->message("Height must be value between 0 and 3! Please try again!");  
 
    exit;  
}  

if ($_POST['weightkg']!=strval(intval($_POST['weightkg'])))   
{  
	$response->message("Invalid Weight! Please try again!");   
    exit;  
}  

$weight=$_POST['weightkg'];  

if ($weight<2.5 || $weight>500)  
{  
    $response->message("Weight must be value between 0 and 500. Try again!");  
    exit;  
}  
/*1. below 18.5(underweight)
2. 18.5-24.9 (Healthy)
3. 25.0-29.9 (Overweight)
4. 30.0 and above (Obese)
*/
$bmi=$weight / ($height * $height);  
$response->message("Body mass index is: " .$bmi. "kg/m<sup>2</sup>") ;

if($bmi<18.5)
{
	$response->message("UNDERWEIGHT");	
	$response->message("Food Intake Necessary:-<ul><li>milk</li><li>banana</li><li>Dried fruits</li><li>Chicken</li><li>fruits</li><li>egg</li><li>rice</li>");
	$response->message("Exercise Necessary:-<ul><li>swimming</li><li>Squats</li><li>lunges</li><li>cardio</li><li>pullups</li><li>Dumbbell</li><li>Lateral</li><li>Raises</li><li>pushups</li></ul>");	
}
elseif($bmi>=18.5 && $bmi<=24.9)
{
	$response->message("Healthy");	
	$response->message("You are good to go!!!");
	}
elseif($bmi>=25.0 && $bmi<=29.9)
{

	$response->message("Overweight");	
	$response->message("Food Intake Necessary:-<ul><li>vegetables</li><li>sprouts</li><li>yogurt</li><li>green tea</li><li>fruits</li><li>fruits</li>");
	$response->message( "Exercise Necessary:-<ul><li>Bench Press</li><li>Incline Bench Press</li><li>Cable Crossovers</li><li>One Arm Dumbbell Rows</li><li>V-bar pulldowns</li><li>Deadlifts</li></ul> ");	
	}
else
{
	$response->message("Obese");	
	$response->message("Food Intake Necessary:-<ul><li>dark green leafy vegetables</li><li>avocado</li><li>wheat</li><li>soyabean</li><li>cocoa</li><li>berries</li><li>garlic</li>");
	$response->message("Exercise Necessary:-<ul><li>Leg Press</li><li>Leg Extensions</li><li>Hamstring Curls</li><li>Seated Calf Raises</li><li>Standing Calf Raises</li></ul>");	
	}
	print $response;
?>  
</body>
</html>