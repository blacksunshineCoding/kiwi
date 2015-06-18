<?php
$data['table'] = $main['tables']['nodes'];
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
				
		case 'tree':
			$modulansicht = 'tree';
			break;
				
		case 'edit':
			$modulansicht = 'edit';
			break;
				
		case 'delete':
			$modulansicht = 'list';
			if (isset($_GET['nodesId'])) {
				deleteRow('id', $_GET['nodesId'], $data['table']['name']);
				$deleteFeedback['type'] = 'info';
				$deleteFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gelöscht.';
			}
			break;
				
		case 'copy':
			$modulansicht = 'list';
			if (isset($_GET['nodesId'])) {
				$copyEntry = getRow('SELECT * FROM nodes WHERE id = ' . sqlEscape($_GET['nodesId']));
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

$nodesIncFile = dirname(__FILE__) . '/nodes' . ucfirst($modulansicht) . 'Inc.php';
if (file_exists($nodesIncFile)) {
	include_once($nodesIncFile);
}