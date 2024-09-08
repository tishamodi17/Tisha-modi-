Write program to remove duplicate values from array,<br><br>

<?php
	$originalArray = [1,2,3,4,2,6,5,4,9,3,7];

	$uniqueArray = array_unique($originalArray);

	echo "<h3>Original Array:</h3>";
	echo "<br><br>";
	print_r($originalArray);
	echo "<br><br>";

	echo "<h3>Array After Removing Duplicates:</h3>";
	echo "<br><br>";
	print_r($uniqueArray);
	echo "<br><br>";

?>