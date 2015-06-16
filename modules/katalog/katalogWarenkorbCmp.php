<?php
renderHeadline('Warenkorb', 1);

if (isset($_SESSION['produkte'])) {
	echo '<div class="katalogWarenkorb">';
	echo '<a href="index.php" class="zurueckProdukte btn btn-default">Zurück zu den Produkten</a>';
	echo '<form action="index.php?ansicht=warenkorb" method="post">';
	echo '<table class="table warenkorbTable">';
	echo '<tr>';
		echo '<th>Produkt</th>';
		echo '<th>Größe</th>';
		echo '<th>Anzahl</th>';
		echo '<th>Preis</th>';
		echo '<th>Entfernen</th>';
	echo '</tr>';
	$gesamtPreis = 0;
	foreach ($_SESSION['produkte'] as $produkt) {
		$produktEintrag = $data['produkte'][$produkt['id']];
		$preis = str_replace(',', '.', $produkt['preis']);
		$preis = $preis * $produkt['anzahl'];
		$preis = number_format($preis, 2);
		
		$gesamtPreis = $gesamtPreis + $preis;
		
		if (strpos($produktEintrag['optionen'], ',') !== false) {
			$optionValues = explode(',', $produktEintrag['optionen']);
		} else {
			$optionValues[] = $produktEintrag['optionen'];
		}
		

		echo '<tr class="warenkorbEintrag">';
// 		de($produktEintrag);
		echo '<td>' . $produktEintrag['titel'] . '</td>';
		echo '<td>';
		echo '<select name="produkte[' . $produkt['id'] . '][size]" class="form-control">';
		foreach ($optionValues as $value) {
			$checked = '';
			if ($produkt['size'] == $value) $checked = 'selected="selected"';
			echo '<option value="' . $value . '" ' . $checked . '>' . $value . '</option>';
		}
		echo '</select>';
		 //. $produkt['size'] .
		echo '</td>';
		echo '<td><input type="number" name="produkte[' . $produkt['id'] . '][anzahl]" value="' . $produkt['anzahl'] . '"  class="form-control"></td>';
		echo '<td>' . $preis . '</td>';
		echo '<td>';
			echo '<div class="input-group">';
				echo '<span class="input-group-addon">';
					echo '<input type="checkbox" name="produkte[' . $produkt['id'] . '][entfernen]" value="1">';
				echo '</span>';
				echo '<span class="form-control">Entfernen </span>';
			echo '</div>';
		echo '</td>';
		echo '</tr>';
	}
	echo '</table>';
	
	echo '<div class="warenkorbGesamtkosten alert alert-info">';
	echo '<b>Produktkosten (exklusive Versandkosten):</b>&nbsp;<span class="preis">EUR&nbsp;' . number_format($gesamtPreis, 2) . '</span>';
	echo '</div>';
	
	echo '<button type="submit" name="aktualisieren" value="1" class="btn btn-default">Warenkorb aktualisieren</button>';
	echo '</form>';
	echo '</div>';
	
	$shirtAnzahl = 0;
	
	foreach ($_SESSION['produkte'] as $produktId => $produkt) {
		if ($produkt['produktkategorie'] == 2) {
			$shirtAnzahl = $shirtAnzahl + $produkt['anzahl'];
		}
	}
	
	if ($shirtAnzahl > 2) {
		echo '<div class="alert alert-warning">';
		renderParagraph('Es können maxmimal 2 Shirts pro Bestellung bestellt werden. Wenn du mehr Shirts willst musst du eine extra Bestellung machen');
		echo '</div>';
	} else {
		echo '<a href="index.php?ansicht=kassa" class="btn btn-default">Zur Kassa</a>';
	}
	
	
} else {
	renderParagraph('Keine Produkte im Warenkorb');
}