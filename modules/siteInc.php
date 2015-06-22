<?php
$main['nodes'] = getRows('SELECT * FROM nodes');
$main['sites'] = idAsIndex(getRows('SELECT * FROM sites'));
$main['home'] = getRow('SELECT * FROM sites WHERE home = 1');
$main['navigations'] = prepareNodes($main['nodes']);

if (isset($_GET['nodesId']) && isset($main['sites'][$_GET['nodesId']])) {
	$main['currentSite'] = $main['sites'][$_GET['nodesId']];
} else {
	$main['currentSite'] = $main['home'];
}

if (file_exists(dirname(__FILE__) . '/../functionsInc.php')) {
	include_once dirname(__FILE__) . '/../functionsInc.php';
}

if ($main['currentSite']['module'] != '0') {
	$moduleInc = dirname(__FILE__) . '/../' . $main['currentSite']['module'] . 'Inc.php';
	if (file_exists($moduleInc)) {
		include_once $moduleInc;
	}
}

$main['title'] = $main['currentSite']['titel'] . ' :: ' . $main['title'];