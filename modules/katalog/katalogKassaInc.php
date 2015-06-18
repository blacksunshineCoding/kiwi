<?php
$_SESSION['completeSteps']['uebersicht'] = true;

$data['produkte'] = idAsIndex(getRows('SELECT * FROM produkte'));


if (isset($_SESSION['produkte'])) {
		$shirtAnzahl = 0;
		$allProduktePreis = 0;
		
		$produktText = '';
		
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
			
			$produktText .= $realProdukt['titel'] . ' || ' . $sessionProdukt['size'] . ' || ' . $sessionProdukt['anzahl'] . 'x || Signatur: ' . $signatur . ' || Produktgesamtpreis: ' . number_format($gesamtpreis, 2) . '<br>';
	
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
		
		/* Bestellung Insert */
		$row['vorname'] = sqlEscape($_SESSION['adresse']['vorname']);
		$row['nachname'] = sqlEscape($_SESSION['adresse']['nachname']);
		$row['strasse'] = sqlEscape($_SESSION['adresse']['strasse']);
		$row['hausnummer'] = sqlEscape($_SESSION['adresse']['hausnummer']);
		$row['adresszusatz'] = sqlEscape($_SESSION['adresse']['adresszusatz']);
		$row['plz'] = sqlEscape($_SESSION['adresse']['plz']);
		$row['ort'] = sqlEscape($_SESSION['adresse']['ort']);
		$row['land'] = sqlEscape($_SESSION['adresse']['land']);
		$row['emailadresse'] = sqlEscape($_SESSION['adresse']['emailadresse']);
		$row['anmerkung'] = sqlEscape($_SESSION['adresse']['anmerkung']);
		
		$row['produktGesamtPreis'] = number_format($allProduktePreis, 2);
		$row['versandkosten'] = number_format($versandkosten, 2);
		$row['gesamtpreis'] = number_format($finalKosten, 2);
		$row['zahlungsmethode'] = sqlEscape($_SESSION['adresse']['zahlungsmethode']);
		$row['versandmethode'] = sqlEscape($_SESSION['adresse']['versandmethode']);
		$row['zahlungErhalten'] = 0;
		$row['versendet'] = 0;
		
		$row['bestelldatum'] = date('d.m.Y');
		$row['zahlungsdatum'] = 0;
		$row['versanddatum'] = 0;
		
		$row['produkte'] = sqlEscape($produktText);

		insertRow($row, 'orders');
		
		$_SESSION['orderComplete'] = 1;
}

$_SESSION['completeSteps']['abschluss'] = true;