#!/usr/bin/php
<?php
$map = [];
$lines  = file( '3_1.in', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
foreach ( $lines as $line_num => $line ) {
	preg_match_all( '|^#\d+ @ (\d+),(\d+): (\d+)x(\d+)$|', $line, $matches, PREG_SET_ORDER );
	list( , $x, $y, $w, $h ) = $matches[0];
	for ( $i = $x; $i < ( $x + $w ); $i++ ) {
		for ( $j = $y; $j < ( $y + $h ); $j++ ) {
			if ( !isset( $map[$i][$j] ) ) $map[$i][$j] = 0;
			$map[$i][$j] += 1;
		}
	}
}
$multi = 0;
for ( $i = min( array_keys( $map ) ); $i <= max( array_keys( $map ) ); $i++ ) {
	for ( $j = min( array_keys( $map[$i] ) ); $j <= max( array_keys( $map[$i] ) ); $j++ ) {
		if ( isset( $map[$i][$j] ) && $map[$i][$j] > 1 ) $multi++;
	}
}
echo "$multi\n";
