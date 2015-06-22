<?php

/**
 * getOptionNameListViaSelect
 * Holt die Werte fuer optionNameList in der Config aus der Datenbank
 * @param string $fieldname
 * @param string $tablename
 * @param string $order
 * @param boolean $emptyAlternative
 * @param string $emptyAlternativeValue
 * @return string
 */

function getOptionNameListViaSelect($fieldname, $tablename, $order = 'id ASC', $emptyAlternative = true, $emptyAlternativeValue = '---') {
	$nameList = getRow('SELECT GROUP_CONCAT(' . $fieldname . ') FROM ' . $tablename . ' ORDER BY ' . $order);
	$key = 'GROUP_CONCAT(' . $fieldname . ')';
	$optionNameList = $nameList[$key];
	if ($emptyAlternative) $optionNameList = $emptyAlternativeValue . ',' . $optionNameList;
	return $optionNameList;
}

/**
 * getOptionValueListViaSelect
 * Holt die Werte fuer optionValueList in der Config aus der Datenbank
 * @param string $fieldname
 * @param string $tablename
 * @param string $order
 * @param boolean $emptyAlternative
 * @param string $emptyAlternativeValue
 * @return string
 */

function getOptionValueListViaSelect($fieldname, $tablename, $order = 'id ASC', $emptyAlternative = true, $emptyAlternativeValue = '') {
	$valueList = getRow('SELECT GROUP_CONCAT(id) FROM ' . $tablename . ' ORDER BY ' . $order);
	$key = 'GROUP_CONCAT(id)';
	$optionValueList = $valueList[$key];
	if ($emptyAlternative) $optionValueList = $emptyAlternativeValue . ',' . $optionValueList;
	return $optionValueList;
}

function prepareOption($field) {
	if (($field['type'] == 'select') && (isset($field['showNameInList']) && $field['showNameInList'] == 1)) {
		$optionNames = explodeList($field['optionNameList']);
		$valueNames = explodeList($field['optionValueList']);
		
		foreach ($optionNames as $optionNameId => $optionName) {
			$values[$valueNames[$optionNameId]] = $optionName;
		}
		
		return $values;
	} else {
		return false;
	}
}

/**
 * prepareOptionList
 * Bereitet die optionList fuer die Ausgabe im CMS for
 * @param array $field
 * @return array|boolean
 */

function prepareOptionList($field) {
	if (isset($field['optionNameList']) && isset($field['optionValueList'])) {
		
		if ($field['optionNameList'] != str_replace(',','',$field['optionNameList'])) {
			$optionNameList = explode(',', $field['optionNameList']);
		} else {
			$optionNameList[] = $field['optionNameList'];
		}
		
		if ($field['optionValueList'] != str_replace(',','',$field['optionValueList'])) {
			$optionValueList = explode(',', $field['optionValueList']);
		} else {
			$optionValueList[] = $field['optionValueList'];
		}
		
		foreach ($optionNameList as $nameListId => $nameList) {
			$options[$nameListId]['name'] = $nameList;
			$options[$nameListId]['value'] = $optionValueList[$nameListId];
		} 
		
		return $options;
		
	} else {
		return false;
	}
}

/**
 * renderListTop
 * Gibt für einen Table die Top Links aus (neuer Eintrag,etc)
 * @param array $table
 */

function renderListTop($table) {
	$newLink = 'index.php?navigation=' . $_GET['navigation'] . '&action=new';
	$allLink = 'index.php?navigation=' . $_GET['navigation'] . '&action=all';
	$treeLink = 'index.php?navigation=' . $_GET['navigation'] . '&sub=tree';
	echo '<ul class="listTopLinks">';
	
	if(strpos($table['topActions'], ',') !== false) {
		$topActions = explode(',', $table['topActions']);
	} else {
		$topActions[] = $table['topActions'];
	}

	if (count($topActions) > 0) {
		foreach ($topActions as $action) {
			switch ($action) {
				case 'all':
					echo '<li class="actionAll">';
					echo '<a href="' . $newLink . '" class="btn btn-default">Neuer ' . $table['singular'] . '</a>';
					echo '</li>';
					break;
					
				case 'new':
					echo '<li class="actionNew">';
					echo '<a href="' . $allLink . '" class="btn btn-default">Alle ' . $table['plural'] . '</a>';
					echo '</li>';
					break;
					
				case 'tree':
					echo '<li class="actionTree">';
					echo '<a href="' . $treeLink . '" class="btn btn-default">Baumansicht</a>';
					echo '</li>';
					break;
			}
		}
	}
	echo '</ul>';
}

/**
 * renderListSide
 * Gibt für einen Table die Side Links aus (neuer Eintrag,etc)
 * @param array $table
 */

