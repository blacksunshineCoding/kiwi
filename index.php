<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
include_once dirname(__FILE__) . '/config/init.php';
include_once dirname(__FILE__) . '/modules/siteInc.php';
includeTemplate();