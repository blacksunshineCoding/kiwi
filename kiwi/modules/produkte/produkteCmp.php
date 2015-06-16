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
				include_once dirname(__FILE__) . '/produkteListCmp.php';
				
			} elseif (($_GET['sub'] == 'new' && !isset($_GET['action']) || ($_GET['sub'] == 'new' && $_GET['action'] == 'new'))) {
				include_once dirname(__FILE__) . '/produkteNewCmp.php';
				
			} elseif (isset($_GET['produkteId']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
				include_once dirname(__FILE__) . '/produkteEditCmp.php';
				
			} elseif (isset($_GET['produkteId']) && isset($_GET['action']) && ($_GET['action'] == 'copy' || $_GET['action'] == 'delete')) {
				include_once dirname(__FILE__) . '/produkteListCmp.php';
			}
		}
	?>
</div>