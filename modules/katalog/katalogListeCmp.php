<?php
if (isset($data['produkte']['entries']) && count($data['produkte']['entries']) > 0) {
	foreach ($data['produkte']['entries'] as $entry) {
		echo '<article class="produktEintrag">';
			echo '<div class="produktEintragBild">';
				echo '<img src="' . resizePic(getFileName($entry['bild'], 0), 300, null) . '">';
			echo '</div>';
			echo '<div class="produktEintragMain">';
				renderHeadline($entry['titel'], 3, false, false);
				renderParagraph($entry['text']);
				echo '<form action="" method="post">';
					echo '<input type="hidden" name="produkt[id]" value="' . $entry['id'] . '">';
					echo '<input type="hidden" name="produkt[titel]" value="' . $entry['titel'] . '">';
					echo '<input type="hidden" name="warenkorb" value="1">';
					$sizeValues = explode(',', $entry['optionen']);
					echo '<select name="produkt[size]" class="form-control">';
					foreach ($sizeValues as $value) {
						echo '<option value="' . $value . '">' . $value. '</option>';
					}
					echo '</select>';
					echo '<button type="submit" class="btn btn-default">In den Warenkorb</button>';
				echo '</form>';
			echo '</div>';
			echo '<div class="clear"></div>';
		echo '</article>';
	}
}

echo '<a href="index.php?nodesId=' . $_GET['nodesId'] . '&ansicht=warenkorb">Zum Warenkorb</a>';