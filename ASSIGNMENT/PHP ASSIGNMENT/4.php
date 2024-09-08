Write a program in PHP to print Fibonacci series. 0, 1, 1, 2, 3, 5, 8, 13, 21,34.<br><br>

<?php
$num1 = 0;
$num2 = 1;

echo "$num1,$num2";
for ($i = 2; $i < 10; $i++)
{
	$num3 = $num1 + $num2;
	echo ", $num3";

	$num1 = $num2;
	$num2 = $num3;
}	
?>