<?php
$data['table'] = $main['tables']['settings'];

if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		default:
		case 'all':
			$modulansicht = 'list';
			break;

		case 'new':
			$modulansicht = 'new';
			break;

		case 'edit':
			$modulansicht = 'edit';
			break;
	}
} else {
	$modulansicht = 'list';
}

$settingsIncFile = dirname(__FILE__) . '/settings' . ucfirst($modulansicht) . 'Inc.php';
if (file_exists($settingsIncFile)) {
	include_once($settingsIncFile);
}