<?php
$feedback = '';
$link = getDbLink();

if (isset($_POST['sent'])) {
	unset($_POST['row']['id']);
	insertRow($_POST['row'], $data['table']['name']);
	$feedback['type'] = 'success';
	$feedback['text'] = 'Neue ' . $data['table']['singular'] . ' wurde erfolgreich angelegt.';
}