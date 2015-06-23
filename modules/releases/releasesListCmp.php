<div class="releasesList">
<?php
	if (isset($data['entries']) && count($data['entries']) > 0) {
		foreach ($data['entries'] as $entry) {
			echo '<div class="col-xs-12 col-sm-6 col-md-3">';
				echo '<div class="releaseEintrag">';
					echo '<div class="releaseEintragBild">';
						echo '<a href="index.php?nodesId=' . $_GET['nodesId'] . '&releasesId=' . $entry['id'] . '">';
// 						echo '<a href="uploads/' . getFileName($entry['datei'], 0) . '" download="' . getFileName($entry['datei'], 1) . '">';
							echo '<img src="' . resizePic(getFileName($entry['bild'], 0), 200, null) . '">';
							echo '<span class="bildOverlay"></span>';
						echo '</a>';
					echo '</div>';
					echo '<div class="releaseEintragTitel">';
						renderHeadline('<a href="index.php?nodesId=' . $_GET['nodesId'] . '&releasesId=' . $entry['id'] . '"><span class="interpret">' . $entry['interpret'] . '</span><span class="title">' . $entry['titel'] . '</span></a>', 3, null);
					echo '</div>';
					
				echo '</div>';
			echo '</div>';
		}
		echo '<div class="clear"></div>';
	}
?>
</div>