function renderListSide($table) {
	$newLink = 'index.php?navigation=' . $_GET['navigation'] . '&action=new';
	$allLink = 'index.php?navigation=' . $_GET['navigation'] . '&action=all';
	$treeLink = 'index.php?navigation=' . $_GET['navigation'] . '&action=tree';
	echo '<ul class="navigation sideNavigation side' . ucfirst($table['name']) . '">';

	if(strpos($table['sideActions'], ',') !== false) {
		$sideActions = explode(',', $table['sideActions']);
	} else {
		$sideActions[] = $table['sideActions'];
	}
	
	if (count($sideActions) > 0) {
		foreach ($sideActions as $action) {
			switch ($action) {
				case 'all':
					echo '<li class="all">';
					echo '<a href="' . $allLink . '">';
					echo '<i class="' . $table['icons']['all'] . '"></i>';
					echo '<span class="title">Alle ' . $table['plural'] . '</span>';
					echo '</a>';
					echo '</li>';
					break;
						
				case 'new':
					echo '<li class="new">';
					echo '<a href="' . $newLink . '">';
					echo '<i class="' . $table['icons']['new'] . '"></i>';
					echo '<span class="title">Neuer ' . $table['singular'] . '</span>';
					echo '</a>';
					echo '</li>';
					break;
						
				case 'tree':
					echo '<li class="tree">';
					echo '<a href="' . $treeLink . '">';
					echo '<i class="' . $table['icons']['tree'] . '"></i>';
					echo '<span class="title">Baumansicht</span>';
					echo '</a>';
					echo '</li>';
					break;
			}
		}
	}
	echo '</ul>';
}


function trimText ($string,$lenght) {
    if(strlen($string) > $lenght) {
        $string = substr($string,0,$lenght)."...";
        $string_ende = strrchr($string, " ");
        $string = str_replace($string_ende," ...", $string);
    }
    return $string;
}


/**
 * renderFeedback
 * Gibt einen Bootstrap Alert aus
 * @param string $feedback['text']
 * @param string $feedback['type'] (success,info,warning,danger)
 */

function renderFeedback($feedback) {
	if (isset($feedback['text']) && isset($feedback['type'])) {
		echo '<div class="alert alert-' . $feedback['type'] . '" role="alert">';
		echo $feedback['text'];
		echo '</div>';
	}
}

/**
 * renderDetailEdit
 * gibt ein Formular zum Bearbeiten eines Eintrages aus
 * @param array $table
 * @param array $entry
 */

