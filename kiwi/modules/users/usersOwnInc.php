<?php
if (isset($_POST['sent'])) {
	$db->updateRow($_POST['row'], 'id', $_SESSION['user']['id'], $data['table']['name']);
	$editFeedback['type'] = 'success';
	$editFeedback['text'] = $data['table']['singular'] . ' wurde erfolgreich gespeichert';
}

$entry = $db->getRow('SELECT * FROM ' . $data['table']['name'] . ' WHERE id = ' . sqlEscape($_SESSION['user']['id']));