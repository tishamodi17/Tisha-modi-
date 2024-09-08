What will be the values of $a and $b after the code below is executed?
Explain your answer.
$a = '1';
$b = &$a;
$b = "2$b";<br><br>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
	$a = '1';
	$b = &$a;
	$b = "2$b";

	echo "Value of \$a: $a<br>";
	echo "Value of \$b: $b<br>";
?>
</body>
</html>