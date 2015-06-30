<?php
$data['table'] = $main['tables']['releases'];
$deleteFeedback = '';
$copyFeedback = '';

if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		default:
		case 'all':
			$modulansicht = 'list';
			break;

		case 'edit':
			$modulansicht = 'edit';
			break;
			
		case 'new':
			$modulansicht = 'new';
			break;

		case 'delete':
			$modulansicht = 'list';
			if (isset($_GET['releasesId'])) {
				deleteRow('id', $_GET['releasesId'], $data['table']['name']);
				$deleteFeedback['type'] = 'info';
				$deleteFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gelöscht.';
			}
			break;
	}
} else {
	$modulansicht = 'list';
}

$releasesIncFile = dirname(__FILE__) . '/releases' . ucfirst($modulansicht) . 'Inc.php';
if (file_exists($releasesIncFile)) {
	include_once($releasesIncFile);
}