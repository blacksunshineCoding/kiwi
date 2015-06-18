<?php
$data['table'] = $main['tables']['produktkategorien'];
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
			if (isset($_GET['produktkategorienId'])) {
				deleteRow('id', $_GET['produktkategorienId'], $data['table']['name']);
				$deleteFeedback['type'] = 'info';
				$deleteFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gelöscht.';
			}
			break;

		case 'copy':
			$modulansicht = 'list';
			if (isset($_GET['produktkategorienId'])) {
				$copyEntry = getRow('SELECT * FROM produktkategorien WHERE id = ' . sqlEscape($_GET['produktkategorienId']));
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

$produktkategorienIncFile = dirname(__FILE__) . '/produktkategorien' . ucfirst($modulansicht) . 'Inc.php';
if (file_exists($produktkategorienIncFile)) {
	include_once($produktkategorienIncFile);
}