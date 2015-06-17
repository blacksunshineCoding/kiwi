<?php
echo '<div class="katalogKasse">';
renderHeadline('Bestellung abschließen', 2);
echo '<form action="index.php?ansicht=kassa&step=abschliessen" method="post" class="kassaAdresseForm">';

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
		
				echo '<tr>';
					echo '<td>' . $realProdukt['titel'] . '</td>';
					echo '<td>EUR ' . str_replace(',', '.', $realProdukt['preis']) . '</td>';
					echo '<td>' . $sessionProdukt['size'] . '</td>';
					echo '<td>' . $sessionProdukt['anzahl'] . 'x</td>';
					echo '<td>' . $signatur . '</td>';
					echo '<td class="produktRowPreis">EUR ' . number_format($gesamtpreis, 2) . '</td>';
				echo '</tr>';
			}
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
	echo '<div class="kassaAdresse">';
		renderHeadline('Adresse', 3);
		
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
		
		if (isset($_SESSION['adresse'])) {
			$adresse = $_SESSION['adresse'];
		}
		
		?>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2">Vorname</span>
			<input type="text" name="adresse[vorname]" class="form-control <?php echo $data['vornameClass']; ?>" aria-describedby="sizing-addon2" value="<?php if (isset($adresse['vorname'])) echo $adresse['vorname']; ?>">
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2">Nachname</span>
			<input type="text" name="adresse[nachname]" class="form-control <?php echo $data['nachnameClass']; ?>" aria-describedby="sizing-addon2" value="<?php if (isset($adresse['vorname'])) echo $adresse['nachname']; ?>">
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2">Straße:</span>
			<input type="text" name="adresse[strasse]" class="form-control <?php echo $data['strasseClass']; ?>" aria-describedby="sizing-addon2" value="<?php if (isset($adresse['vorname'])) echo $adresse['strasse']; ?>">
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2">Hausnummer:</span>
			<input type="text" name="adresse[hausnummer]" class="form-control <?php echo $data['hausnummerClass']; ?>" aria-describedby="sizing-addon2" value="<?php if (isset($adresse['vorname'])) echo $adresse['hausnummer']; ?>">
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2">Adresszusatz:</span>
			<input type="text" name="adresse[adresszusatz]" class="form-control <?php echo $data['adresszusatzClass']; ?>" aria-describedby="sizing-addon2" value="<?php if (isset($adresse['vorname'])) echo $adresse['adresszusatz']; ?>">
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2">Postleitzahl:</span>
			<input type="text" name="adresse[plz]" class="form-control <?php echo $data['plzClass']; ?>" aria-describedby="sizing-addon2" value="<?php if (isset($adresse['vorname'])) echo $adresse['plz']; ?>">
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2">Ort:</span>
			<input type="text" name="adresse[ort]" class="form-control <?php echo $data['ortClass']; ?>" aria-describedby="sizing-addon2" value="<?php if (isset($adresse['vorname'])) echo $adresse['ort']; ?>">
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon2">Land</span>
			<select id="selectLand" name="adresse[land]" class="form-control <?php echo $landClass; ?>" aria-describedby="sizing-addon2">
				<?php
					switch ($adresse['land']) {
						
					}
				?>
				<option value="Deutschland"<?php echo $deChecked; ?>>Deutschland</option>
				<option value="Österreich"<?php echo $atChecked; ?>>Österreich</option>
				<option value="Schweiz"<?php echo $chChecked; ?>>Schweiz</option>
			</select>
		</div>
		<?php
	echo '</div>';
	echo '<div class="kassaBezahlung">';
	renderHeadline('Zahlung', 3);
	?>
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon2">Zahlungsmethode</span>
		<select class="form-control" aria-describedby="sizing-addon2" disabled="disabled">
			<option>Paypal</option>
		</select>
	</div>
	<?php
	echo '</div>';
	
	echo '<div class="kassaVersand">';
	renderHeadline('Versand', 3);
	?>
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon2">Versandmethode</span>
		<select class="form-control" aria-describedby="sizing-addon2" disabled="disabled">
			<option>Deutsche Post</option>
		</select>
	</div>
	<?php
	echo '</div>';
	echo '<input type="hidden" name="step" value="abschliessen">';
	
	if (isset($data['allErrors']) && isset($_SESSION['adresse'])) {
		echo '<button type="submit" class="btn btn-default">Bestellung abschließen</button>';
	} else {
		echo 'alles korrekt';
	}
	

	
	
} else {
	renderParagraph('Keine Produkte im Warenkorb');
}
echo '</form>';
echo '</div>';