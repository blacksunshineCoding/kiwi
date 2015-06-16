<?php
$data['produkte']['entries'] = getRows('SELECT * FROM produkte WHERE online = 1');

if (isset($_POST['warenkorb'])) {
	$_SESSION['produkte'][] = $_POST['produkt'];
}

if (isset($_SESSION['produkte'])) de($_SESSION['produkte']);