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
			if (isset($_POST['sent']) && !isset($dateiUploadFeedback) && !isset($bildUploadFeedback)) {
				$modulansicht = 'list';
			} else {
				$modulansicht = 'new';
			}
			break;
	}
} else {
	$modulansicht = 'list';
}

$cmpFile = dirname(__FILE__) . '/' . $data['table']['name'] . ucfirst($modulansicht) . 'Cmp.php';
?>
<div class="modul <?php echo $data['table']['name'] . ' ' . $data['table']['name'] . 'Main'; ?>">
	<div class="listTop">
		<?php
			renderListTop($data['table']);
			renderHeadline($data['table']['label'], 1);
		?>
	</div>
	<?php
		if (file_exists($cmpFile)) {
			include_once($cmpFile);
		}
	?>
</div>
<div class="clear"></div>