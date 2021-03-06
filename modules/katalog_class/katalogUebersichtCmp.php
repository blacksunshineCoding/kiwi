<?php
echo '<div class="katalogKasse katalogUebersicht">';
renderHeadline('Übersicht', 3);

if (isset($_SESSION['produkte'])) {
	echo '<div class="kassaProduktzusammenfassung">';
		renderHeadline('Produktzusammenfasung', 4);
		$shirtAnzahl = 0;
		echo '<table class="table kassaTable">';
			echo '<tr>';
				echo '<th class="thArtikelnummer">Art.-Nr.</th>';
				echo '<th class="thProdukt">Produkt</th>';
				echo '<th class="thEinzel">Einzelpreis</th>';
				echo '<th class="thSize">Größe/Option</th>';
				echo '<th class="thAnzahl">Anzahl</th>';
				echo '<th class="thSignatur">Signatur</th>';
				echo '<th class="thGesamt">Gesamtpreis</th>';
			echo '</tr>';
			$allProduktePreis = 0;
			foreach ($_SESSION['produkte'] as $sessionProduktId => $sessionProdukt) {
				$realProdukt = $data['produkte'][$sessionProduktId];
				
				$shirtAnzahl = $shirtAnzahl + intval($sessionProdukt['anzahl']);
				
				if (isset($sessionProdukt['signatur']) && $sessionProdukt['signatur'] == 1) {
					$signatur = 'ja';
					$gesamtpreis = intval($sessionProdukt['anzahl']) * 200;
				} else {
					$signatur = 'nein';
					$gesamtpreis = intval($sessionProdukt['anzahl']) * intval(str_replace(',', '.', $realProdukt['preis']));
				}
				
				$allProduktePreis = $allProduktePreis + $gesamtpreis;
		
				echo '<tr>';
					echo '<td>' . $realProdukt['artikelnummer'] . '</td>';
					echo '<td>' . $realProdukt['titel'] . '</td>';
					echo '<td>EUR ' . str_replace(',', '.', $realProdukt['preis']) . '</td>';
					echo '<td>' . $sessionProdukt['size'] . '</td>';
					echo '<td>' . $sessionProdukt['anzahl'] . 'x</td>';
					echo '<td>' . $signatur . '</td>';
					echo '<td class="produktRowPreis">EUR ' . number_format($gesamtpreis, 2) . '</td>';
				echo '</tr>';
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
			
			$finalKosten = $allProduktePreis + $versandkosten;
			
			echo '<tr class="rowPreis">';
				echo '<td class="rowNoBorder"></td>';
				echo '<td class="rowNoBorder"></td>';
				echo '<td class="rowNoBorder"></td>';
				echo '<td class="rowNoBorder"></td>';
				echo '<td class="allProdukteLabel labelSpan" colspan="2">Gesamtpreis (exklusive Versandkosten):</td>';
				echo '<td class="allProduktePreis preisRight">EUR ' . number_format($allProduktePreis, 2) . '</td>';
			echo '</tr>';
			echo '<tr class="rowVersandkosten">';
				echo '<td class="rowNoBorder"></td>';
				echo '<td class="rowNoBorder"></td>';
				echo '<td class="rowNoBorder"></td>';
				echo '<td class="rowNoBorder"></td>';
				echo '<td class="versandkostenLabel labelSpan" colspan="2">Versandkosten:</td>';
				echo '<td class="versandkostenPreis preisRight">EUR ' . number_format($versandkosten, 2) . '</td>';
			echo '</tr>';
			echo '<tr class="rowGesamtkosten">';
				echo '<td class="rowNoBorder"></td>';
				echo '<td class="rowNoBorder"></td>';
				echo '<td class="rowNoBorder"></td>';
				echo '<td class="rowNoBorder"></td>';
				echo '<td class="gesamtkostenLabel labelSpan" colspan="2">Gesamtkosten:</td>';
				echo '<td class="gesamtkostenPreis preisRight">EUR ' . number_format($finalKosten, 2) . '</td>';
			echo '</tr>';
		echo '</table>';
	echo '</div>';
	echo '<div class="kassaBezahlung kassaVersand">';
	renderHeadline('Bezahlung und Versand', 4);
	$adress = $_SESSION['adresse'];
	?>
	<div class="input-group">
		<span class="title">Zahlungsmethode:&nbsp;</span>
		<span class="content"><?php echo $adress['zahlungsmethode']; ?></span>
	</div>
	<div class="input-group">
		<span class="title">Versandmethode:&nbsp;</span>
		<span class="content"><?php echo $adress['versandmethode']; ?></span>
	</div>
	<?php
	echo '</div>';
	echo '<div class="kassaVersandadresse">';
	renderHeadline('Versandadresse', 4);
	echo $adress['vorname'] . ' ' . $adress['nachname'] . '<br>';
	echo $adress['strasse'] . ' ' . $adress['hausnummer'] . '<br>';
	
	if (isset($adress['adresszusatz']) && !empty($adress['adresszusatz'])) {
		echo $adress['adresszusatz'] . '<br>';
	}
	echo $adress['plz'] . ' ' . $adress['ort'] . '<br>';
	echo $adress['land'];
	echo '</div>';
	
	echo '<div class="kassaSonstige">';
	renderHeadline('Sonstige Daten', 4);
	echo '<b>Emailadresse:</b> ' . $adress['emailadresse'] . '<br>';
	echo '<b>Anmerkung:</b> ' . $adress['anmerkung'];
	echo '</div>';
	
	echo '<a href="index.php?ansicht=abschluss" class="btn btn-default">Bestellung abschließen</a>';
	

	
	
} else {
	renderParagraph('Keine Produkte im Warenkorb');
}
echo '</div>';