<?php
$feedback = '';
$link = getDbLink();

if (isset($_POST['sent'])) {
	updateRow($_POST['row'], 'id', $_POST['row']['id'], $data['table']['name']);
	$feedback['type'] = 'success';
	$feedback['text'] = $data['table']['singular'] . ' wurde erfolgreich gespeichert';
}

$entry = getRow('SELECT * FROM settings WHERE id = ' . sqlEscape($_GET['settingsId']));
