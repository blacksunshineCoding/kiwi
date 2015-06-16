<?php
echo '<a href="' . $data['warenkorbLink'] . '" class="zumWarenkorb btn btn-default">Zum Warenkorb</a>';

if (isset($data['produkte']['entries']) && count($data['produkte']['entries']) > 0) {
	foreach ($data['produkte']['entries'] as $entry) {
		echo '<article class="produktEintrag">';
			echo '<div class="produktEintragBild">';
				echo '<img src="' . resizePic(getFileName($entry['bild'], 0), 200, null) . '">';
			echo '</div>';
			echo '<div class="produktEintragMain">';
				renderHeadline($entry['titel'] . ' - € ' . $entry['preis'], 3, false, false);
				renderParagraph($entry['text']);
				echo '<form action="" method="post">';
					echo '<input type="hidden" name="produkt[id]" value="' . $entry['id'] . '">';
					echo '<input type="hidden" name="produkt[titel]" value="' . $entry['titel'] . '">';
					echo '<input type="hidden" name="produkt[preis]" value="' . $entry['preis'] . '">';
					echo '<input type="hidden" name="produkt[produktkategorie]" value="' . $entry['produktkategorieId'] . '">';
					echo '<input type="hidden" name="warenkorb" value="1">';
					$sizeValues = explode(',', $entry['optionen']);
					echo '<select name="produkt[size]" class="form-control">';
					foreach ($sizeValues as $value) {
						echo '<option value="' . $value . '">' . $value. '</option>';
					}
					echo '</select>';
					echo '<button type="submit" class="btn btn-default">In den Warenkorb</button>';
					echo '<div class="clear"></div>';
				echo '</form>';
				if (isset($data['feedback'][$entry['id']])) {
					renderFeedback($data['feedback'][$entry['id']]);
				}
			echo '</div>';
			echo '<div class="clear"></div>';
		echo '</article>';
	}
}

echo '<a href="' . $data['warenkorbLink'] . '" class="zumWarenkorb btn btn-default">Zum Warenkorb</a>';