<?php
$feedback = '';
$link = getDbLink();

if (isset($_POST['sent'])) {
	
	if ($_POST['row']['zahlungErhalten'] == 1 && $_POST['row']['zahlungsdatum'] == 0) {
		$_POST['row']['zahlungsdatum'] = date('d.m.Y');
		orderMail($_POST['row'], 'paid');
	}
	
	if ($_POST['row']['versendet'] == 1 && $_POST['row']['versanddatum'] == 0) {
		$_POST['row']['versanddatum'] = date('d.m.Y');
		orderMail($_POST['row'], 'sent');
	}
	
	updateRow($_POST['row'], 'id', $_POST['row']['id'], $data['table']['name']);
	$feedback['type'] = 'success';
	$feedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gespeichert';
}

$entry = getRow('SELECT * FROM orders WHERE id = ' . sqlEscape($_GET['ordersId']));