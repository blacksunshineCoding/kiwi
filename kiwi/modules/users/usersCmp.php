<div class="modul users usersAll">
	<div class="listTop">
		<?php
			renderListTop($data['table']);
		?>
	</div>
	<?php
		if ((isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['usersId'])) || (isset($_GET['sub']) && $_GET['sub'] == 'own') ) {
			include_once dirname(__FILE__) . '/usersEditCmp.php';
			
		} elseif ((isset($_GET['action']) && $_GET['action'] == 'new') || (isset($_GET['sub']) && $_GET['sub'] == 'new')) {
			include_once dirname(__FILE__) . '/usersNewCmp.php';
			
		} else {
			include_once dirname(__FILE__) . '/usersListCmp.php';
		}
	?>
</div>