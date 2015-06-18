<?php
$main['sites'] = idAsIndex(getRows('SELECT * FROM sites'));

if (isset($_GET['navigation'])) {
	$module['incFile'] = dirname(__FILE__) . '/' . strtolower($_GET['navigation']) . '/' . ucfirst($_GET['navigation']) . 'Inc.php';
	$module['cmpFile'] = dirname(__FILE__) . '/' . strtolower($_GET['navigation']) . '/' . ucfirst($_GET['navigation']) . 'Cmp.php';
}

if (isset($module['incFile']) && file_exists($module['incFile'])) {
	include_once($module['incFile']);
}