function renderDetailEdit($table, $entry) {
	global $main;

	if (isset($table['fields']) && count($table['fields']) > 0) {
		$action = 'index.php?navigation=' . $_GET['navigation'] . '&' . $table['name'] . 'Id=' . $entry['id'] . '&action=edit';
		echo '<form action="' . $action . '" method="post" enctype="multipart/form-data" class="kiwiForm">';
		echo '<div class="mainEntry">';
		foreach ($table['fields'] as $field) {
			$disabled = '';
			if ($field['edit'] == 0) $disabled = 'readonly';
			
			echo '<div class="input-group">';
			switch ($field['type']) {
				default:
				case 'text':
					echo '<span class="input-group-addon">' . $field['label'] . '</span>';
					echo '<input type="text" class="form-control" name="row[' . $field['name'] . ']" value="' . $entry[$field['name']] . '" ' . $disabled .'>';
					break;
					
				case 'textarea':
					echo '<textarea type="text" class="form-control" name="row[' . $field['name'] . ']" placeholder="' . $field['label'] . '"' . $disabled .'>' . prepareTextarea($entry[$field['name']]) . '</textarea>';
					break;
					
				case 'select':
					$options = prepareOptionList($field);
					echo '<span class="input-group-addon">' . $field['label'] . '</span>';
					echo '<select class="form-control" name="row[' . $field['name'] . ']" ' . $disabled .'>';
					foreach ($options as $option) {
						$selected= '';
						if ($entry[$field['name']] == $option['value']) $selected = 'selected';
						echo '<option value="' . $option['value'] . '" ' . $selected . '>' . $option['name'] . '</option>';
					}
					echo '</select>';
					break;
					
				case 'file':
					echo '<span class="input-group-addon">' . $field['label'] . '</span>';
					if (!empty($entry[$field['name']])) {
						echo '<p class="form-control">Bestehende Datei: ' . $entry[$field['name']] . '</p>';
					}
					echo '<input type="file" class="form-control" name="' . $field['name'] . '" ' . $disabled .'>';
					break;
			}
			echo '</div>';
		}
		echo '</div>';
		if (isset($table['childtables'])) {
			$childTableList = explodeList($table['childtableList']);
			if (isset($childTableList) && !empty($childTableList) && is_array($childTableList)) {
				echo '<div class="allChildTables">';
				foreach ($childTableList as $childTable) {
					if (isset($table['childtables'][$childTable])) {
						renderHeadline($main['tables'][$childTable]['label'], 3);
						
						if (isset($entry[$childTable])) {
							foreach ($entry[$childTable] as $existingChildtableId => $existingChildtable) {
								echo '<div class="childTableEntry">';
								$childtableFields = $main['tables'][$childTable]['fields'];
								foreach ($childtableFields as $childtableField) {
									$disabled = '';
									if ($childtableField['edit'] == 0) $disabled = 'readonly';
										
									echo '<div class="input-group">';
									switch ($childtableField['type']) {
										default:
										case 'text':
											echo '<span class="input-group-addon">' . $childtableField['label'] . '</span>';
											echo '<input type="text" class="form-control" name="row[childtables][' . $childTable . '][' . $existingChildtable['id'] . '][' . $childtableField['name'] . ']" value="' . $entry[$childTable][$existingChildtableId][$childtableField['name']] . '" ' . $disabled .'>';
											break;
												
										case 'textarea':
											echo '<textarea type="text" class="form-control" name="row[childtables][' . $childTable . '][' . $existingChildtable['id'] . '][' . $childtableField['name'] . ']" placeholder="' . $childtableField['label'] . '"' . $disabled .'>' . prepareTextarea($entry[$childTable][$existingChildtableId][$childtableField['name']]) . '</textarea>';
											break;
												
										case 'select':
											$options = prepareOptionList($childtableField);
											echo '<span class="input-group-addon">' . $childtableField['label'] . '</span>';
											echo '<select class="form-control" name="row[childtables][' . $childTable . '][' . $existingChildtable['id'] . '][' . $childtableField['name'] . ']" ' . $disabled .'>';
											foreach ($options as $option) {
												$selected= '';
												if ($entry[$childTable][$existingChildtableId][$childtableField['name']] == $option['value']) $selected = 'selected';
												echo '<option value="' . $option['value'] . '" ' . $selected . '>' . $option['name'] . '</option>';
											}
											echo '</select>';
											break;
												
										case 'file':
											echo '<span class="input-group-addon">' . $childtableField['label'] . '</span>';
											if (!empty($entry[$childTable][$existingChildtableId][$childtableField['name']])) {
												echo '<p class="form-control">Bestehende Datei: ' . $entry[$childTable][$existingChildtableId][$childtableField['name']] . '</p>';
											}
											echo '<input type="file" class="form-control" name="row[childtables][' . $childTable . '][' . $existingChildtable['id'] . '][' . $childtableField['name'] . ']" ' . $disabled .'>';
											break;
									}
									echo '</div>';
								}
								echo '<div class="input-group">';
									echo '<span class="input-group-addon">Eintrag löschen</span>';
									echo '<div class="form-control"><input type="checkbox" name="row[childtables][' . $childTable . '][' . $existingChildtable['id'] . '][delete]" value="1"></div>';
								echo '</div>';
								
								echo '</div>';
							}
						}
						
						renderHeadline('<i class="fa fa-plus-square-o"></i> Neur Eintrag', 4, 'newChildtableAdd');
						echo '<div class="newChildtable">';
						if (isset($main['tables'][$childTable]['fields'])) foreach ($main['tables'][$childTable]['fields'] as $fieldId => $field) {
							$childtableField = $main['tables'][$childTable]['fields'];
							$disabled = '';
							if ($field['edit'] == 0) $disabled = 'readonly';
							
							echo '<div class="input-group">';
							switch ($field['type']) {
								default:
								case 'text':
									echo '<span class="input-group-addon">' . $field['label'] . '</span>';
									echo '<input type="text" class="form-control" name="row[' . $childTable . '][new][' . $field['name'] . ']" ' . $disabled .'>';
									break;
										
								case 'textarea':
									echo '<textarea type="text" class="form-control" name="row[' . $childTable . '][new][' . $field['name'] . ']" placeholder="' . $field['label'] . '"' . $disabled .'></textarea>';
									break;
										
								case 'select':
									$options = prepareOptionList($field);
									echo '<span class="input-group-addon">' . $field['label'] . '</span>';
									echo '<select class="form-control" name="row[' . $childTable  . '][new][' . $field['name'] . ']" ' . $disabled .'>';
									foreach ($options as $option) {
										$selected= '';
										if ($field['optionDefaultValue'] == $option['value']) $selected = 'selected';
										echo '<option value="' . $option['value'] . '" ' . $selected . '>' . $option['name'] . '</option>';
									}
									echo '</select>';
									break;
										
								case 'file':
									echo '<span class="input-group-addon">' . $field['label'] . '</span>';
									echo '<input type="file" class="form-control" name="row[' . $childTable . '][new][' . $field['name'] . ']" ' . $disabled .'>';
									break;
							}
							echo '</div>';
						}
						echo '</div>';
					}
				}
				echo '</div>';
			}
		}
		echo '<input type="hidden" name="sent" value="1">';
		echo '<button type="submit" class="btn btn-default">Speichern</button>';
		
		echo '</form>';
	}
	
}

/**
 * renderDetailNew
 * gibt ein Formular zum Erstellen eines neuen Eintrages aus
 * @param array $table
 * @param array $entry
 */

