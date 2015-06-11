<div class="modul nodes nodesMain">
	<div class="listTop">
		<?php
			renderListTop($data['table']);
		?>
	</div>
	<?php
		if (isset($_GET['sub'])) {
			if ($_GET['sub'] == 'list' || $_GET['sub'] == 'all') {
				include_once dirname(__FILE__) . '/nodesListCmp.php';
			} elseif ($_GET['sub'] == 'new') {
				include_once dirname(__FILE__) . '/nodesNewCmp.php';
			} elseif ($_GET['sub'] == 'tree') {
				include_once dirname(__FILE__) . '/nodesTreeCmp.php';
			}
		}
	?>
</div>