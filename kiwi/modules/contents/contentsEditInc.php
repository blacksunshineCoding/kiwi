<?php
if (isset($_POST['sent'])) {
	
	if (isset($data['table']['childtables'])) {
		// insert new childtable
		$childtablesRowList = explodeList($data['table']['childtableList']);
		foreach ($childtablesRowList as $childtableRowListEintrag) {
			$childtablesNewRow = $_POST['row'][$childtableRowListEintrag]['new'];
			if (isset($childtablesNewRow['titel']) && !empty($childtablesNewRow['titel'])) {
				unset($childtablesNewRow['id']);
				$childtablesNewRow[ $data['table']['childtables'][$childtableRowListEintrag]['parentIdField'] ] = $_POST['row']['id'];
				$childtablesNewRow[ $data['table']['childtables'][$childtableRowListEintrag]['parentTableField'] ] = $data['table']['name'];
				$db->insertRow($childtablesNewRow, $childtableRowListEintrag);
			}
			unset($_POST['row'][$childtableRowListEintrag]);
		}
	
		// update existing childtables
		if (isset($_POST['row']['childtables'])) {
			foreach ($_POST['row']['childtables'] as $existingChildTableName => $existingChildTable) {
				foreach ($existingChildTable as $existingChildTableEintragId => $existingChildTableEintrag) {
					if (isset($existingChildTableEintrag['delete']) && $existingChildTableEintrag['delete'] == 1) {
						$db->deleteRow('id', $existingChildTableEintrag['id'], $existingChildTableName);
					} else {
						$db->updateRow($existingChildTableEintrag, 'id', $existingChildTableEintrag['id'], $existingChildTableName);
					}
				}
			}
		}
		unset($_POST['row']['childtables']);
	}
	
	$db->updateRow($_POST['row'], 'id', $_POST['row']['id'], $data['table']['name']);
	$editFeedback['type'] = 'success';
	$editFeedback['text'] = $data['table']['singular'] . ' wurde erfolgreich gespeichert';
}

$entry = $db->getRow('SELECT * FROM ' . $data['table']['name'] . ' WHERE id = ' . $db->escape($_GET[$data['table']['name'] . 'Id']));

if (isset($data['table']['childtables'])) {
	$childTableList = explodeList($data['table']['childtableList']);
	foreach ($data['table']['childtables'] as $childTableId => $childTable) {
		$data['childtable'] = $main['tables'][$childTableId];
		$query = 'SELECT * FROM ' . $data['childtable']['name'] . ' WHERE ' . $childTable['parentIdField'] . ' = "' . $entry['id'] . '" AND ' . $childTable['parentTableField'] . ' = "' . $data['table']['name'] . '"';
		$entry[$childTableId] = $db->getRows($query);
		if (empty($entry[$childTableId])) unset($entry[$childTableId]);
	}
}