function renderDetailNew($table) {

	if (isset($table['fields']) && count($table['fields']) > 0) {
		$action = 'index.php?navigation=' . $_GET['navigation'] . '&action=new';
		echo '<form action="' . $action . '" method="post" enctype="multipart/form-data" class="kiwiForm">';
		foreach ($table['fields'] as $field) {
			
			$disabled = '';
			if ($field['edit'] == 0) $disabled = 'readonly';

			echo '<div class="input-group">';
			switch ($field['type']) {
				default:
				case 'text':
					echo '<span class="input-group-addon">' . $field['label'] . '</span>';
					echo '<input type="text" class="form-control" name="row[' . $field['name'] . ']" ' . $disabled .'>';
					break;
					
				case 'textarea':
					echo '<textarea type="text" class="form-control" name="row[' . $field['name'] . ']" placeholder="' . $field['label'] . '"' . $disabled .'></textarea>';
					break;
					
				case 'select':
					$options = prepareOptionList($field);
					echo '<span class="input-group-addon">' . $field['label'] . '</span>';
					echo '<select class="form-control" name="row[' . $field['name'] . ']" ' . $disabled .'>';
					foreach ($options as $option) {
						$selected= '';
						if ($field['optionDefaultValue'] == $option['value']) $selected = 'selected';
						echo '<option value="' . $option['value'] . '" ' . $selected . '>' . $option['name'] . '</option>';
					}
					echo '</select>';
					break;
					
				case 'file':
					echo '<span class="input-group-addon">' . $field['label'] . '</span>';
					echo '<input type="file" class="form-control" name="' . $field['name'] . '" ' . $disabled .'>';
					break;
			}
			echo '</div>';
		}
		echo '<input type="hidden" name="sent" value="1">';
		echo '<button type="submit" class="btn btn-default">Speichern</button>';

		echo '</form>';
	}

}

/**
 * renderActionFields
 * wird innerhalb von renderDataTable aufgerufen um die Aktionsfelder/links auszugeben.
 * @param array $table
 * @param array $entry
 * @param string $type
 */

function renderActionFields($table, $entry, $type='link') {
	if (isset($table['listActions'])) {
		if ($table['listActions'] != str_replace(',','',$table['listActions'])) {
			$listActions = explode(',', $table['listActions']);
		} else {
			$listActions[] = $table['listActions'];
		}
		foreach ($listActions as $action) {
			switch ($action) {
				default:
					break;
					
				case 'edit':
					if ($type == 'label') {
						echo '<th class="actionLabel edit"></th>';
					} else {
						$href = 'index.php?navigation=' . $_GET['navigation'] . '&' . $table['name'] . 'Id=' . $entry['id'] . '&action=edit';
						echo '<td class="actionCell edit">';
						echo '<a href="' . $href . '" class="action edit">';
						echo '<i class="fa fa-pencil"></i>';
						echo '</a>';
						echo '</td>';
					}
					break;
					
				case 'delete':
					if ($type == 'label') {
						echo '<th class="actionLabel delete"></th>';
					} else {
						$href = 'index.php?navigation=' . $_GET['navigation'] . '&' . $table['name'] . 'Id=' . $entry['id'] . '&action=delete';
						echo '<td class="actionCell delete">';
						echo '<a href="' . $href . '" class="action delete">';
						echo '<i class="fa fa-trash-o"></i>';
						echo '</a>';
						echo '</td>';
					}
					break;
					
				case 'copy':
					if ($type == 'label') {
						echo '<th class="actionLabel copy"></th>';
					} else {
						$href = 'index.php?navigation=' . $_GET['navigation'] . '&' . $table['name'] . 'Id=' . $entry['id'] . '&action=copy';
						echo '<td class="actionCell copy">';
						echo '<a href="' . $href . '" class="action copy">';
						echo '<i class="fa fa-files-o"></i>';
						echo '</a>';
						echo '</td>';
					}
					break;
			}
		}
	}
}

/**
 * renderDataTable
 * Gibt im CMS einen Table anhand der mitgegebenen Table Config und Eintraegen aus
 * @param array $table
 * @param array $entries
 */

