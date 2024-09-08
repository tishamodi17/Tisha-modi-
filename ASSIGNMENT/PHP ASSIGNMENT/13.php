Use a for loop to total the contents of an integer array called numbers which
has five elements. Store the result in an integer called total.<br><br>

<?php
	$numbers = [10,20,30,40,50,60,70];
	$total = 0;

	for ($i=0; $i < count($numbers) ; $i ++) 
	{ 
	 	$total += $numbers[$i];
	}
	echo "<h3>the total of the array elements is: $total</h3>";
?>