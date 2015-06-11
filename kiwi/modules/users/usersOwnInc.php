<?php
	$feedback = '';
	$link = getDbLink();
	
	if (isset($_POST['sent'])) {
		updateRow($_POST['row'], 'id', $_SESSION['user']['id'], $data['table']['name']);
		$feedback['type'] = 'success';
		$feedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gespeichert';
	}
	
	$entry = getRow('SELECT * FROM users WHERE id = ' . sqlEscape($_SESSION['user']['id']));