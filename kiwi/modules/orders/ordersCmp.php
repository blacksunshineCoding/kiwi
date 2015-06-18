<div class="modul orders ordersMain">
	<div class="listTop">
		<?php
			renderListTop($data['table']);
			renderHeadline($data['table']['label'], 1);
		?>
	</div>
	<?php
		if (isset($_GET['sub'])) {
			if ((($_GET['sub'] == 'list' || $_GET['sub'] == 'all') || (isset($_GET['action']) && $_GET['action'] == 'all')) && !isset($_GET['ordersId'])) {
				include_once dirname(__FILE__) . '/ordersListCmp.php';
				
			} elseif (isset($_GET['ordersId']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
				include_once dirname(__FILE__) . '/ordersEditCmp.php';
				
			} elseif (isset($_GET['ordersId']) && isset($_GET['action']) && ($_GET['action'] == 'copy' || $_GET['action'] == 'delete')) {
				include_once dirname(__FILE__) . '/ordersListCmp.php';
			}
		}
	?>
</div>
<div class="clear"></div>