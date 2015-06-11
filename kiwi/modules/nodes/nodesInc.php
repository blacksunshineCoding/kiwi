<?php
$data['table'] = $main['tables']['nodes'];
if (isset($_GET['sub'])) {
	if ($_GET['sub'] == 'list' || $_GET['sub'] == 'all') {
		include_once dirname(__FILE__) . '/nodesListInc.php';
	} elseif ($_GET['sub'] == 'new') {
		include_once dirname(__FILE__) . '/nodesNewInc.php';
	} elseif ($_GET['sub'] == 'tree') {
		include_once dirname(__FILE__) . '/nodesTreeInc.php';
	}
}
