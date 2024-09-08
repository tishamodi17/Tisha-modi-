Write a PHP program to check Leap years between 1901 to 2016 Using nested if.<br><br>
<?php
	for ($year = 1901; $year <= 2016; $year++)
	{
		if ($year % 4 == 0)
		{
			if ($year % 100 == 0)
			{
				if ($year % 400 == 0) {
					echo "$year is a leap year.<br>";
				}
				else
				{

				}
			}
			else
			{
				echo "$year is a leap year.<br>";
			}
		}
		else
		{

		}
	}
?>