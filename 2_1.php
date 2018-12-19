#!/usr/bin/php
<?php
error_reporting( -1 );
$lines  = file( '2_1.in', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
$twos = 0;
$threes = 0;
foreach ( $lines as $line_num => $line ) {
	echo "LINE $line_num: $line\n";
	$count = count_chars($line,1);
	#var_dump( $count );
	if ( in_array( 2, array_values( $count ) ) ) $twos++;
	if ( in_array( 3, array_values( $count ) ) ) $threes++;
}
echo "Checksum: " . $twos * $threes . "\n";
