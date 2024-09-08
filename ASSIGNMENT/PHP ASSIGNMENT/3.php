Write a PHP program to find the largest of three numbers using ternary
Operator.<br><br>

<?php
	$num1 = 10;
	$num2 = 20;
	$num3 = 15;

	$largest = ($num1 > $num2) ? (($num1 > $num3) ? $num1 : $num3) : (($num2 > $num3) ? $num2 : $num3);
	echo "The largest number is : $largest";
	?>

