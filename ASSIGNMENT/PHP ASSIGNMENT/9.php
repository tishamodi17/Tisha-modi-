How can you declare the array (all type) in PHP? Explain with example
Covert a JSON string to array.<br><br>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP Array example</title>
</head>
<body>
	<h1>PHP array declartaion and JSON to Array Coversion</h1>

	<?php
	//Indexed Array
	$indexedArray = [1,2,3,4,5,6];
	echo "<h3>indexed Array</h3>";
	echo "<pre>";
	print_r($indexedArray);
	echo "</pre>";

	//Associative Array
	$associativeArray = [
		"name" => "Tisha",
		"age" => "20",
		"City" => "Patan"
	];
	echo "<h3>Associative Array</h3>";
	echo "<pre>";
	print_r($associativeArray);
	echo "</pre>";

	//MultiDemistional Array
	$multidimensionalarray = [
		["APPLE","BANANA","CHERRY"],
		["DOG","LION","FOX"],
		["GREEN","RED","BLUE"]
	];
	echo "<h3>multidimensional Array</h3>";
	echo "<pre>";
	print_r($multidimensionalarray);
	echo "</pre>";

	$jsonArray = json_decode($jsonString, true);

	echo "<h3>JSON String to  Array</h3>";
	echo "<pre>";
	echo "JSON String:" . $jsonString . "<br>";
	print_r($jsonArray);
	echo "</pre>";
?>

</body>
</html>