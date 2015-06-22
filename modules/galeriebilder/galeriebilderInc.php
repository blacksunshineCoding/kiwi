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

$galeriebilderIncFile = dirname(__FILE__) . '/galeriebilder' . ucfirst($modulansicht) . 'Inc.php';
if (file_exists($galeriebilderIncFile)) {
	include_once($galeriebilderIncFile);
}

$main['cssFiles'][] = 'modules/galeriebilder/galeriebilder.css';