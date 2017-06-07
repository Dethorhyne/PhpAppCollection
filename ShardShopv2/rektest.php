<?php


function bin($n)
{

	if ($n <= 1)
	{
		if ($n == 1) echo 1;
		else echo 0;
		return($n);
	}

	bin($n / 2);
	echo $n%2;
}


function main() //ovoga zapravo tu nema, samo dajem dojam C-a
{
$broj = 9;
$suma = bin($broj);
}

?>
<html>
	<head>
		<title>Rekurzivna funkcija</title>
	</head>
	<body>
		<?php main();?>
	</body>
</html>