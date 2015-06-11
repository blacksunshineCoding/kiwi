<?php
$data['table'] = $main['tables']['users'];
$deleteFeedback = '';
$copyFeedback = '';

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['usersId'])) {
	deleteRow('id', $_GET['usersId'], $data['table']['name']);
	$deleteFeedback['type'] = 'info';
	$deleteFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gelöscht.';
}

if (isset($_GET['usersId']) && isset($_GET['action']) && $_GET['action'] == 'copy') {
	$copyEntry = getRow('SELECT * FROM users WHERE id = ' . sqlEscape($_GET['usersId']));
	unset($copyEntry['id']);
	$copyEntry['benutzername'] .= ' (Kopie)';
	insertRow($copyEntry, $data['table']['name']);
	$copyFeedback['type'] = 'info';
	$copyFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich kopiert.';
}

if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['usersId'])) {
	include_once dirname(__FILE__) . '/usersEditInc.php';
	
} elseif ((isset($_GET['action']) && $_GET['action'] == 'new') || (isset($_GET['sub']) && $_GET['sub'] == 'new')) {
	include_once dirname(__FILE__) . '/usersNewInc.php';
	
} elseif (isset($_GET['sub']) && $_GET['sub'] == 'own') {
	include_once dirname(__FILE__) . '/usersOwnInc.php';
	
} else {
	include_once dirname(__FILE__) . '/usersListInc.php';
}