<?php
$data['table'] = $main['tables']['galeriebilder'];
$deleteFeedback = '';
$copyFeedback = '';

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
			if (isset($_GET['galeriebilderId'])) {
				deleteRow('id', $_GET['galeriebilderId'], $data['table']['name']);
				$deleteFeedback['type'] = 'info';
				$deleteFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gelöscht.';
			}
			break;
			

		case 'copy':
			$modulansicht = 'list';
			if (isset($_GET['galeriebilderId'])) {
				$copyEntry = getRow('SELECT * FROM galeriebilder WHERE id = ' . sqlEscape($_GET['galeriebilderId']));
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

$galeriebilderIncFile = dirname(__FILE__) . '/galeriebilder' . ucfirst($modulansicht) . 'Inc.php';
if (file_exists($galeriebilderIncFile)) {
	include_once($galeriebilderIncFile);
}