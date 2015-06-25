<?php
if (isset($main['currentSite'])) {
	renderSite($main['currentSite']);
	$site = $main['currentSite'];
// 	renderHeadline($site['titel'], 2, 'siteTitle');
// 	renderRichtext($site['text']);
// 	if ($site['module'] != '0') {
// 		$moduleCmp = dirname(__FILE__) . '/../' . $site['module'] . 'Cmp.php';
// 		if (file_exists($moduleCmp)) {
// 			include_once $moduleCmp;
// 		}
// 	}
	if ($site['mvcModule'] != '0') {
		$moduleMain = dirname(__FILE__) . '/../' . $site['mvcModule'] . '.php';
		if (file_exists($moduleMain)) include_once $moduleMain;
	}
}