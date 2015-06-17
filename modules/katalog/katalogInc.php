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

$katalogIncFile = dirname(__FILE__) . '/katalog' . ucfirst($modulansicht) . 'Inc.php';
if (file_exists($katalogIncFile)) {
	include_once($katalogIncFile);
}

$main['cssFiles'][] = 'modules/katalog/katalog.css';