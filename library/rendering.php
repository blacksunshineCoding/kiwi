<?php
/**
 * addAttributes
 * Fuegt alle im Array enthaltenen Attribute hinzu
 * z.B. $attribut['data-image'] = 2; 
 * @param array $attribute
 */
function addAttributes($attribute) {
	if (is_array($attribute)) {
		$string = '';
		foreach ($attribute as $attributId => $attribut) {
			$string .= $attributId . '="' . $attribut . '" ';
		}
		return $string;	
	} else {
		return FALSE;
	}
}

/**
 * renderHeadline
 * Gibt eine Headline in der angegeben Groesse aus (Optional als Link).
 * Klasse und Link koennen direkt mitgegeben werden
 * Attribute koennen als Array f�r den Headline und den Link-Tag angegeben werden.
 * @param string $titel
 * @param integer $nr
 * @param string $class
 * @param string $link
 * @param array $hAttributes
 * @param array $aAttributes
 */
function renderHeadline($titel, $nr, $class = FALSE, $link = FALSE, $hAttributes = FALSE, $aAttributes = FALSE){
	if (isset($hAttributes) && is_array($hAttributes)) {
		$hAttributeString = addAttributes($hAttributes);
	} else {
		$hAttributeString = '';
	}
	
	if (isset($aAttributes) && is_array($aAttributes)) {
		$aAttributeString = addAttributes($aAttributes);
	} else {
		$aAttributeString = '';
	}
	
	if (isset($class)) {
		$class = ' class="' . $class . '" ';
	} else {
		$class = '';
	}
	
	echo '<h' . $nr . ' ' . $class . $hAttributeString . '>'; 
	if (isset($link)) echo '<a href="' . $link . '"' . $aAttributeString . '>';
	echo $titel;
	if (isset($link)) echo '</a>';
	echo '</h' . $nr . '>';
}

/**
 * renderParagraph
 * Gibt einen String als Paragraph aus. Es kann eine Klasse oder Attribute (als Array) mitgegeben werden.
 * @param string $text
 * @param string $class
 * @param array $pAttributes
 */
function renderParagraph($text, $class = FALSE, $pAttributes = FALSE) {
	if (isset($pAttributes) && is_array($pAttributes)) {
		$pAttributeString = addAttributes($pAttributes);
	} else {
		$pAttributeString = '';
	}
	
	if (isset($class)) {
		$class = 'class="' . $class . '"';
	} else {
		$class = '';
	}
	
	echo '<p ' . $class . ' ' . $pAttributeString . '>';
	echo $text;
	echo '</p>';
}

/**
 * renderSpan
 * Gibt einen String als Span aus. Es kann eine Klasse oder Attribute (als Array) mitgegeben werden.
 * @param string $text
 * @param string $class
 * @param array $pAttributes
 */
function renderSpan($text, $class = FALSE, $sAttributes = FALSE) {
	if (isset($sAttributes) && is_array($sAttributes)) {
		$sAttributeString = addAttributes($sAttributes);
	} else {
		$sAttributeString = '';
	}

	if (isset($class)) {
		$class = 'class="' . $class . '"';
	} else {
		$class = '';
	}

	echo '<span ' . $class . ' ' . $sAttributeString . '>';
	echo $text;
	echo '</span>';
}

/**
 * renderDateiliste
 * Aus einem Array von Dateien wird eine Dateiliste (ul) erstellt (optional mit Klasse)
 * Es k�nnen Attribute als Array f�r den ul, li oder a-Tag mitgegeben werden.
 * @param array $dateien
 * @param string $class
 * @param array $ulAttributes
 * @param array $liAttributes
 * @param array $aAttributes
 */
