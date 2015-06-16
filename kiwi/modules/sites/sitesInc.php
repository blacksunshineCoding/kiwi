<?php
$data['table'] = $main['tables']['sites'];
$deleteFeedback = '';
$copyFeedback = '';

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['sitesId'])) {
	deleteRow('id', $_GET['sitesId'], $data['table']['name']);
	$deleteFeedback['type'] = 'info';
	$deleteFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gelöscht.';
}

if (isset($_GET['sitesId']) && isset($_GET['action']) && $_GET['action'] == 'copy') {
	$copyEntry = getRow('SELECT * FROM sites WHERE id = ' . sqlEscape($_GET['sitesId']));
	unset($copyEntry['id']);
	$copyEntry['titel'] .= ' (Kopie)';
	insertRow($copyEntry, $data['table']['name']);
	$copyFeedback['type'] = 'info';
	$copyFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich kopiert.';
}

if (isset($_GET['sub'])) {
	if (isset($_GET['action']) && $_GET['action'] == 'all') {
		include_once dirname(__FILE__) . '/sitesListInc.php';
		
	} elseif (($_GET['sub'] == 'new') || (isset($_GET['action']) && $_GET['action'] = 'new')) {
		include_once dirname(__FILE__) . '/sitesNewInc.php';
		
	} elseif (isset($_GET['sitesId']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
		include_once dirname(__FILE__) . '/sitesEditInc.php';
		
	} elseif (isset($_GET['sitesId']) && isset($_GET['action']) && ($_GET['action'] == 'copy' || $_GET['action'] == 'delete')) {
		include_once dirname(__FILE__) . '/sitesListInc.php';
	}
}
