<?php
if (isset($_GET['produkteId'])) {
	$modulansicht = 'detail';
} elseif (isset($_GET['ansicht']) && $_GET['ansicht'] == 'warenkorb') {
	$modulansicht = 'warenkorb';

} elseif (isset($_GET['ansicht']) && $_GET['ansicht'] == 'kassa') {
	$modulansicht = 'kassa';
	
} else {
	$modulansicht = 'liste';
}

$katalogCmpFile = dirname(__FILE__) . '/katalog' . ucfirst($modulansicht) . 'Cmp.php';
if (file_exists($katalogCmpFile)) {
	include_once($katalogCmpFile);
}