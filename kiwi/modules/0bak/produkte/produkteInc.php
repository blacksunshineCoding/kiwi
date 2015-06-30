<?php
$data['table'] = $main['tables']['produkte'];
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
			if (isset($_GET['produkteId'])) {
				deleteRow('id', $_GET['produkteId'], $data['table']['name']);
				$deleteFeedback['type'] = 'info';
				$deleteFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gelöscht.';
			}
			break;

		case 'copy':
			$modulansicht = 'list';
			if (isset($_GET['produkteId'])) {
				$copyEntry = getRow('SELECT * FROM produkte WHERE id = ' . sqlEscape($_GET['produkteId']));
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

$produkteIncFile = dirname(__FILE__) . '/produkte' . ucfirst($modulansicht) . 'Inc.php';
if (file_exists($produkteIncFile)) {
	include_once($produkteIncFile);
}