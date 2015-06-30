<?php
if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		default:
		case 'all':
			$modulansicht = 'list';
			break;
				
		case 'new':
			if (isset($_POST['sent'])) {
				$modulansicht = 'list';
			} else {
				$modulansicht = 'new';
			}
			break;
				
		case 'own':
			$modulansicht = 'edit';
			break;
				
		case 'edit':
			$modulansicht = 'edit';
			break;
	}
} else {
	$modulansicht = 'list';
}

$cmpFile = dirname(__FILE__) . '/' . $data['table']['name'] . ucfirst($modulansicht) . 'Cmp.php';
?>
<div class="modul <?php echo $data['table']['name'] . ' ' . $data['table']['name'] . 'Main'; ?>">
	<div class="listTop">
		<h1><?php echo $data['table']['label']; ?></h1>
	</div>
	<?php
		if (file_exists($cmpFile)) {
			include_once($cmpFile);
		}
	?>
</div>