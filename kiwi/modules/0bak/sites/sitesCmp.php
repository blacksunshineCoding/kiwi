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

$sitesCmpFile = dirname(__FILE__) . '/sites' . ucfirst($modulansicht) . 'Cmp.php';
?>
<div class="modul sites sitesMain">
	<div class="listTop">
		<?php
			renderListTop($data['table']);
			renderHeadline($data['table']['label'], 1);
		?>
	</div>
	<?php
		if (file_exists($sitesCmpFile)) {
			include_once($sitesCmpFile);
		}
	?>
</div>