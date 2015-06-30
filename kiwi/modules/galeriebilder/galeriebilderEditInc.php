<?php
if (isset($_POST['sent'])) {
	if (isset($_FILES['bild']['tmp_name']) && !empty($_FILES['bild']['tmp_name'])) {
		$dateityp = GetImageSize($_FILES['bild']['tmp_name']);
		if ($dateityp[2] != 0) {
			if ($_FILES['bild']['size'] <  50924000) {
				$fileEnding = explode('.', $_FILES['bild']['name']);
				$fileEnding = $fileEnding[1];
				$newName = 'galeriebilder' .  $_POST['row']['id'] . '.' . $fileEnding;
				$newDir = dirname(__FILE__) . '/../../../uploads/' . $newName;
				move_uploaded_file($_FILES['bild']['tmp_name'], $newDir);
				
				$_POST['row']['bild'] = $newName . '||' . $_FILES['bild']['name'];
				
			} else {
				$error['type'] = 'danger';
				$error['text'] = 'Das Bild darf nicht größer als 5.000Kb sein';
			}
		
		} else {
			$error['type'] = 'danger';
			$error['text'] = 'Das Bild darf nur als Jpeg, PNG oder GIF vorliegen';
		}
	}
	
	$db->updateRow($_POST['row'], 'id', $_POST['row']['id'], $data['table']['name']);
	$editFeedback['type'] = 'success';
	$editFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gespeichert';
}

$entry = $db->getRow('SELECT * FROM ' . $data['table']['name'] . ' WHERE id = ' . $db->escape($_GET[$data['table']['name'] . 'Id']));