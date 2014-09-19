<?php

function hash2($s)
{
	$h = 7;

	$letters = "acdegilmnoprstuw";

	for ($i=0; $i < strlen($s); $i++) { 
		$pos = strpos($letters, $s[$i]);
		if ($pos === false) {
			$char = $s[$i];
			unset($pos);
			throw new ErrorException("The character {$char} does not exist in the string {$letters}");
		} else {
			$h = ($h * 37 + $pos);
		}

	}
	return $h;
}

echo hash2("leepadg") . "\n";

function recursive_hash2($s, $j)
{
	$letters = "acdegilmnoprstuw";

	if ($j == 0) {
		return 7;
	} else {
		return recursive_hash2($s, --$j) * 37 + strpos($letters, $s[$j]);
	}
}
$str = "leepadg";
echo recursive_hash2($str, strlen($str)) . "\n";

function reverse_hash2($number)
{
	$letters = "acdegilmnoprstuw";

	$reduced = ($number - ($number % 37)) / 37;
	if ($number < 16) {
		return null;
	} else {
	 	return reverse_hash2($reduced) . $letters[$number%37];
	}
}

echo( reverse_hash2(680131659347) . "\n");
echo( reverse_hash2(945924806726376) . "\n");

$str = "gilleland";
echo( reverse_hash2(recursive_hash2($str, strlen($str))) . "\n");

function iterative_reverse_hash2($number)
{
	$letters = "acdegilmnoprstuw";
	$string = "";

	while ($number > 16) {
		$string = $letters[($number % 37)] . $string;
		$number = (($number - ($number % 37)) / 37);
	}
	return $string;
}

echo iterative_reverse_hash2(945924806726376) . "\n";
echo( iterative_reverse_hash2(recursive_hash2($str, strlen($str))) . "\n");