function renderDataTable($table, $entries) {
	if (isset($table['fields']) && count($entries) > 0) {
		
		if ((!isset($table['onlyMinList'])) || isset($table['onlyMinList']) && $table['onlyMinList'] == 0) {
	
			echo '<table class="table tableFull kiwiTable">';
			echo '<tr class="labelRow">';
			foreach ($table['fields'] as $field) {
				echo '<th class="' . $field['name'] . 'Label">';
				echo '<span class="fieldLabel">' . $field['label'] . '</span>';
				echo '</th>';
			}
			renderActionFields($table, $entry=null, 'label');
			echo '</tr>';
			if (count($entries) > 0) foreach ($entries as $entryId => $entry) {
				echo '<tr class="entryRow">';
				foreach ($entry as $entryFieldId => $entryField) {

					if (prepareOption($table['fields'][$entryFieldId])) {
						$fieldList = prepareOption($table['fields'][$entryFieldId]);
						$newFieldName = $fieldList[$entryField];
					} else {
						$newFieldName = trimText($entryField, 100);
					}
					
					echo '<td>';
					echo '<span class="field">' . $newFieldName . '</span>';
					echo '</td>';
				}
				renderActionFields($table, $entry, 'link');
				echo '</tr>';
		
			}
			echo '</table>';
		
		}

		if (isset($table['minFieldList']) || isset($table['minList']) && $table['minList'] == 1) {
			$minFieldList = explodeList($table['minFieldList']);
			echo '<table class="table tableMin kiwiTable">';
			echo '<tr class="labelRow">';
			foreach ($minFieldList as $labelField) {
				echo '<th class="' . $table['fields'][$labelField]['name'] . 'Label">' . $table['fields'][$labelField]['label'] . '</th>';
			}
			renderActionFields($table, $entry=null, 'label');
			echo '</tr>';
			foreach ($entries as $entryId => $entry) {
				echo '<tr class="entryRow">';
				foreach ($entry as $entryFieldId => $entryField) {
					if (in_array($entryFieldId, $minFieldList)) {
						
						if (prepareOption($table['fields'][$entryFieldId])) {
							$fieldList = prepareOption($table['fields'][$entryFieldId]);
							$newFieldName = $fieldList[$entryField];
						} else {
							$newFieldName = trimText($entryField, 100);
						}
						
						echo '<td>';
						echo '<span class="field">' . $newFieldName . '</span>';
						echo '</td>';
					}
				}
				renderActionFields($table, $entry, 'link');
				echo '</tr>';
				
			}
			echo '</table>';
		}
	}
}

function validEmail($email) {
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return true;
	} else {
		return false;
	}
}

function prepareTextarea($text) {
	if(strpos($text, '<br>') !== false) {
		$text = str_ireplace('<br>', '&#13;&#10;', $text);
	}
	return $text;
}

/**
 * explodeList
 * Wandelt eine kommaseperierte Liste in einen Array um, wenn nur ein Feld angegeben ist landet es ebenfalls in einem Array (als einziger Eintrag)
 * @param string $fieldList
 * @return array|boolean
 */

function explodeList($fieldList) {
	if (isset($fieldList)) {
		if(strpos($fieldList, ',') !== false) {
			$list = explode(',', $fieldList);
		} else {
			$list[] = $fieldList;
		}
		return $list;
	} else {
		return false;
	}
}

/**
 * signedIn
 * Prueft ob ein User eingeloggt ist
 * @return boolean
 */

function signedIn() {
	if (isset($_SESSION['user']['id'])) {
		return true;
	} else {
		return false;
	}
}

/**
 * includeTemplate
 * Prueft ob die in $main['template'] festgelegte Datei existiert und bindet sie ein
 */
function includeTemplate() {
	global $main;
	$filename = 'tem' . ucfirst($main['template']) . '.php';
	$fullpath = dirname(__FILE__) . '/../' . $filename;
	if (file_exists($fullpath)) {
		include $fullpath;
	} else {
		return FALSE;
	}
}

/**
 * includeHead
 * Bindet die im Head benoetigte Dateien ein (0headCmp.php)
 */
function includeHead() {
	global $main;
	include dirname(__FILE__) . '/../0module/0headCmp.php';
}

/**
 * includeContent
 * Bindet die Datei fuer die Content-Ausgabe ein (0seiteCmp.php)
 */
function includeContent() {
	global $main;
	include dirname(__FILE__) . '/../0module/0seiteCmp.php';
}

/**
 * includeCssFiles
 * Bindet alle im Array $main['cssFiles'] festgelegten CSS-Dateien ein
 */
function includeCssFiles() {
	global $main;
	foreach ($main['cssFiles'] as $cssFile) {
		echo '<link rel="stylesheet" href="' . $cssFile . '" type="text/css">';
	}
}

/**
 * includeIeJsFiles
 * Bindet alle im Array $main['cssFiles'] festgelegten CSS-Dateien ein
 */
function includeIeJsFiles() {
	global $main;
	if (count($main['ieJsFiles']) >= 1) {
		echo '<!--[if lt IE 9]>
';
		foreach ($main['ieJsFiles'] as $ieJsFile) {
			echo '<script src="' . $ieJsFile . '"></script>
';
		}
		echo '<![endif]-->';
	}
}

/**
 * includeMediaQueries
 * Bindet alle im Array $main['mediaQueries'] festgelegten CSS-Dateien als Mediaquerie ein
 */
function includeMediaQueries() {
	global $main;
	$mediaquerie = explode('||', $main['mediaQueries']);
	echo '<link rel="stylesheet" href="' . $mediaquerie[0] . '" media="' . $mediaquerie[1] . '">';
}

