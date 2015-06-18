<?php
echo '<div class="katalogKasse">';
renderHeadline('Bestellung abschließen', 2);
echo '<form action="index.php?ansicht=daten" method="post" class="kassaAdresseForm">';

if (isset($_SESSION['produkte'])) {
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
			<span class="input-group-addon" id="sizing-addon2">Vorname: <span class="pflichtfeld">*</span></span>
			<input type="text" name="adresse[vorname]" class="form-control <?php echo $data['vornameClass']; ?>" aria-describedby="sizing-addon2" value="<?php if (isset($adresse['vorname'])) echo $adresse['vorname']; ?>">
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2">Nachname: <span class="pflichtfeld">*</span></span>
			<input type="text" name="adresse[nachname]" class="form-control <?php echo $data['nachnameClass']; ?>" aria-describedby="sizing-addon2" value="<?php if (isset($adresse['nachname'])) echo $adresse['nachname']; ?>">
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2">Straße: <span class="pflichtfeld">*</span></span>
			<input type="text" name="adresse[strasse]" class="form-control <?php echo $data['strasseClass']; ?>" aria-describedby="sizing-addon2" value="<?php if (isset($adresse['strasse'])) echo $adresse['strasse']; ?>">
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2">Hausnummer: <span class="pflichtfeld">*</span></span>
			<input type="text" name="adresse[hausnummer]" class="form-control <?php echo $data['hausnummerClass']; ?>" aria-describedby="sizing-addon2" value="<?php if (isset($adresse['hausnummer'])) echo $adresse['hausnummer']; ?>">
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2">Adresszusatz:</span>
			<input type="text" name="adresse[adresszusatz]" class="form-control <?php echo $data['adresszusatzClass']; ?>" aria-describedby="sizing-addon2" value="<?php if (isset($adresse['adresszusatz'])) echo $adresse['adresszusatz']; ?>">
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2">Postleitzahl: <span class="pflichtfeld">*</span></span>
			<input type="text" name="adresse[plz]" class="form-control <?php echo $data['plzClass']; ?>" aria-describedby="sizing-addon2" value="<?php if (isset($adresse['plz'])) echo $adresse['plz']; ?>">
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2">Ort: <span class="pflichtfeld">*</span></span>
			<input type="text" name="adresse[ort]" class="form-control <?php echo $data['ortClass']; ?>" aria-describedby="sizing-addon2" value="<?php if (isset($adresse['ort'])) echo $adresse['ort']; ?>">
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon2">Land: <span class="pflichtfeld">*</span></span>
			<select id="selectLand" name="adresse[land]" class="form-control <?php echo $landClass; ?>" aria-describedby="sizing-addon2">
				<option value="Deutschland"<?php echo $deChecked; ?>>Deutschland</option>
				<option value="Österreich"<?php echo $atChecked; ?>>Österreich</option>
				<option value="Schweiz"<?php echo $chChecked; ?>>Schweiz</option>
			</select>
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2">Emailadresse: <span class="pflichtfeld">*</span></span>
			<input type="text" name="adresse[emailadresse]" class="form-control <?php echo $data['emailadresseClass']; ?>" aria-describedby="sizing-addon2" value="<?php if (isset($adresse['emailadresse'])) echo $adresse['emailadresse']; ?>">
		</div>
		<?php
			if (isset($data['allErrors'])) {
				$feedback['type'] = 'danger';
				$feedback['text'] = 'Bitte fülle alle Pflichtfelder aus!';
				renderFeedback($feedback);	
			}
		?>
	<?php
	echo '</div>';
	echo '<div class="kassaBezahlung">';
	renderHeadline('Zahlung', 3);
	?>
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon2">Zahlungsmethode</span>
		<select name="adresse[zahlungsmethode]" class="form-control" aria-describedby="sizing-addon2" readonly="readonly">
			<option value="PayPal">Paypal</option>
		</select>
	</div>
	<?php
	echo '</div>';
	
	echo '<div class="kassaVersand">';
	renderHeadline('Versand', 3);
	?>
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon2">Versandmethode</span>
		<select name="adresse[versandmethode]" class="form-control" aria-describedby="sizing-addon2" readonly="readonly">
			<option value="Deutsche Post">Deutsche Post</option>
		</select>
	</div>
	<?php
	echo '</div>';
	echo '<div class="kassaAnmerkung">';
	renderHeadline('Anmerkung', 3);
	?>
	<div class="input-group">
		<textarea name="adresse[anmerkung]" class="form-control" aria-describedby="sizing-addon2" placeholder="Anmerkung zur Bestellungs"></textarea>
	</div>
	<?php
	echo '</div>';
	echo '<input type="hidden" name="step" value="abschliessen">';
	echo '<input type="hidden" name="abschicken" value="1">';
	
	echo '<button type="submit" class="btn btn-default">Weiter zur Übersicht</button>';
	

	
	
} else {
	renderParagraph('Keine Produkte im Warenkorb');
}
echo '</form>';
echo '</div>';