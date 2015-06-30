<?php
if (isset($_POST['sent'])) {
	unset($_POST['row']['id']);
	$db->insertRow($_POST['row'], $data['table']['name']);
	$newFeedback['type'] = 'success';
	$newFeedback['text'] = $data['table']['singular'] . ' wurde erfolgreich angelegt.';
}

$data['entries'] = $db->getRows('SELECT * FROM ' . $data['table']['name'] . ' ORDER BY ' . $data['table']['order']);