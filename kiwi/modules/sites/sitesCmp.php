<div class="modul sites sitesMain">
	<div class="listTop">
		<?php
			renderListTop($data['table']);
		?>
	</div>
	<?php
		if (isset($_GET['sub'])) {
			if (($_GET['sub'] == 'list' || $_GET['sub'] == 'all') && (!isset($_GET['action']))) {
// 				de('sitesCmp modulansicht list');
				include_once dirname(__FILE__) . '/sitesListCmp.php';
				
			} elseif (($_GET['sub'] == 'new' && !isset($_GET['action']) || ($_GET['sub'] == 'new' && $_GET['action'] == 'new'))) {
// 				de('sitesCmp modulansicht new');
				include_once dirname(__FILE__) . '/sitesNewCmp.php';
				
			} elseif (isset($_GET['sitesId']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
// 				de('sitesCmp modulansicht edit');
				include_once dirname(__FILE__) . '/sitesEditCmp.php';
				
			} elseif (isset($_GET['sitesId']) && isset($_GET['action']) && ($_GET['action'] == 'copy' || $_GET['action'] == 'delete')) {
// 				de('sitesCmp modulansicht list');
				include_once dirname(__FILE__) . '/sitesListCmp.php';
			}
		}
	?>
</div>