/**
 * includeJsFiles
 * Bindet alle im Array $main['jsFiles'] festgelegten CSS-Dateien ein
 */
function includeJsFiles() {
	global $main;
	foreach ($main['jsFiles'] as $jsFile) {
		echo '<script src="' . $jsFile . '"></script>';
	}	
}

function includeConfigFiles() {
	global $main;
	foreach ($main['configFiles'] as $cfgFile) {
		include dirname(__FILE__) . $cfgFile;
	}
}

/**
 * setMetaCharset
 * Legt den in $main['charset'] definierten Charset fest
 */
function setMetaCharset() {
	global $main;
	echo '<meta charset="' . $main['charset'] . '">';
}

/**
 * setViewport
 * Legt den in $main['viewport'] definierten Viewport fest
 * z.B. width=device-width
 */
function setViewport() {
	global $main;
	echo '<meta name="viewport" content="' . $main['viewport'] . '">';
}

/**
 * setTitle
 * Legt den in $main['titel'] definierten Titel fest
 */
function setTitle() {
	global $main;
	echo '<title>' . $main['titel'] . '</title>';
}

/**
 * setLogoContent
 * Gibt den Logo/Headertext als H3 und Paragraph aus ($main['headerTitel']/['headerPhrase']
 */
function setLogoContent() {
	global $main;
	echo '<h1>' . $main['headerTitel'] . '</h1>';
	echo '<p>' . $main['headerPhrase'] . '</p>';
}

/**
 * setMetaTags
 * Legt die im Array $main['metaData'] definierten Metadaten fest
 */
function setMetaTags() {
	global $main;
	foreach ($main['metaData'] as $metaId => $metaContent) {
		if ($metaId == 'pragma') {
			echo '<meta http-equiv="' .$metaId . '" content="'. $metaContent .'">';
		} else {
			echo '<meta name="' . $metaId . '" content=' . $metaContent . '">';
		}
		
	}
	
}

/**
 * getFilesFromDir
 * Gibt alle Dateien/Ordner im angegebenen Verzeichnis aus (geht vom Web-Root aus)
 * @param Verzeichnis $dir
 */
function getFilesFromDir($dir) {
	$fulldir = dirname(__FILE__) . '/../' . $dir;
	$scan = scandir($fulldir);
	unset($scan[0]);
	unset($scan[1]);
	return $scan;
}

/**
 * renderGallery
 * Gibt alle im Array $images enthaltenen Bilder mit angegebener Hoehe und Breite als Galerie aus.
 * Hoehe und Breite sind in Pixel anzugeben
 * @param array $images
 * @param integer $width
 * @param integer $height
 */
function renderGallery($images, $width = NULL, $height = NULL) {
	echo '<div class="renderGallery">';
	if (isset($height) && !isset($width)) {
		$style = 'style="height:' . $height . 'px; width:auto;"';
	}
	
	if (isset($width) && !isset($height)) {
		$style = 'style="width:' . $width . 'px; height:auto;"';
	}
	
	if (isset($width) && isset($height)) {
		$style = 'style="width:' . $width . 'px; height:' . $height . 'px;"';
	}
	
	
	$i = 1;
	foreach ($images as $imageID => $image) {
		echo '<div class="mix ' . $i . '" data-myorder="' . $i . '">';
		echo '<img src="images/dummy/' . $image . '" class="mixImg ' . $i . '" ' . $style . '>';
		echo '</div>';
		$i++;
	}
	echo '</div>';
}
	

/******* Template Engine ********/

function templateHead() {
	include dirname(__FILE__) . '/head.php';
}

function templateLogo() {
	global $main;
	echo '<h1>' . $main['headerTitel'] . '</h1>';
	echo '<p>' . $main['headerPhrase'] . '</p>';
}
	

/******* Images ********/

/**
 * resizePic 
 * Skaliert ein Bild und gibt den neuen Pfad zurueck
 * @param Bildname $img
 * @param Breite $width
 * @param Hoehe $height
 * @param Bildpfad $src
 * @param Zielpfad $dest
 */
