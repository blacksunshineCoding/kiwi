<?php
// main settings
$main['template'] = 'xzite';
$main['charset'] = 'UTF-8';
$main['xua'] = 'IE=Edge';
$main['lang'] = 'de';
$main['favicon'] = 'favicon.ico';
$main['title'] = 'Kiwi - Content Management System';
$main['description'] = 'Kiwi - Ein freies Content Management System';
$main['keywords'] = 'kiwi, cms, content management system';

// including css and js files
$main['cssFiles'][] = 'style.css';
$main['cssFiles'][] = 'css/bootstrap.min.css';
$main['jsFiles'][] = 'js/jquery-1.11.3.min.js';
$main['jsFiles'][] = 'js/bootstrap.min.js';
$main['ieJsFiles'][] = 'js/html5shiv.min.js';
$main['ieJsFiles'][] = 'js/respond.min.js';

// including table configs
include_once dirname(__FILE__) . '/default/usersCfg.php';
include_once dirname(__FILE__) . '/default/nodesCfg.php';
include_once dirname(__FILE__) . '/default/sitesCfg.php';
include_once dirname(__FILE__) . '/default/produktkategorienCfg.php';
include_once dirname(__FILE__) . '/default/produkteCfg.php';

// including classes
// include_once dirname(__FILE__) . '/classes/meineklasse.class.php';