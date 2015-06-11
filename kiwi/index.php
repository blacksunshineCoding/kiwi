<?php
	session_start();
	include_once dirname(__FILE__) . '/../config/init.php';
	
	if (signedIn()) {
		include_once dirname(__FILE__) . '/kiwi.php';
	} else {
		include_once dirname(__FILE__) . '/login.php';
	}