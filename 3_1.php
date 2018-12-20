#!/usr/bin/php
<?php
error_reporting( -1 );
$map = [];
$lines  = file( '3_1.in', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
foreach ( $lines as $line_num => $line ) {
	preg_match_all( '|^#\d+ @ (\d+),(\d+): (\d+)x(\d+)$|', $line, $matches );
	#var_dump( $matches );
	$x = $matches[1][0];
	$y = $matches[2][0];
	$w = $matches[3][0];
	$h = $matches[4][0];
	#echo "$line\n";
	#echo "$x,$y: $w x $h\n";
	for ( $i = $x; $i < ( $x + $w ); $i++ ) {
		for ( $j = $y; $j < ( $y + $h ); $j++ ) {
			#echo "$i,$j\n";
			if ( !isset( $map[$i][$j] ) ) $map[$i][$j] = 0;
			$map[$i][$j] += 1;
		}
	}
	#echo "\n";
}
$multi = 0;
for ( $i = min( array_keys( $map ) ); $i <= max( array_keys( $map ) ); $i++ ) {
	for ( $j = min( array_keys( $map[$i] ) ); $j <= max( array_keys( $map[$i] ) ); $j++ ) {
		#echo "$i,$j: " . $map[$i][$j] . "\n";
		if ( isset( $map[$i][$j] ) && $map[$i][$j] > 1 ) $multi++;
	}
}
echo "$multi\n";
