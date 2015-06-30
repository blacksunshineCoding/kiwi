<?php
$data['table'] = $main['tables']['releases'];
$deleteFeedback = '';
$copyFeedback = '';
$newFeedback = '';
$editFeedback = '';
$bildUploadFeedback = '';
$dateiUploadFeedback = '';

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
			if (isset($_GET[$data['table']['name'] . 'Id'])) {
				$db->deleteRow('id', $_GET[$data['table']['name'] . 'Id'], $data['table']['name']);
				$deleteFeedback['type'] = 'info';
				$deleteFeedback['text'] = $data['table']['singular'] . ' wurde erfolgreich gelöscht.';
			}
			break;
			
		case 'copy':
			$modulansicht = 'list';
			if (isset($_GET[$data['table']['name'] . 'Id'])) {
				$copyEntry = $db->getRow('SELECT * FROM ' . $data['table']['name'] . ' WHERE id = ' . $db->escape($_GET[$data['table']['name'] . 'Id']));
				unset($copyEntry['id']);
				$copyEntry['titel'] .= ' (Kopie)';
				$db->insertRow($copyEntry, $data['table']['name']);
				$copyFeedback['type'] = 'info';
				$copyFeedback['text'] = $data['table']['singular'] . ' wurde erfolgreich kopiert.';
			}
			break;
	}
} else {
	$modulansicht = 'list';
}

$incFile = dirname(__FILE__) . '/' . $data['table']['name'] . ucfirst($modulansicht) . 'Inc.php';
if (file_exists($incFile)) {
	include_once($incFile);
}