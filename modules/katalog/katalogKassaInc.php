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
			
			$produktText .= $realProdukt['titel'] . ' || ' . $sessionProdukt['size'] . ' || ' . $sessionProdukt['anzahl'] . 'x || Signatur: ' . $signatur . ' || Produktgesamtpreis: EUR ' . number_format($gesamtpreis, 2) . '<br>';
			
			/* Lagerbestand Update */
			
			$variante = getRow('SELECT * FROM produktvarianten WHERE produktId = "' . $realProdukt['id'] . '" AND variante LIKE "Größe" AND varianteOption LIKE "' . $sessionProdukt['size'] . '"');
			$variante['lagerbestand'] = intval($variante['lagerbestand']) - intval($sessionProdukt['anzahl']);
			if ($variante['lagerbestand'] < 0) {
				$variante['lagerbestand'] = 0;
			}
			updateRow($variante, 'id', $variante['id'], 'produktvarianten');
	
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
		
		/* Bestellung Insert */
		
		$row['bestellnummer'] = date('Ymd') . '-' . rand(1000,9999);
		
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
		
		$data['order'] = $row;

		insertRow($row, 'orders');
		orderMail($row, 'confirm');
		
		$_SESSION['orderComplete'] = 1;
		
		/* Prepare Bezahlungstext */
		
		$text = '<b>Deine Bestellung im 57KKK Store mit der Bestellnummer <i>' . $row['bestellnummer'] . '</i> war erfolgreich!</b><br><br>';
		$text .= 'Hier eine Zusammenfassung deiner Bestellung:<br>';
		$text .= $row['produkte'];
		$text .= '<br><br>';
		$text .= 'Zahlungsmethode: ' . $row['zahlungsmethode'] . '<br>';
		$text .= 'Versandmethode: ' . $row['versandmethode'] . '<br>';
		$text .= 'Gesamtpreis: EUR ' . $row['gesamtpreis'] . '<br><br>';
		
		$text .= 'Überweise bitte den Gesamtpreis von <b>EUR ' . $row['gesamtpreis'] . '</b> mit dem Vermerk der Bestellnummer <b>' . $row['bestellnummer'] . '</b> ';
		
		if ($row['zahlungsmethode'] == 'PayPal') {
			$text .= 'mit PayPal an folgende Adresse:<br>';
			$text .= 'broke@57kkk.tk<br>';
		} else {
			$text .= 'via Banküberweisung auf folgendes Konto:<br>';
			$text .= 'xZite<br>';
			$text .= 'Kontonummer: XXXXX<br>';
			$text .= 'Bankleitzahl: XXXXX<br>';
			$text .= 'Bank: XXXXX<br>';
			$text .= 'IBAN: XXXX-XXXX-XXXX-XXXX-XXX<br>';
			$text .= 'BIC/SWIFT: XXXXX<br>';
		}
		
		$text .= '<br>';
		$text .= 'Sobald dein Geld eingetroffen ist bekommst du eine Benachrichtiung, eine weitere Benachrichtung erhältst du wenn deine Bestellung verschickt wurde.<br><br>';
		
		$text .= 'Vielen Dank für deine Bestellung!<br>';
		$text .= 'Mit freundlichen Grüßen<br>';
		$text .= '57KKK';
		
		$data['orderText'] = $text;
		

}

$_SESSION['completeSteps']['abschluss'] = true;