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
	if (file_exists($moduleInc)) include_once $moduleInc;
}

if ($main['currentSite']['mvcModule'] != '0') {
	$moduleModel = dirname(__FILE__) . '/../' . $main['currentSite']['mvcModule'] . 'Model.php';
	$moduleController = dirname(__FILE__) . '/../' . $main['currentSite']['mvcModule'] . 'Controller.php';
	$moduleView = dirname(__FILE__) . '/../' . $main['currentSite']['mvcModule'] . 'View.php';
	$moduleCssFile = $main['currentSite']['mvcModule'] . '.css';
	$moduleJsFile = $main['currentSite']['mvcModule'] . '.js';
	
	if (file_exists(dirname(__FILE__) . '/../' . $moduleCssFile)) {
		$main['cssFiles'][] = $moduleCssFile;
	}
	
	if (file_exists(dirname(__FILE__) . '/../' . $moduleJsFile)) {
		$main['jsFiles'][] = $moduleJsFile;
	}
		
	if (file_exists($moduleModel)) include_once $moduleModel;
	if (file_exists($moduleController)) include_once $moduleController;
	if (file_exists($moduleView)) include_once $moduleView;
}

$main['title'] = $main['currentSite']['titel'] . ' :: ' . $main['title'];