<?php
$data['table'] = $main['tables']['settings'];
$newFeedback = '';
$editFeedback = '';

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
	}
} else {
	$modulansicht = 'list';
}

$incFile = dirname(__FILE__) . '/' . $data['table']['name'] . ucfirst($modulansicht) . 'Inc.php';
if (file_exists($incFile)) {
	include_once($incFile);
}