#!/usr/bin/php
<?php
error_reporting( -1 );
$freq = 0;
$buff = [];
while ( true ) {
	$lines  = file( '1_1.in', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
	foreach ( $lines as $line_num => $line ) {
		$freq += $line;
		if ( isset( $buff[$freq] ) ) {
			exit("HIT TWICE: $freq!\n");
		}
		else {
			$buff[$freq] = true;
		}	
	}
}
