<?php
$modulname = 'side';
?>
<div class="module kiwiModule side">
	<?php
		if (isset($_GET['navigation'])) {
			renderListSide($data['table']);
		} else {
			renderParagraph('Wählen sie einen Navigationspunkt aus.', 'choose');
		}
	?>
</div>