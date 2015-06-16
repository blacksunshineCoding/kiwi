<?php
$data['table'] = $main['tables']['produktkategorien'];
$deleteFeedback = '';
$copyFeedback = '';

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['produktkategorienId'])) {
	deleteRow('id', $_GET['produktkategorienId'], $data['table']['name']);
	$deleteFeedback['type'] = 'info';
	$deleteFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gelöscht.';
}

if (isset($_GET['produktkategorienId']) && isset($_GET['action']) && $_GET['action'] == 'copy') {
	$copyEntry = getRow('SELECT * FROM produktkategorien WHERE id = ' . sqlEscape($_GET['produktkategorienId']));
	unset($copyEntry['id']);
	$copyEntry['titel'] .= ' (Kopie)';
	insertRow($copyEntry, $data['table']['name']);
	$copyFeedback['type'] = 'info';
	$copyFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich kopiert.';
}

if (isset($_GET['sub'])) {
	if (($_GET['sub'] == 'list' || $_GET['sub'] == 'all') && (!isset($_GET['action']))) {
		include_once dirname(__FILE__) . '/produktkategorienListInc.php';
		
	} elseif (($_GET['sub'] == 'new' && !isset($_GET['action']) || ($_GET['sub'] == 'new' && $_GET['action'] == 'new'))) {
		include_once dirname(__FILE__) . '/produktkategorienNewInc.php';
		
	} elseif (isset($_GET['produktkategorienId']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
		include_once dirname(__FILE__) . '/produktkategorienEditInc.php';
		
	} elseif (isset($_GET['produktkategorienId']) && isset($_GET['action']) && ($_GET['action'] == 'copy' || $_GET['action'] == 'delete')) {
		include_once dirname(__FILE__) . '/produktkategorienListInc.php';
	}
}
