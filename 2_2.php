#!/usr/bin/php
<?php
$lines  = file( '2_1.in', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
while ( $word = array_shift( $lines ) ) {
	foreach ( $lines as $line ) {
		if ( levenshtein( $word, $line ) == 1 ) {
			echo join( "", ( array_intersect_assoc( str_split( $word ), str_split( $line ) ) ) ) . "\n";
			exit;
		}
	}
}