function resizePic($img, $width, $height, $src = 'uploads', $dest = 'images/scaled') {
	// Groesse und Typ ermitteln
	list ($srcWidth, $srcHeight, $srcTyp) = getimagesize($src . '/' . $img);
	$srcRatio = $srcWidth / $srcHeight;
	$srcNewRatio = $srcWidth / $width;
	// neue Groesse bestimmen
	
	if ($height == null) {
		$srcNewRatio = $srcWidth / $width;
		$newImgWidth = $width;
		$newImgHeight = $srcHeight / $srcNewRatio;
	} elseif ($width == null) {
		$srcNewRatio = $srcHeight / $height;
		$newImgHeight = $height;
		$newImgWidth = $srcWidth / $srcNewRatio;
	} else {
		if ($srcWidth >= $srcHeight) {
			$newImgWidth = $width;
			$newImgHeight = $height * $width / $width;
		}
		
		if ($srcWidth < $srcHeight) {
			$newImgHeight = $width;
			$newImgWidth = $width * $height / $height;
		}
	}
	
// 	if ($width == null) {
// 		$newImgHeight = $height;
// 		$newImgWidth = $srcWidth / $ratio;
// 	}
	
// 	if ($srcWidth >= $srcHeight) {
// 		$newImgWidth = $width;
// 		$newImgHeight = $height * $width / $width;
// 	}
	
// 	if ($srcWidth < $srcHeight) {
// 		$newImgHeight = $width;
// 		$newImgWidth = $width * $height / $height;
// 	}

	
	if ($srcTyp == 1) { // GIF
		$image = imagecreatefromgif ($src . '/' . $img);
		$newImage = imagecreate ($newImgWidth, $newImgHeight);
		imagecopyresampled ($newImage, $image, 0, 0, 0, 0, $newImgWidth, $newImgHeight, $srcWidth, $srcHeight);
		imagegif ($newImage, $dest . '/' . $img, 100);
		imagedestroy ($image);
		imagedestroy ($newImage);
		return 'images/scaled/' . $img;
		
	} elseif ($srcTyp == 2) {// JPG
		$image = imagecreatefromjpeg ($src . '/' . $img);
		$newImage = imagecreatetruecolor ($newImgWidth, $newImgHeight);
		imagecopyresampled ($newImage, $image, 0, 0, 0, 0, $newImgWidth, $newImgHeight, $srcWidth, $srcHeight);
		imagejpeg ($newImage, $dest . '/' . $img, 100);
		imagedestroy ($image);
		imagedestroy ($newImage);
		return 'images/scaled/' . $img;
		
	} elseif ($srcTyp == 3) {// PNG
		$image = imagecreatefrompng ($src . '/' . $img);
		$newImage = imagecreatetruecolor ($newImgWidth, $newImgHeight);
		imagecopyresampled ($newImage, $image, 0, 0, 0, 0, $newImgWidth, $newImgHeight, $srcWidth, $srcHeight);
		imagepng ($newImage, $dest . '/' . $img);
		imagedestroy ($image);
		imagedestroy ($newImage);
		return 'images/scaled/' . $img;
		
	} else {
		return false;
	}
}


/**
 * make_comparer
 * Sortiert mehrdimensionale Arrays durch tieferliegende Ebenen. Wird in prepareNodes verwendet.
 * @author http://stackoverflow.com/questions/96759/how-do-i-sort-a-multidimensional-array-in-php#answer-16788610
 * @return number
 */

function make_comparer() {
	// Normalize criteria up front so that the comparer finds everything tidy
	$criteria = func_get_args();
	foreach ($criteria as $index => $criterion) {
		$criteria[$index] = is_array($criterion)
		? array_pad($criterion, 3, null)
		: array($criterion, SORT_ASC, null);
	}

	return function($first, $second) use (&$criteria) {
		foreach ($criteria as $criterion) {
			// How will we compare this round?
			list($column, $sortOrder, $projection) = $criterion;
			$sortOrder = $sortOrder === SORT_DESC ? -1 : 1;

			// If a projection was defined project the values now
			if ($projection) {
				$lhs = call_user_func($projection, $first[$column]);
				$rhs = call_user_func($projection, $second[$column]);
			}
			else {
				$lhs = $first[$column];
				$rhs = $second[$column];
			}

			// Do the actual comparison; do not return if equal
			if ($lhs < $rhs) {
				return -1 * $sortOrder;
			}
			else if ($lhs > $rhs) {
				return 1 * $sortOrder;
			}
		}

		return 0; // tiebreakers exhausted, so $first == $second
	};
}

/**
 * preparenodes
 * Sortiert alle Nodes nach Navigation (hauptnavigation,servicenavigation,etc) und diese nach Position. Es werden auch die ganzen Ebenen mittels ParentId erstellt (TODO!)
 * @param array $nodes
 */

function prepareNodes($nodes) {
	if (count($nodes) > 0) {
		foreach ($nodes as $node) {
			$navigations[$node['navigation']][] = $node;
		}

		$result['unsorted'] = $navigations;

		foreach ($navigations as $navigationTitel => $navigation) {
			usort($navigation, make_comparer(
					['position', SORT_ASC],
					['id', SORT_ASC]
			));

			$navigations[$navigationTitel] = $navigation;
			$result['sorted'][$navigationTitel] = $navigation;
		}
		
		$getChildren = $result['sorted'];
		
		foreach ($getChildren as $navigationTitel => $navigation) {
			foreach ($navigation as $navigationsPunktId => $navigationsPunkt) {
				if ($navigationsPunkt['parentId'] != 0) {
					$getChildren[$navigationTitel][$navigationsPunkt['parentId']]['nodes'][] = $navigationsPunkt;
					unset($getChildren[$navigationTitel][$navigationsPunktId]);
				}
			}
		}

		return $getChildren;
	} else {
		return false;
	}
}