function renderDateiliste ($dateien, $class = FALSE, $ulAttributes = FALSE, $liAttributes = FALSE, $aAttributes = FALSE) {
	if (isset($ulAttributes) && is_array($ulAttributes)) {
		$ulAttributeString = addAttributes($ulAttributes);
	} else {
		$ulAttributeString = '';
	}
	
	if (isset($liAttributes) && is_array($liAttributes)) {
		$liAttributeString = addAttributes($liAttributes);
	} else {
		$liAttributeString = '';
	}
	
	if (isset($aAttributes) && is_array($aAttributes)) {
		$aAttributeString = addAttributes($aAttributes);
	} else {
		$aAttributeString = '';
	}
	
	if (isset($class)) {
		$class = 'class="dateiliste ' . $class . '" ';
	} else {
		$class = 'class="dateiliste" ';
	}
	
	if (is_array($dateien)) {
		echo '<ul ' . $class . $ulAttributeString .'>';
		foreach ($dateien as $datei) {
			echo '<li';
			if ($datei['klasse']) echo ' class="' . $datei['klasse'] . '"';
			echo $liAttributeString;
			echo '>';
			echo '<a href="' . $datei['datei'] . '"' . $aAttributeString . '>';
			echo $datei['titel'];
			echo '</a>';
			echo '</li>';
		}
		echo '</ul>';	
	}
}

/**
 * renderLinkliste
 * Aus einem Array von Links wird eine Linkliste (ul) erstellt (optional mit Klasse)
 * Es k�nnen Attribute als Array f�r den ul, li oder a-Tag mitgegeben werden.
 * @param array $links
 * @param string $class
 * @param array $ulAttributes
 * @param array $liAttributes
 * @param array $aAttributes
 */
function renderLinkliste ($links, $class = FALSE, $ulAttributes = FALSE, $liAttributes = FALSE, $aAttributes = FALSE) {
	if (isset($ulAttributes) && is_array($ulAttributes)) {
		$ulAttributeString = addAttributes($ulAttributes);
	} else {
		$ulAttributeString = '';
	}
	
	if (isset($liAttributes) && is_array($liAttributes)) {
		$liAttributeString = addAttributes($liAttributes);
	} else {
		$liAttributeString = '';
	}
	
	if (isset($aAttributes) && is_array($aAttributes)) {
		$aAttributeString = addAttributes($aAttributes);
	} else {
		$aAttributeString = '';
	}
	
	if (isset($class)) {
		$class = 'class="linkliste ' . $class . '" ';
	} else {
		$class = 'class="linkliste" ';
	}
	
	if (is_array($links)) {
		echo '<ul ' . $class . $ulAttributeString . '>';
		foreach ($links as $link) {
			echo '<li';
			if ($link['klasse']) echo ' class="' . $link['klasse'] . '" ' . $liAttributeString;
			echo '>';
			echo '<a href="' . $link['url'] . '" ' . $aAttributeString . '>';
			echo $link['titel'];
			echo '</a>';
			echo '</li>';
		}
		echo '</ul>';	
	}
}

/**
 * renderImage
 * Ein Bild wird ausgegeben (optional als Link/optional mit Klasse)
 * Es koennen Attribute als Array fuer den a und den img-Tag mitgegeben werden
 * @param string $bildSrc
 * @param string $link
 * @param string $class
 * @param array $aAttributes
 * @param array $imgAttributes
 */
function renderImage ($bildSrc ,$link = FALSE, $class = FALSE, $aAttributes = FALSE, $imgAttributes = FALSE) {
	if (isset($aAttributes) && is_array($aAttributes)) {
		$aAttributeString = addAttributes($aAttributes);
	} else {
		$aAttributeString = '';
	}
	
	if (isset($imgAttributes) && is_array($imgAttributes)) {
		$imgAttributeString = addAttributes($imgAttributes);
	} else {
		$imgAttributeString = '';
	}
	
	if (isset($class)) {
		$class = ' class="' . $class . '"';
	} else {
		$class = '';
	}
	
	if (isset($link)) echo '<a href="' . $link . '" ' . $aAttributeString . '>';
	echo '<img src="' . $bildSrc . '"' . $class . $imgAttributeString . '>';
	if (isset($link)) echo '</a>';
}

?>