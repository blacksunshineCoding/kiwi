<?php
// main settings
$main['template'] = 'xzite';
$main['charset'] = 'UTF-8';
$main['xua'] = 'IE=Edge';
$main['lang'] = 'de';
$main['favicon'] = 'favicon.ico';
$main['title'] = '57KKK';
$main['description'] = 'Hier gibt es keine Liebeslieder das ist Untergrundmukke';
$main['keywords'] = '57KKK, Shop, Store, xZiTe, Yves, Kay Kani, timderboss, Rap, Musik, CDs, Shirts';
$main['ogType'] = 'website';
$main['fbtitle'] = '57KKK';
$main['fburl'] = 'http://blacksunshine.cc/57kkk/';
$main['fbimage'] = 'images/57kkk-fbimage.jpg';
$main['longdescription'] = 'Broke, aber dope. 57-KKK ist die Gang. Stoffdrückerelite. Deine Lieblingspfandhustler.
Koks für die Welt. Gewaltsextrashrap. Musik mit Aussage. Labels sind schwul.
Vom Jointstümmel bis zur Skyline. #emofotzenundpepanstattnuttenundkoks';

// module list (mvc)
$main['moduleValues'] = '0';
$main['moduleValues'] .= ',mvcModules/katalog/katalog';
$main['moduleValues'] .= ',mvcModules/releases/releases';
$main['moduleValues'] .= ',mvcModules/galerie/galerie';
$main['moduleNames'] = '---';
$main['moduleNames'] .= ',Katalog';
$main['moduleNames'] .= ',Releases';
$main['moduleNames'] .= ',Galerie';

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

// including classes
include_once dirname(__FILE__) . '/classes/Table.class.php';
include_once dirname(__FILE__) . '/classes/Field.class.php';

// including table configs
include_once dirname(__FILE__) . '/default/usersCfg.php';
include_once dirname(__FILE__) . '/default/nodesCfg.php';
include_once dirname(__FILE__) . '/default/sitesCfg.php';
include_once dirname(__FILE__) . '/produkteCfg.php';
include_once dirname(__FILE__) . '/produktkategorienCfg.php';
include_once dirname(__FILE__) . '/variantenCfg.php';
include_once dirname(__FILE__) . '/ordersCfg.php';
include_once dirname(__FILE__) . '/releasesCfg.php';
include_once dirname(__FILE__) . '/galeriebilderCfg.php';
include_once dirname(__FILE__) . '/settingsCfg.php';
