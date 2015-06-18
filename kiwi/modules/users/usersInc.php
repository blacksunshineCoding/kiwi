<?php
$data['table'] = $main['tables']['users'];
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
			
		case 'own':
			$modulansicht = 'own';
			break;
			
		case 'edit':
			$modulansicht = 'edit';
			break;
			
		case 'delete':
			$modulansicht = 'list';			
			if (isset($_GET['usersId'])) {
				deleteRow('id', $_GET['usersId'], $data['table']['name']);
				$deleteFeedback['type'] = 'info';
				$deleteFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gelöscht.';
			}
			break;
			
		case 'copy':
			$modulansicht = 'list';
			if (isset($_GET['usersId'])) {
				$copyEntry = getRow('SELECT * FROM users WHERE id = ' . sqlEscape($_GET['usersId']));
				unset($copyEntry['id']);
				$copyEntry['benutzername'] .= ' (Kopie)';
				insertRow($copyEntry, $data['table']['name']);
				$copyFeedback['type'] = 'info';
				$copyFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich kopiert.';
			}
			break;
	}
} else {
	$modulansicht = 'list';
}

$usersIncFile = dirname(__FILE__) . '/users' . ucfirst($modulansicht) . 'Inc.php';
if (file_exists($usersIncFile)) {
	include_once($usersIncFile);
}