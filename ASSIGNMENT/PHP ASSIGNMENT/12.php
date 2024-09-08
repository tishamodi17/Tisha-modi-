Write a PHP script which decodes the following JSON string.<br><br>

<?php
	$jsonString = '{"name": "Tisha", "Age" : "20","City" : "patan"}';

	$decodeArray = json_decode($jsonString,true);

	echo"<h3>Decode Array:</h3>";
	echo "<br><br>";
	print_r($decodeArray);
	echo "<br><br>";

	$decodedObject = json_decode($jsonString);

	echo "<h3>Decoded Object:</h3>";
	echo "<br><br>";
	print_r($decodedObject);
	echo "<br><br>";
	?> 