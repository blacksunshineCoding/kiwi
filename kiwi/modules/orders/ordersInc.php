<?php
$data['table'] = $main['tables']['orders'];
$deleteFeedback = '';
$copyFeedback = '';

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['ordersId'])) {
	deleteRow('id', $_GET['ordersId'], $data['table']['name']);
	$deleteFeedback['type'] = 'info';
	$deleteFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gelöscht.';
}

if (isset($_GET['ordersId']) && isset($_GET['action']) && $_GET['action'] == 'copy') {
	$copyEntry = getRow('SELECT * FROM orders WHERE id = ' . sqlEscape($_GET['ordersId']));
	unset($copyEntry['id']);
	$copyEntry['titel'] .= ' (Kopie)';
	insertRow($copyEntry, $data['table']['name']);
	$copyFeedback['type'] = 'info';
	$copyFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich kopiert.';
}

if (isset($_GET['sub'])) {
	if ((($_GET['sub'] == 'list' || $_GET['sub'] == 'all') || (isset($_GET['action']) && $_GET['action'] == 'all')) && !isset($_GET['ordersId'])) {
		include_once dirname(__FILE__) . '/ordersListInc.php';
		
	} elseif (isset($_GET['ordersId']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
		include_once dirname(__FILE__) . '/ordersEditInc.php';
		
	} elseif (isset($_GET['ordersId']) && isset($_GET['action']) && ($_GET['action'] == 'copy' || $_GET['action'] == 'delete')) {
		include_once dirname(__FILE__) . '/ordersListInc.php';
	}
}
