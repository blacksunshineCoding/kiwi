<?php
$data['produkte']['entries'] = getRows('SELECT * FROM produkte WHERE online = 1');

if (isset($_POST['warenkorb'])) {
	$_POST['produkt']['anzahl'] = 1;
	$_SESSION['produkte'][$_POST['produkt']['id']] = $_POST['produkt'];
	$_SESSION['produkte'][$_POST['produkt']['id']]['preisOriginal'] = $_POST['produkt']['preis'];
	$data['feedback'][$_POST['produkt']['id']]['type'] = 'success';
	$data['feedback'][$_POST['produkt']['id']]['text'] = 'Das Produkt wurde zum Warenkorb hinzugefügt';
}


if (isset($_GET['nodesId'])) {
	$data['warenkorbLink'] = 'index.php?nodesId=' . $_GET['nodesId'] . '&ansicht=warenkorb';
} else {
	$data['warenkorbLink'] = 'index.php?ansicht=warenkorb';
}