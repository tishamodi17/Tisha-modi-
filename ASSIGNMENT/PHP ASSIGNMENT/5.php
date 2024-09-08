Write a program to find whether a number is Armstrong or not Write a
program to print the below format :
5 9
2610
3711
4812 <br><br>

<?php
	function isArmstrong($number)
	{
		$sum = 0;
		$temp = $number;
		$digits = strlen((string)$number);

		while ($temp > 0)
		{
			$remainder = $temp % 10;
			$sum += pow($remainder, $digits);
			$temp = (int)($temp / 10);
		}
		return ($sum == $number);
	}

	$number = 153;
	if (isArmstrong($number))
	{
		echo "$number is an Armstrong number.<br>";
	}
	else
	{
		echo "$number is not an Armstrong number.<br>";
	}

	echo "<br>";

	echo "5 9<br>";
	for ($i = 2; $i <= 4; $i++)
	{
		$first = $i + 3;
		$second = $first +4;
		echo "$first$second<br>";
	}
?>