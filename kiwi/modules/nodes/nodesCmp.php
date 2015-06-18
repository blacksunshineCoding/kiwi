<?php
if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		default:
		case 'all':
			$modulansicht = 'list';
			break;
				
		case 'new':
			$modulansicht = 'new';
			break;
				
		case 'tree':
			$modulansicht = 'tree';
			break;
				
		case 'edit':
			$modulansicht = 'edit';
			break;
	}
} else {
	$modulansicht = 'list';
}

$nodesCmpFile = dirname(__FILE__) . '/nodes' . ucfirst($modulansicht) . 'Cmp.php';
?>
<div class="modul nodes nodesMain">
	<div class="listTop">
		<?php
			renderListTop($data['table']);
			renderHeadline($data['table']['label'], 1);
		?>
	</div>
	<?php
		if (file_exists($nodesCmpFile)) {
			include_once($nodesCmpFile);
		}
	?>
</div>