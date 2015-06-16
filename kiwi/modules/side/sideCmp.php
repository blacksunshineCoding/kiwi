<?php
	$modulname = 'side';
?>
<div class="module kiwiModule side">
	<?php
		if (isset($_GET['navigation'])) {
// 			$navName = dirname(__FILE__) . '/' . $modulname . ucfirst($_GET['navigation']) . 'Cmp.php';
// 			if (file_exists($navName)) {
// 				include_once($navName);
// 			}
			renderListSide($data['table']);
		} else {
			renderParagraph('Wählen sie einen Navigationspunkt aus.', 'choose');
		}
	?>
</div>