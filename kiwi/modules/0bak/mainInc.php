<?php
$main['sites'] = $db->getRows('SELECT * FROM sites');
if (isset($_GET['navigation'])) {
	$module['incFile'] = dirname(__FILE__) . '/' . strtolower($_GET['navigation']) . '/' . $_GET['navigation'] . 'Inc.php';
	$module['cmpFile'] = dirname(__FILE__) . '/' . strtolower($_GET['navigation']) . '/' . $_GET['navigation'] . 'Cmp.php';
}

if (file_exists(dirname(__FILE__) . '/../../functionsInc.php')) {
	include_once dirname(__FILE__) . '/../../functionsInc.php';
}

if (isset($module['incFile']) && file_exists($module['incFile'])) {
	include_once($module['incFile']);
}