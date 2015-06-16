<div class="modul produktkategorien produktkategorienMain">
	<div class="listTop">
		<?php
			renderListTop($data['table']);
			renderHeadline($data['table']['label'], 1);
		?>
	</div>
	<?php
		if (isset($_GET['sub'])) {
			if (isset($_GET['action']) && $_GET['action'] == 'all') {
				include_once dirname(__FILE__) . '/produktkategorienListCmp.php';
				
			} elseif (($_GET['sub'] == 'new' && !isset($_GET['action']) || ($_GET['sub'] == 'new' && $_GET['action'] == 'new'))) {
				include_once dirname(__FILE__) . '/produktkategorienNewCmp.php';
				
			} elseif (isset($_GET['produktkategorienId']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
				include_once dirname(__FILE__) . '/produktkategorienEditCmp.php';
				
			} elseif (isset($_GET['produktkategorienId']) && isset($_GET['action']) && ($_GET['action'] == 'copy' || $_GET['action'] == 'delete')) {
				include_once dirname(__FILE__) . '/produktkategorienListCmp.php';
			}
		}
	?>
</div>