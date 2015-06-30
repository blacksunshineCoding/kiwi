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
	}
} else {
	$modulansicht = 'list';
}

$ordersCmpFile = dirname(__FILE__) . '/orders' . ucfirst($modulansicht) . 'Cmp.php';
?>
<div class="modul orders ordersMain">
	<div class="listTop">
		<?php
			renderListTop($data['table']);
			renderHeadline($data['table']['label'], 1);
		?>
	</div>
	<?php
		if (file_exists($ordersCmpFile)) {
			include_once($ordersCmpFile);
		}
	?>
</div>
<div class="clear"></div>