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

$usersCmpFile = dirname(__FILE__) . '/users' . ucfirst($modulansicht) . 'Cmp.php';
?>
<div class="modul users usersMain">
	<div class="listTop">
		<?php
			//renderListTop($data['table']);
		?>
		<h1><?php echo $data['table']['label']; ?></h1>
	</div>
	<?php
		if (file_exists($usersCmpFile)) {
			include_once($usersCmpFile);
		}
	?>
</div>