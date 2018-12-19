#!/usr/bin/php
<?php
error_reporting( -1 );
$lines  = file( '2_1.in', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
while ( $word = array_shift( $lines ) ) {
	foreach ( $lines as $line ) {
		$lev = levenshtein($word, $line);
		if ( $lev == 1 ) {
			echo "$word, $line, $lev\n";
			$arr1 = str_split($word);
			$arr2 = str_split($line);
			echo "RESULT: " . join("", (array_intersect_assoc($arr1,$arr2))) . "\n";
			exit;
		}
	}
}
