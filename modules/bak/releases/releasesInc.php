<?php
if (isset($_GET['releasesId'])) {
	$modulansicht = 'detail';
	
} elseif (isset($_GET['ansicht'])) {
	
	switch ($_GET['ansicht']) {
		
		case 'list':
			$modulansicht = 'list';
			break;
			
		case 'detail':
			$modulansicht = 'detail';
			break;
	}

} else {
	$modulansicht = 'list';
}

$releasesIncFile = dirname(__FILE__) . '/releases' . ucfirst($modulansicht) . 'Inc.php';
if (file_exists($releasesIncFile)) {
	include_once($releasesIncFile);
}

$main['cssFiles'][] = 'modules/releases/releases.css';