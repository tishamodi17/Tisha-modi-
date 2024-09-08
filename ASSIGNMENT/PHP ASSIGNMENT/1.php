

<?php
$Physics = 85;
$Chemistry = 70;
$Biology = 44;
$Mathematics = 64;
$Computer = 54;

$total_marks = $Physics + $Chemistry + $Biology + $Mathematics + $Computer;

$percentage = ($total_marks / 500) * 100;

if ($percentage >= 90)
{
	$grade = "A";

}
elseif ($percentage >= 80 && $total_marks < 90)
 {
   $grade = "B";
}
 
 elseif ($percentage >= 70 && $total_marks < 80)
 {
   $grade = "C";
}
elseif ($percentage >= 70 && $total_marks < 60)
 {
   $grade = "D";
}

else
{
	$grade = "E";
}

echo "Total Marks: $total_marks/500 <br><br>";
echo "Percentage Marks: $percentage%<br><br>";
echo " Grade: $grade<br><br>";


$day_number = 4;
 switch ($day_number) {
 	case 0;
 		echo "Sunday";
 		break;
 	
 	case 1;
 		echo "Monday";
 		break;
 		
 		case 2;
 		echo "Tuseday";
 		break;

 		case 3;
 		echo "Wednesday";
 		break;

 		case 4;
 		echo "Thursday";
 		break;

 		case 5;
 		echo "Friday";
 		break;

 		case 6;
 		echo "Saturday";
 		break;

 		case 7;
 		echo "Sunday";
 		break;

 		default:
 		echo "Invalid day number";
 		break;
 }
?>