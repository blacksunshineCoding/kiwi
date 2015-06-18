<?php
echo '<div class="katalogKasse katalogAbschluss">';
renderHeadline('Abschluss', 2);

if (isset($_SESSION['produkte'])) {
	echo '<div class="kassaProduktzusammenfassung">';
		renderHeadline('Produktzusammenfasung', 3);
		$shirtAnzahl = 0;
		echo '<table class="table kassaTable">';
			echo '<tr>';
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
			
			$versandkosten = $shirtAnzahl * $versandkostenFaktor;
			
			if ($versandkosten > 10) {
				$versandkosten = 10;
			}
			
			$finalKosten = $allProduktePreis + $versandkosten;
			
			echo '<tr class="rowPreis">';
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
				echo '<td class="versandkostenLabel labelSpan" colspan="2">Versandkosten:</td>';
				echo '<td class="versandkostenPreis preisRight">EUR ' . number_format($versandkosten, 2) . '</td>';
			echo '</tr>';
			echo '<tr class="rowGesamtkosten">';
				echo '<td class="rowNoBorder"></td>';
				echo '<td class="rowNoBorder"></td>';
				echo '<td class="rowNoBorder"></td>';
				echo '<td class="gesamtkostenLabel labelSpan" colspan="2">Gesamtkosten:</td>';
				echo '<td class="gesamtkostenPreis preisRight">EUR ' . number_format($finalKosten, 2) . '</td>';
			echo '</tr>';
		echo '</table>';
	echo '</div>';
	
	$finalFeedback['type'] = 'success';
	$finalFeedback['text'] = '<b>Deine Bestellung wurde erfolgreich abgeschlossen!</b><br>';
	$finalFeedback['text'] .= '<p>Vielen Dank für deine Bestellung! Du bekommst eine Email mit der Bestätigung und den Zahlungsanweisungen.<br>Sobald das Geld eingetroffen ist werden benachrichtigt und ebenfalls wenn dein Paket versendet wurde.</p>';
	renderFeedback($finalFeedback);
	
	if ($_SESSION['orderComplete'] == 1) {
		unset($_SESSION['produkte']);
		unset($_SESSION['gesamtpreis']);
		unset($_SESSION['land']);
		unset($_SESSION['completeSteps']);
		unset($_SESSION['adresse']);
		unset($_SESSION['orderComplete']);
	}

}
echo '</div>';