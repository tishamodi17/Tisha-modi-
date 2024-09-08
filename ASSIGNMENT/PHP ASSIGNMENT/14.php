Declare a Multi Dimensioned array of floats called balances having Three
rows and five columns.<br><br>

<?php
	$balances = [
		[100.50,200.75,300.60,400.30,500.10],
		[150.25,250.50,350.75,450.60,550.20],
		[120.90,220.80,320.70,420.40,520.50]
	];

	echo "<h3>Balances Array:</h3>";
	echo "<pre>";
	print_r($balances);
	echo "</pre>";
?>