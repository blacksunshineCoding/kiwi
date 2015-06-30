<?php
if (isset($_POST['sent'])) {
	$db->updateRow($_POST['row'], 'id', $_POST['row']['id'], $data['table']['name']);
	$editFeedback['type'] = 'success';
	$editFeedback['text'] = $data['table']['singular'] . ' wurde erfolgreich gespeichert';
}

$entry = $db->getRow('SELECT * FROM ' . $data['table']['name'] . ' WHERE id = ' . $db->escape($_GET[$data['table']['name'] . 'Id']));