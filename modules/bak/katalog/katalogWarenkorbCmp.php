<?php
renderHeadline('Warenkorb', 3);

if (isset($_SESSION['produkte'])) {
	echo '<div class="katalogWarenkorb">';
	echo '<a href="index.php" class="zurueckProdukte btn btn-default">Zurück zu den Produkten</a>';
	echo '<form action="index.php?ansicht=warenkorb" method="post">';
	echo '<div class="warenkorbWrap">';
	echo '<table class="table warenkorbTable">';
	echo '<tr>';
		echo '<th>Art.-Nr.</th>';
		echo '<th>Produkt</th>';
		echo '<th>Größe</th>';
		echo '<th>Anzahl</th>';
		echo '<th>Preis</th>';
		echo '<th>Signatur</th>';
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
		

		echo '<tr class="warenkorbEintrag" data-produktid="' . $produktEintrag['id'] . '">';
		echo '<td>' . $produktEintrag['artikelnummer'] . '</td>';
		echo '<td>' . $produktEintrag['titel'] . '</td>';
		echo '<td>';
		echo '<select name="produkte[' . $produkt['id'] . '][size]" class="form-control produktSize">';
		$sizeValues = $produktEintrag['varianten']['Größe']['optionList'];
		foreach ($sizeValues as $value) {
			$checked = '';
			if ($produkt['size'] == $value) $checked = 'selected="selected"';
			echo '<option value="' . $value . '" ' . $checked . '>' . $value . '</option>';
		}
		echo '</select>';
		 //. $produkt['size'] .
		echo '</td>';
		echo '<td><input type="number" name="produkte[' . $produkt['id'] . '][anzahl]" value="' . $produkt['anzahl'] . '"  class="form-control produktAnzahl"></td>';
		echo '<td>EUR ' . $preis . '</td>';
		echo '<td>';
			$signaturChecked = '';
			if (isset($_SESSION['produkte'][$produkt['id']]['signatur']) && $_SESSION['produkte'][$produkt['id']]['signatur'] == 1) {
				$signaturChecked = 'checked="checked"';
			}
			echo '<div class="input-group produktSignatur">';
			echo '<span class="input-group-addon">';
			echo '<input type="checkbox" name="produkte[' . $produkt['id'] . '][signatur]" value="1" ' . $signaturChecked . '>';
			echo '</span>';
			echo '<span class="form-control">Shirt signieren (EUR 200,-) </span>';
			echo '</div>';
		echo '</td>';
		echo '<td>';
			echo '<div class="input-group produktEntfernen">';
				echo '<span class="input-group-addon">';
					echo '<input type="checkbox" name="produkte[' . $produkt['id'] . '][entfernen]" value="1">';
				echo '</span>';
				echo '<span class="form-control">Entfernen </span>';
			echo '</div>';
		echo '</td>';
		echo '</tr>';
	}
	echo '</table>';
	echo '</div>';
	
	$deChecked = '';
	$atChecked = '';
	$chChecked = '';
	
	if (isset($_SESSION['land'])) {
		switch ($_SESSION['land']) {
		
			default:
			case 'Deutschland':
				$deChecked = ' selected="selected"';
				break;
				
			case 'Österreich':
				$atChecked = ' selected="selected"';
				break;
				
			case 'Schweiz':
				$chChecked = ' selected="selected"';
				break;
		}
	} else {
		$deChecked = ' selected="selected"';
	}
	
	echo '<div class="input-group chooseLand">';
	echo '<select name="land" class="form-control">';
	echo '<option value="Deutschland"' . $deChecked . '>Deutschland</option>';
	echo '<option value="Österreich"' . $atChecked . '>Österreich</option>';
	echo '<option value="Schweiz"' . $chChecked . '>Schweiz</option>';
	echo '</select>';
	echo '</div>';
	
	echo '<button type="submit" name="aktualisieren" value="1" class="btn btn-default">Warenkorb aktualisieren</button>';
	echo '</form>';
	echo '</div>';
	
	renderFeedback($data['lagerbestandFeedback']);
	
	echo '<div class="warenkorbGesamtkosten alert alert-info">';
	echo '<b>Produktkosten (exklusive Versandkosten):</b>&nbsp;<span class="preis">EUR&nbsp;' . number_format($gesamtPreis, 2) . '</span>';
	echo '</div>';
	
	$shirtAnzahl = 0;
	$versandkosten = 0;
	
	foreach ($_SESSION['produkte'] as $produktId => $produkt) {
		if ($produkt['produktkategorie'] == 2) {
			$shirtAnzahl = $shirtAnzahl + $produkt['anzahl'];
		}
	}

	if (isset($_SESSION['land'])) {
		if ($_SESSION['land'] == 'Österreich' || $_SESSION['land'] == 'Schweiz') {
			$versandkostenFaktor = 4.00;
		} else {
			$versandkostenFaktor = 2.50;
		}
	} else {
		$versandkostenFaktor = 2.50;
	}
	
	if ($shirtAnzahl <= 2) {
		$versandkosten = $versandkostenFaktor;
	} else {
		if ($shirtAnzahl % 2 == 0) {
			$versandkosten = ($shirtAnzahl/2) * $versandkostenFaktor;
		} else {
			$versandkosten = (($shirtAnzahl+1)/2) * $versandkostenFaktor;
		}
		
	}
	
	if ($versandkosten > 10) {
		$versandkosten = 10;
	}
	
	$_SESSION['gesamtpreis'] = $versandkosten + $gesamtPreis;
	
	echo '<div class="warenkorbVersandkosten alert alert-info">';
	echo '<b>Versandkosten:</b>&nbsp;<span class="preis">EUR&nbsp;' . number_format($versandkosten, 2) . '</span>';
	echo '</div>';
	
	echo '<div class="warenkorbGesamtkostenFinal alert alert-info">';
	echo '<b>Gesamtkosten:</b>&nbsp;<span class="preis">EUR&nbsp;' . number_format($versandkosten + $gesamtPreis, 2) . '</span>';
	echo '</div>';
	

	if ($shirtAnzahl > 2) {
		echo '<div class="alert alert-warning">';
		renderParagraph('Pro 2 Shirts werden ' . $versandkostenFaktor . ' &euro; Versandkosten berechnet. Die maximalen Versandkosten betragen 10,00 &euro;');
		echo '</div>';
	}
	
	echo '<a href="index.php?ansicht=daten" class="btn btn-default">Zur Dateneingabe</a>';
	
} else {
	renderParagraph('Keine Produkte im Warenkorb');
}