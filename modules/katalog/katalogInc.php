<?php
$data['lagerbestaende'] = getRows('SELECT * FROM produktvarianten');

if (isset($_GET['produkteId'])) {
	$modulansicht = 'detail';
	
} elseif (isset($_GET['ansicht'])) {
	
	switch ($_GET['ansicht']) {
		
		case 'warenkorb':
			$modulansicht = 'warenkorb';
			break;
		
		case 'daten':
			$modulansicht = 'daten';
			break;
			
		case 'uebersicht':
			$modulansicht = 'uebersicht';
			break;
			
		case 'abschluss':
			$modulansicht = 'kassa';
			break;
	}

} else {
	$modulansicht = 'liste';
}

$katalogIncFile = dirname(__FILE__) . '/katalog' . ucfirst($modulansicht) . 'Inc.php';
if (file_exists($katalogIncFile)) {
	include_once($katalogIncFile);
}

$main['cssFiles'][] = 'modules/katalog/katalog.css';