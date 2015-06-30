<?php
$data['table'] = $main['tables']['sites'];
$deleteFeedback = '';
$copyFeedback = '';

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

		case 'delete':
			$modulansicht = 'list';
			if (isset($_GET['sitesId'])) {
				deleteRow('id', $_GET['sitesId'], $data['table']['name']);
				$deleteFeedback['type'] = 'info';
				$deleteFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gelöscht.';
			}
			break;

		case 'copy':
			$modulansicht = 'list';
			if (isset($_GET['sitesId'])) {
				$copyEntry = getRow('SELECT * FROM sites WHERE id = ' . sqlEscape($_GET['sitesId']));
				unset($copyEntry['id']);
				$copyEntry['titel'] .= ' (Kopie)';
				insertRow($copyEntry, $data['table']['name']);
				$copyFeedback['type'] = 'info';
				$copyFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich kopiert.';
			}
			break;
	}
} else {
	$modulansicht = 'list';
}

$sitesIncFile = dirname(__FILE__) . '/sites' . ucfirst($modulansicht) . 'Inc.php';
if (file_exists($sitesIncFile)) {
	include_once($sitesIncFile);
}