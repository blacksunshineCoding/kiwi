<?php
include_once dirname(__FILE__) . '/../../config/init.php';
if (isset($_GET['id'])) {
	$query = 'UPDATE `galeriebilder` SET views = views + 1 WHERE id = ' . $_GET['id'];
	doQuery($query);
}