/**
 * renderTreeView
 * Gibt die Nodes im CMS in der Baumansicht aus
 * @param array $preparedNodes (mittels prepareNodes() vorbereitete Nodes
 */
function renderTreeView($preparedNodes) {
	global $data;
	if (count($preparedNodes) > 0) {
		echo '<ul class="treeview treeviewRoot level0 levelNavigations">';
		foreach ($preparedNodes as $navigationTitel => $navigation) {
			echo '<li class="navigation">';
			echo '<span class="navigationsTitel">' . $navigationTitel . '</span>';
			if (isset($navigation) && count($navigation) > 0) {
				echo '<ul class="treeview level0 levelNavigationItems">';
					foreach ($navigation as $navigationItem) {
						echo '<li>';
						echo '<span class="treeItemRow">';
						echo '<a href="" class="navigationsItemTitel">' . $navigationItem['titel'] . '</a>';
						renderActionFields($data['table'], $navigationItem);
						echo '</span>';
						if (isset($navigationItem['nodes']) && count($navigationItem['nodes'] > 0)) {
							echo '<ul class="treeview level1 levelNavigationItems">';
								foreach ($navigationItem['nodes'] as $navigationItem) {
									echo '<li>';
									echo '<span class="treeItemRow">';
									echo '<a href="" class="navigationsItemTitel">' . $navigationItem['titel'] . '</a>';
									renderActionFields($data['table'], $navigationItem);
									echo '</span>';
									if (isset($navigationItem['nodes']) && count($navigationItem['nodes'] > 0)) {
										echo '<ul class="treeview level2 levelNavigationItems">';
										foreach ($navigationItem['nodes'] as $navigationItem) {
											echo '<li>';
											echo '<span class="treeItemRow">';
											echo '<a href="" class="navigationsItemTitel">' . $navigationItem['titel'] . '</a>';
											renderActionFields($data['table'], $navigationItem);
											echo '</span>';
											echo '</li>';
										}
										echo '</ul>';
									}
									echo '</li>';
								}
							echo '</ul>';
						}
						echo '</li>';
					}
					
				echo '</ul>';
			}
			echo '</li>';
		}
		echo '</ul>';
	}
}

function renderNavigation($navigation) {
	global $main;
	if (count($navigation) > 0) {
		echo '<ul class="navigation">';
			foreach ($navigation as $navigationItem) {
				$class = '';
				if (isset($navigationItem['klasse'])) $class = ' class="' . $navigationItem['klasse'] . '"';
				echo '<li' . $class . '>';
					if ($navigationItem['seitenId'] != 0) {
						$seite = $main['sites'][$navigationItem['seitenId']];
					}
					echo '<a href="'. getNodeLink($navigationItem) . '">' . $navigationItem['titel'] . '</a>';
					renderNavigationLevel($navigationItem);
				echo '</li>';
			}	
		echo '</ul>';
	}
}

function renderNavigationLevel($level) {
	global $main;
	if (isset($level['nodes']) && count($level['nodes']) > 0) {
		echo '<ul class="navigation sub">';
			foreach ($level['nodes'] as $navigationItem) {
				echo '<li>';
					echo '<a href="' . getNodeLink($navigationItem) . '">' . $navigationItem['titel'] . '</a>';
					renderNavigationLevel($navigationItem);
				echo '</li>';
			}	
		echo '</ul>';
	}
	
}

/**
 * idAsIndex
 * Praeperiert einen Array so das das Feld [id] als Index verwendet wird
 * @param array $array
 * @return array
 */

function idAsIndex($array) {
	if (count($array) > 0) {
		$newArray = array();
		foreach ($array as $arrayEintragId => $arrayEintrag) {
			$newArray[$arrayEintrag['id']] = $arrayEintrag;
		}
		return $newArray;
	}
}

function getNodeLink($node) {
	if ($node['typ'] == 'site') {
		$link = getSiteLink($node['seitenId']);
	} else {
		$link = $node['url'];
	}
	return $link;
}

function getSiteLink($id) {
	$link = 'index.php?nodesId=' . $id;
	return $link;
}

function renderSite($site) {
	global $main;
	global $data;
	renderHeadline($site['titel'], 2, 'siteTitle');
	if ($site['module'] != '0') {
		$moduleCmp = dirname(__FILE__) . '/../' . $site['module'] . 'Cmp.php';
		if (file_exists($moduleCmp)) {
			include_once $moduleCmp;
		}
	}
}

/**
 * getFileName
 * holt den Filenamen aus einem Datei-Datenbankfeld. Mit $nr wird der gewuenschte Index angegeben
 * @param string $file
 * @param int $nr
 * @return string|boolean
 */

function getFileName($file, $nr) {
	if (strpos($file, '||') !== false) {
		$explode = explode('||', $file);
		return $explode[$nr];
	} else {
		return false;
	}
}

?>