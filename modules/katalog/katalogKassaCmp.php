<?php
if (isset($_SESSION['produkte'])) {
	foreach ($_SESSION['produkte'] as $produkt) {
		de($produkt);
	}
} else {
	renderParagraph('Keine Produkte im Warenkorb');
}