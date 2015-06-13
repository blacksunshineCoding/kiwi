<?php
$data['table'] = $main['tables']['nodes'];
$deleteFeedback = '';
$copyFeedback = '';

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['nodesId'])) {
	deleteRow('id', $_GET['nodesId'], $data['table']['name']);
	$deleteFeedback['type'] = 'info';
	$deleteFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gelöscht.';
}

if (isset($_GET['nodesId']) && isset($_GET['action']) && $_GET['action'] == 'copy') {
	$copyEntry = getRow('SELECT * FROM nodes WHERE id = ' . sqlEscape($_GET['nodesId']));
	unset($copyEntry['id']);
	$copyEntry['titel'] .= ' (Kopie)';
	insertRow($copyEntry, $data['table']['name']);
	$copyFeedback['type'] = 'info';
	$copyFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich kopiert.';
}

if (isset($_GET['sub'])) {
	if (($_GET['sub'] == 'list' || $_GET['sub'] == 'all') && (!isset($_GET['action']))) {
		include_once dirname(__FILE__) . '/nodesListInc.php';
		
	} elseif (($_GET['sub'] == 'new' && !isset($_GET['action']) || ($_GET['sub'] == 'new' && $_GET['action'] == 'new'))) {
		include_once dirname(__FILE__) . '/nodesNewInc.php';
		
	} elseif ($_GET['sub'] == 'tree' && !isset($_GET['action'])) {
		include_once dirname(__FILE__) . '/nodesTreeInc.php';
		
	} elseif (isset($_GET['nodesId']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
		include_once dirname(__FILE__) . '/nodesEditInc.php';
		
	} elseif (isset($_GET['nodesId']) && isset($_GET['action']) && ($_GET['action'] == 'copy' || $_GET['action'] == 'delete')) {
		include_once dirname(__FILE__) . '/nodesListInc.php';
	}
}
