<?php
// main settings
$main['template'] = 'xzite';
$main['charset'] = 'UTF-8';
$main['xua'] = 'IE=Edge';
$main['lang'] = 'de';
$main['favicon'] = 'favicon.ico';
$main['title'] = '57KKK';
$main['description'] = '57KKK Store';
$main['keywords'] = '57kkk, store, xzite, yves, rap, music, cds, shirts';

// including css and js files
$main['cssFiles'][] = 'css/bootstrap.min.css';
$main['cssFiles'][] = 'css/font-awesome.min.css';
$main['cssFiles'][] = 'css/lightbox.css';
$main['cssFiles'][] = 'style.css';
$main['jsFiles'][] = 'js/jquery-1.11.3.min.js';
$main['jsFiles'][] = 'js/bootstrap.min.js';
$main['jsFiles'][] = 'js/lightbox.js';
$main['jsFiles'][] = 'js/main.js';
$main['ieJsFiles'][] = 'js/html5shiv.min.js';
$main['ieJsFiles'][] = 'js/respond.min.js';

// including table configs
include_once dirname(__FILE__) . '/default/usersCfg.php';
include_once dirname(__FILE__) . '/default/nodesCfg.php';
include_once dirname(__FILE__) . '/default/sitesCfg.php';
include_once dirname(__FILE__) . '/default/produkteCfg.php';
include_once dirname(__FILE__) . '/default/produktkategorienCfg.php';
include_once dirname(__FILE__) . '/default/variantenCfg.php';
include_once dirname(__FILE__) . '/default/ordersCfg.php';
include_once dirname(__FILE__) . '/default/releasesCfg.php';
include_once dirname(__FILE__) . '/default/galeriebilderCfg.php';

// including classes
// include_once dirname(__FILE__) . '/classes/meineklasse.class.php';