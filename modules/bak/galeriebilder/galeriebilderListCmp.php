<div class="galeriebilderList row">
<?php
	if (isset($data['entries']) && count($data['entries']) > 0) {
		foreach ($data['entries'] as $entry) {
			echo '<div class="col-xs-12 col-sm-6 col-md-3">';
				echo '<div class="galeriebilderEintrag">';
					echo '<a href="uploads/' . getFileName($entry['bild'], 0) . '" data-lightbox="galerie" data-title="' . $entry['titel'] . '" data-text="' . ($entry['kurztext']) . '">';
						echo '<img src="' . resizePic(getFileName($entry['bild'], 0), 200, null) . '">';
						echo '<span class="bildOverlay"></span>';
					echo '</a>';
				echo '</div>';
			echo '</div>';
		}
		echo '<div class="clear"></div>';
	}
?>
</div>