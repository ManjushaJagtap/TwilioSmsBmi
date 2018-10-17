<html>  
<head>  
<title>BMI Calculator</title>  
</head>  
<body>  
<h3>BMI Calculator</h3>  
<?php  
$height=0;  
$width=0;  
 
if ($_POST['heightmtr']!=strval(floatval($_POST['heightmtr'])))   
{  
    echo "Invalid Height<br />";  
    echo "<a href='bmihtml.html'>Plz try again</a>";  
    exit;  
}  

$height=$_POST['heightmtr'];  

if ($height<0 || $height>3)  
{  
    echo "Height must be value between 0 and 3<br />";  
    echo "<a href='bmihtml.html'>try again</a>";  
    exit;  
}  

if ($_POST['weightkg']!=strval(intval($_POST['weightkg'])))   
{  
    echo "Invalid Weight<br/>";  
    echo "<a href='bmihtml.html'>try again</a>";  
    exit;  
}  

$weight=$_POST['weightkg'];  

if ($weight<2.5 || $weight>500)  
{  
    echo "Weight must be value between 0 and 500<br />";  
    echo "<a href='bmihtml.html'>try again</A>";  
    exit;  
}  
/*1. below 18.5(underweight)
2. 18.5-24.9 (Healthy)
3. 25.0-29.9 (Overweight)
4. 30.0 and above (Obese)
*/
$bmi=$weight / ($height * $height);  
echo "Body mass index is: " .$bmi. "kg/m<sup>2</sup>" ;

if($bmi<18.5)
{
	echo "<h3>UNDERWEIGHT</h3>";	
	echo "<h4>Food Intake Necessary:-</h4> <ul><li>milk</li><li>banana</li><li>Dried fruits</li><li>Chicken</li><li>fruits</li><li>egg</li><li>rice</li>";
	echo "<h4>Exercise Necessary:-</h4><ul><li>swimming</li><li>Squats</li><li>lunges</li><li>cardio</li><li>pullups</li><li>Dumbbell</li><li>Lateral</li><li>Raises</li><li>pushups</li></ul> ";	
}
elseif($bmi>=18.5 && $bmi<=24.9)
{
	echo "<h3>Healthy</h3>";	
	echo "You are good to go!!!";
	}
elseif($bmi>=25.0 && $bmi<=29.9)
{

	echo "<h3>Overweight</h3>";	
	echo "<h4>Food Intake Necessary:-</h4> <ul><li>vegetables</li><li>sprouts</li><li>yogurt</li><li>green tea</li><li>fruits</li><li>fruits</li>";
	echo "<h4>Exercise Necessary:-</h4><ul><li>Bench Press</li><li>Incline Bench Press</li><li>Cable Crossovers</li><li>One Arm Dumbbell Rows</li><li>V-bar pulldowns</li><li>Deadlifts</li></ul> ";	
	}
else
{
	echo "<h3>Obese</h3>";	
	echo "<h4>Food Intake Necessary:-</h4> <ul><li>dark green leafy vegetables</li><li>avocado</li><li>wheat</li><li>soyabean</li><li>cocoa</li><li>berries</li><li>garlic</li>";
	echo "<h4>Exercise Necessary:-</h4><ul><li>Leg Press</li><li>Leg Extensions</li><li>Hamstring Curls</li><li>Seated Calf Raises</li><li>Standing Calf Raises</li></ul>";	
	}
?>  
</body>
</html>