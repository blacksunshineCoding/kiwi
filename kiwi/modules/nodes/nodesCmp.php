<div class="modul nodes nodesMain">
	<div class="listTop">
		<?php
			renderListTop($data['table']);
			renderHeadline($data['table']['label'], 1);
		?>
	</div>
	<?php
		if (isset($_GET['sub'])) {
			if (($_GET['sub'] == 'list' || $_GET['sub'] == 'all') || (isset($_GET['action']) && $_GET['action'] == 'all')) {
				include_once dirname(__FILE__) . '/nodesListCmp.php';
				
			} elseif (($_GET['sub'] == 'new' && !isset($_GET['action']) || ($_GET['sub'] == 'new' && $_GET['action'] == 'new'))) {
				include_once dirname(__FILE__) . '/nodesNewCmp.php';
				
			} elseif ($_GET['sub'] == 'tree' && !isset($_GET['action'])) {
				include_once dirname(__FILE__) . '/nodesTreeCmp.php';
				
			} elseif (isset($_GET['nodesId']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
				include_once dirname(__FILE__) . '/nodesEditCmp.php';
				
			} elseif (isset($_GET['nodesId']) && isset($_GET['action']) && ($_GET['action'] == 'copy' || $_GET['action'] == 'delete')) {
				include_once dirname(__FILE__) . '/nodesListCmp.php';
			}
		}
	?>
</div>