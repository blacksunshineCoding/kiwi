<?php
	if (count($main['tables']) > 0) {
		echo '<ul class="navigation">';
		foreach ($main['tables'] as $table) {
			if (isset($table['showTop']) && $table['showTop'] == 1) {
				$href = 'index.php?navigation=' . $table['name'] . '&sub=all&action=all';
				echo '<li>';
				echo '<a href="' . $href . '">';
				if (isset($table['icon'])) echo '<i class="' . $table['icon'] . '"></i>';
				echo '<span class="title">' . $table['label'] . '</span>';
				echo '</a>';
				echo '</li>';
			}
		}
		echo '</div>';
		echo '<div class="clear"></div>';
	}
?>