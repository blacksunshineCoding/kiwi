<?php
if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		default:
		case 'all':
			$modulansicht = 'list';
			break;
				
		case 'edit':
			$modulansicht = 'edit';
			break;
			
		case 'new':
			$modulansicht = 'new';
			break;
	}
} else {
	$modulansicht = 'list';
}

$releasesCmpFile = dirname(__FILE__) . '/releases' . ucfirst($modulansicht) . 'Cmp.php';
?>
<div class="modul releasess releasesMain">
	<div class="listTop">
		<?php
			renderListTop($data['table']);
			renderHeadline($data['table']['label'], 1);
		?>
	</div>
	<?php
		if (file_exists($releasesCmpFile)) {
			include_once($releasesCmpFile);
		}
	?>
</div>
<div class="clear"></div>