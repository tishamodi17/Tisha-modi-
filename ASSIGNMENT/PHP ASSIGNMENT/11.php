Get random values from array.<br><br>

<?php
	$array = ['Tisha','Aarti','raj','Astha'];

	$randomKey = array_rand($array);
	$randomValue = $array[$randomKey];

	echo "<h3>Single Random Value:</h3>";
	echo $randomValue;

	echo "<br><br>";

	$randomKeys = array_rand($array,3);

	echo "<h3>Multiple Random Values:</h3>";
	foreach ($randomKeys as $key) 
	{
		echo $array[$key] . "<br>";
	}
?>