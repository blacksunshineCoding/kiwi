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
				
		case 'edit':
			$modulansicht = 'edit';
			break;
	}
} else {
	$modulansicht = 'list';
}

$produktkategorienCmpFile = dirname(__FILE__) . '/produktkategorien' . ucfirst($modulansicht) . 'Cmp.php';
?>
<div class="modul produktkategorien produktkategorienMain">
	<div class="listTop">
		<?php
			renderListTop($data['table']);
			renderHeadline($data['table']['label'], 1);
		?>
	</div>
	<?php
		if (file_exists($produktkategorienCmpFile)) {
			include_once($produktkategorienCmpFile);
		}
	?>
</div>