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

$releasesCmpFile = dirname(__FILE__) . '/releases' . ucfirst($modulansicht) . 'Cmp.php';
if (file_exists($releasesCmpFile)) {
	include_once($releasesCmpFile);
}