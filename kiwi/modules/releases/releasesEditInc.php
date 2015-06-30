<?php
if (isset($_POST['sent'])) {
	if (isset($_FILES['bild']['tmp_name']) && !empty($_FILES['bild']['tmp_name'])) {
		$dateityp = GetImageSize($_FILES['bild']['tmp_name']);
		if ($dateityp[2] != 0) {
			if ($_FILES['bild']['size'] <  50924000) {
				$fileEnding = explode('.', $_FILES['bild']['name']);
				$fileEnding = $fileEnding[1];
				$newName = 'musicCover' .  $_POST['row']['id'] . '.' . $fileEnding;
				$newDir = dirname(__FILE__) . '/../../../uploads/' . $newName;
				move_uploaded_file($_FILES['bild']['tmp_name'], $newDir);
				
				$_POST['row']['bild'] = $newName . '||' . $_FILES['bild']['name'];
				
			} else {
				$bildUploadFeedback['type'] = 'danger';
				$bildUploadFeedback['text'] = 'Das Bild darf nicht größer als 5.000Kb sein';
			}
		
		} else {
			$bildUploadFeedback['type'] = 'danger';
			$bildUploadFeedback['text'] = 'Das Bild darf nur als Jpeg, PNG oder GIF vorliegen';
		}
	}
	
	if (isset($_FILES['datei']['tmp_name']) && !empty($_FILES['datei']['tmp_name'])) {
		$dateityp = GetImageSize($_FILES['datei']['tmp_name']);
		if ($_FILES['datei']['size'] <  500024000) {
			$fileEnding = explode('.', $_FILES['datei']['name']);
			$fileEnding = $fileEnding[1];
			$newName = 'music' .  $_POST['row']['id'] . '.' . $fileEnding;
			$newDir = dirname(__FILE__) . '/../../../uploads/' . $newName;
			move_uploaded_file($_FILES['datei']['tmp_name'], $newDir);
			
			$_POST['row']['datei'] = $newName . '||' . $_FILES['datei']['name'];
			
		} else {
			$dateiUploadFeedback['type'] = 'danger';
			$dateiUploadFeedback['text'] = 'Die Datei darf nicht größer als 500Mb sein';
		}
		
	}
	
	$db->updateRow($_POST['row'], 'id', $_POST['row']['id'], $data['table']['name']);
	$editFeedback['type'] = 'success';
	$editFeedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gespeichert';
}

$entry = $db->getRow('SELECT * FROM ' . $data['table']['name'] . ' WHERE id = ' . $db->escape($_GET[$data['table']['name'] . 'Id']));