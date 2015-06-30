<?php
if (isset($_GET['galeriebilderId'])) {
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

$galeriebilderCmpFile = dirname(__FILE__) . '/galeriebilder' . ucfirst($modulansicht) . 'Cmp.php';
if (file_exists($galeriebilderCmpFile)) {
	include_once($galeriebilderCmpFile);
}