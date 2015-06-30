<?php
$data['table'] = $main['tables']['orders'];
$deleteFeedback = '';
$copyFeedback = '';
$editFeedback = '';

if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		default:
		case 'all':
			$modulansicht = 'list';
			break;

		case 'edit':
			$modulansicht = 'edit';
			break;

		case 'delete':
			$modulansicht = 'list';
			if (isset($_GET['ordersId'])) {
				$db->deleteRow('id', $_GET['ordersId'], $data['table']['name']);
				$deleteFeedback['type'] = 'info';
				$deleteFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gelöscht.';
			}
			break;
	}
} else {
	$modulansicht = 'list';
}

$ordersIncFile = dirname(__FILE__) . '/orders' . ucfirst($modulansicht) . 'Inc.php';
if (file_exists($ordersIncFile)) {
	include_once($ordersIncFile);
}