<?php

/**
 * renderListTop
 * Gibt für einen Table die Top Links aus (neuer Eintrag,etc)
 * @param array $table
 */

function renderListTop($table) {
	$newLink = 'index.php?navigation=' . $_GET['navigation'] . '&sub=' . $_GET['sub'] . '&action=new';
	$allLink = 'index.php?navigation=' . $_GET['navigation'] . '&sub=' . $_GET['sub'] . '&action=all';
	$treeLink = 'index.php?navigation=' . $_GET['navigation'] . '&sub=tree';
	echo '<ul class="listTopLinks">';
	
	if ($table['topActions'] != str_replace(',','',$table['topActions'])) {
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

	if (isset($table['fields']) && count($table['fields']) > 0) {
		$action = 'index.php?navigation=' . $_GET['navigation'] . '&sub=' . $_GET['sub'] . '&' . $table['name'] . 'Id=' . $entry['id'] . '&action=edit';
		echo '<form action="' . $action . '" method="post" class="kiwiForm">';
		foreach ($table['fields'] as $field) {
			$disabled = '';
			if ($field['edit'] == 0) {
				$disabled = 'readonly';
			}
			echo '<div class="input-group">';
 			echo '<span class="input-group-addon">' . $field['label'] . '</span>';
			echo '<input type="text" class="form-control" name="row[' . $field['name'] . ']" value="' . $entry[$field['name']] . '" ' . $disabled .'>';
			echo '</div>';	
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
		$action = 'index.php?navigation=' . $_GET['navigation'] . '&sub=' . $_GET['sub'] . '&action=new';
		echo '<form action="' . $action . '" method="post" class="kiwiForm">';
		foreach ($table['fields'] as $field) {
			$disabled = '';
			if ($field['edit'] == 0) {
				$disabled = 'readonly';
			}
			echo '<div class="input-group">';
			echo '<span class="input-group-addon">' . $field['label'] . '</span>';
			echo '<input type="text" class="form-control" name="row[' . $field['name'] . ']" ' . $disabled .'>';
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
						echo '<th class="actionLabel edit">Bearbeiten</th>';
					} else {
						$href = 'index.php?navigation=' . $_GET['navigation'] . '&sub=' . $_GET['sub'] . '&' . $table['name'] . 'Id=' . $entry['id'] . '&action=edit';
						echo '<td class="actionCell edit">';
						echo '<a href="' . $href . '" class="action edit">';
						echo '<i class="fa fa-pencil"></i>';
						echo '</a>';
						echo '</td>';
					}
					break;
					
				case 'delete':
					if ($type == 'label') {
						echo '<th class="actionLabel delete">Entfernen</th>';
					} else {
						$href = 'index.php?navigation=' . $_GET['navigation'] . '&sub=' . $_GET['sub'] . '&' . $table['name'] . 'Id=' . $entry['id'] . '&action=delete';
						echo '<td class="actionCell delete">';
						echo '<a href="' . $href . '" class="action delete">';
						echo '<i class="fa fa-trash-o"></i>';
						echo '</a>';
						echo '</td>';
					}
					break;
					
				case 'copy':
					if ($type == 'label') {
						echo '<th class="actionLabel copy">Kopieren</th>';
					} else {
						$href = 'index.php?navigation=' . $_GET['navigation'] . '&sub=' . $_GET['sub'] . '&' . $table['name'] . 'Id=' . $entry['id'] . '&action=copy';
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
	
		echo '<table class="table kiwiTable users">';
		echo '<tr class="labelRow">';
		foreach ($table['fields'] as $field) {
			echo '<th class="' . $field['name'] . 'Label">';
			echo '<span class="fieldLabel">' . $field['label'] . '</span>';
			echo '</th>';
		}
		renderActionFields($table, $entry=null, 'label');
		echo '</tr>';
		foreach ($entries as $entry) {
			echo '<tr class="entryRow">';
			foreach ($entry as $entryField) {
				echo '<td>';
				echo '<span class="field">' . $entryField . '</span>';
				echo '</td>';
			}
			renderActionFields($table, $entry, 'link');
			echo '</tr>';
	
		}
		echo '</table>';
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
function resizePic($img, $width, $height, $src = 'images/uploaded', $dest = 'images/scaled') {
	// Gr��e und Typ ermitteln
	list ($srcWidth, $srcHeight, $srcTyp) = getimagesize($src . '/' . $img);

	// neue Gr��e bestimmen
	if ($srcWidth >= $srcHeight) {
		$newImgWidth = $width;
		$newImgHeight = $height * $width / $width;
	}
	
	if ($srcWidth < $srcHeight) {
		$newImgHeight = $width;
		$newImgWidth = $width * $height / $height;
	}

	
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

		// 		shuffle($navigations['hauptnavigation']);
		// 		shuffle($navigations['servicenavigation']);

		$result['unsorted'] = $navigations;

		foreach ($navigations as $navigationTitel => $navigation) {
			usort($navigation, make_comparer(
					['position', SORT_ASC],
					['id', SORT_ASC]
			));

			$navigations[$navigationTitel] = $navigation;
			$result['sorted'][$navigationTitel] = $navigation;
		}


	}

	return $result['sorted'];
}

/**
 * renderTreeView
 * Gibt die Nodes im CMS in der Baumansicht aus
 * @param array $preparedNodes (mittels prepareNodes() vorbereitete Nodes
 */
function renderTreeView($preparedNodes) {
	if (count($preparedNodes) > 0) {
		echo '<ul class="treeview treeviewRoot level0 levelNavigations">';
		foreach ($preparedNodes as $navigationTitel => $navigation) {
			echo '<li class="navigation">';
			echo '<span class="navigationsTitel"><i class="fa fa-caret-square-o-down"></i>' . $navigationTitel . '</span>';
			if (count($navigation) > 0) {
				echo '<ul class="treeview level0 levelNavigationItems">';
				echo '<i class="fa fa-long-arrow-down down1"></i>';
					foreach ($navigation as $navigationItem) {
						echo '<li>';
						echo '<i class="fa fa-long-arrow-right right1"></i><a href="" class="navigationsItemTitel">' . $navigationItem['titel'] . '</a>';
						echo '</li>';
					}
					
				echo '</ul>';
			}
			echo '</li>';
		}
		echo '</ul>';
	}
}

?>