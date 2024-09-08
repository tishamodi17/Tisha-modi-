How can you tell if a number is even or odd without using any Condition or
loop?<br><br>

<?php
function checkEvenOdd($number)
{
	echo $number % 2 ? "Odd" : "Even";
}
checkEvenOdd(4);
echo "<br>";

checkEvenOdd(7);
echo "<br>";
?>
