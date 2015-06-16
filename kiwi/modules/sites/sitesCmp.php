<div class="modul sites sitesMain">
	<div class="listTop">
		<?php
			renderListTop($data['table']);
			renderHeadline($data['table']['label'], 1);
		?>
	</div>
	<?php
		if (isset($_GET['sub'])) {
			if (isset($_GET['action']) && $_GET['action'] == 'all') {
				include_once dirname(__FILE__) . '/sitesListCmp.php';
				
			} elseif (($_GET['sub'] == 'new') || (isset($_GET['action']) && $_GET['action'] = 'new')) {
				include_once dirname(__FILE__) . '/sitesNewCmp.php';
				
			} elseif (isset($_GET['sitesId']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
				include_once dirname(__FILE__) . '/sitesEditCmp.php';
				
			} elseif (isset($_GET['sitesId']) && isset($_GET['action']) && ($_GET['action'] == 'copy' || $_GET['action'] == 'delete')) {
				de(2);
				include_once dirname(__FILE__) . '/sitesListCmp.php';
			}
		}
	?>
</div>