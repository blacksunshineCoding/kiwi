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

$galeriebilderCmpFile = dirname(__FILE__) . '/galeriebilder' . ucfirst($modulansicht) . 'Cmp.php';
?>
<div class="modul galeriebilder galeriebilderMain">
	<div class="listTop">
		<?php
			renderListTop($data['table']);
			renderHeadline($data['table']['label'], 1);
		?>
	</div>
	<?php
		if (file_exists($galeriebilderCmpFile)) {
			include_once($galeriebilderCmpFile);
		}
	?>
</div>
<div class="clear"></div>