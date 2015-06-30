<?php
$feedback = '';
$error = '';
$link = getDbLink();

if (isset($_POST['sent'])) {
	if (isset($_FILES['bild']['tmp_name']) && !empty($_FILES['bild']['tmp_name'])) {
		$dateityp = GetImageSize($_FILES['bild']['tmp_name']);
		if ($dateityp[2] != 0) {
			if ($_FILES['bild']['size'] <  1024000) {
				$fileEnding = explode('.', $_FILES['bild']['name']);
				$fileEnding = $fileEnding[1];
				$newName = 'produkte' .  $_POST['row']['id'] . '.' . $fileEnding;
				$newDir = dirname(__FILE__) . '/../../../uploads/' . $newName;
				move_uploaded_file($_FILES['bild']['tmp_name'], $newDir);
				
				$_POST['row']['bild'] = $newName . '||' . $_FILES['bild']['name'];
				
			} else {
				$error['type'] = 'danger';
				$error['text'] = 'Das Bild darf nicht größer als 1.000Kb sein';
			}
		
		} else {
			$error['type'] = 'danger';
			$error['text'] = 'Das Bild darf nur als Jpeg, PNG oder GIF vorliegen';
		}
	}
	
	
	if (isset($data['table']['childtables'])) {
		// insert new childtable
		$childtablesRowList = explodeList($data['table']['childtableList']);
		foreach ($childtablesRowList as $childtableRowListEintrag) {
			$childtablesNewRow = $_POST['row'][$childtableRowListEintrag]['new'];
			if (isset($childtablesNewRow['variante']) && !empty($childtablesNewRow['variante'])) {
				unset($childtablesNewRow['id']);
				$childtablesNewRow[ $data['table']['childtables'][$childtableRowListEintrag]['parentIdField'] ] = $_POST['row']['id'];
				insertRow($childtablesNewRow, $childtableRowListEintrag);
			}
			unset($_POST['row'][$childtableRowListEintrag]);
		}
		
		// update existing childtables
		if (isset($_POST['row']['childtables'])) {
			foreach ($_POST['row']['childtables'] as $existingChildTableName => $existingChildTable) {
				foreach ($existingChildTable as $existingChildTableEintragId => $existingChildTableEintrag) {
					if (isset($existingChildTableEintrag['delete']) && $existingChildTableEintrag['delete'] == 1) {
						deleteRow('id', $existingChildTableEintrag['id'], $existingChildTableName);
					} else {
						updateRow($existingChildTableEintrag, 'id', $existingChildTableEintrag['id'], $existingChildTableName);
					}
				}
			}
		}
		unset($_POST['row']['childtables']);
	}
	
	updateRow($_POST['row'], 'id', $_POST['row']['id'], $data['table']['name']);
	$feedback['type'] = 'success';
	$feedback['text'] = 'Der ' . $data['table']['singular'] . ' wurde erfolgreich gespeichert';
}

$entry = getRow('SELECT * FROM produkte WHERE id = ' . sqlEscape($_GET['produkteId']));

if (isset($data['table']['childtables'])) {
	$childTableList = explodeList($data['table']['childtableList']);
	foreach ($data['table']['childtables'] as $childTableId => $childTable) {
		$data['childtable'] = $main['tables'][$childTableId];
		$query = 'SELECT * FROM ' . $data['childtable']['name'] . ' WHERE ' . $childTable['parentIdField'] . ' = "' . $entry['id'] . '"';
		$entry[$childTableId] = getRows($query);
		if (empty($entry[$childTableId])) unset($entry[$childTableId]);
	}
}