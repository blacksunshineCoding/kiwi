<?php
if (isset($data['produkte']['entries']) && count($data['produkte']['entries']) > 0) {
	foreach ($data['produkte']['entries'] as $entry) {
		echo '<article class="produktEintrag" data-produktid="' . $entry['id'] . '">';
			echo '<div class="produktEintragBild col-md-3 col-sm-3 col-xs-12">';
				echo '<a href="uploads/' . getFileName($entry['bild'], 0) . '" data-lightbox="produkte">';
				echo '<img src="' . resizePic(getFileName($entry['bild'], 0), 200, null) . '">';
				echo '</a>';
			echo '</div>';
			echo '<div class="produktEintragMain col-md-9 col-sm-9 col-xs-12">';
				renderHeadline($entry['titel'], 3, false, false);
				renderSpan('Art.-Nr.:' . $entry['artikelnummer'], 'artikelnummer');
				renderParagraph($entry['text'], 'produktEintragText');
				echo '<span class="btn btn-success produktEintragPreis">EUR ' . $entry['preis'] . '</span>';
				echo '<form action="" method="post" class="produktEintragForm">';
					echo '<input type="hidden" name="produkt[id]" value="' . $entry['id'] . '">';
					echo '<input type="hidden" name="produkt[titel]" value="' . $entry['titel'] . '">';
					echo '<input type="hidden" name="produkt[preis]" value="' . $entry['preis'] . '">';
					echo '<input type="hidden" name="produkt[produktkategorie]" value="' . $entry['produktkategorieId'] . '">';
					echo '<input type="hidden" name="warenkorb" value="1">';
					$sizeValues = $entry['varianten']['Größe']['optionList'];
					echo '<select name="produkt[size]" class="form-control produktSize">';
					foreach ($sizeValues as $value) {
						echo '<option value="' . $value . '">' . $value. '</option>';
					}
					echo '</select>';
					echo '<button type="submit" class="btn btn-default">In den Warenkorb</button>';
					echo '<div class="clear"></div>';
				echo '</form>';
				echo '<div class="clear"></div>';
				echo '<div class="lagerbestandInfo"></div>';
				if (isset($data['feedback'][$entry['id']])) {
					renderFeedback($data['feedback'][$entry['id']]);
				}
			echo '</div>';
			echo '<div class="clear"></div>';
		echo '</article>';
	}
}

echo '<a href="' . $data['warenkorbLink'] . '" class="zumWarenkorb btn btn-default">Zum Warenkorb</a>';

if (isset($data['lagerbestaende']) && (count($data['lagerbestaende']) > 0)) {
	echo '<div id="lagerbestaende">';
	foreach ($data['lagerbestaende'] as $lagerbestand) {
		echo '<input type="hidden" data-produktid="' . $lagerbestand['produktId'] . '" data-variante="' . $lagerbestand['variante'] . '" data-option="' . $lagerbestand['varianteOption'] . '" data-lagerbestand="' . $lagerbestand['lagerbestand'] . '">';
	}
	echo '</div>';
}