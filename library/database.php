<?php

$db['host'] = 'localhost';
$db['user'] = 'root';
$db['pass'] = 'root';
$db['name'] = 'kiwi';

/**
 * dbConnect
 * Stellt eine Verbindung mit der Datenbank her
 */
function dbConnect(){
	global $db;
	mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']) or die ('Keine Verbindung moeglich');
	//mysql_select_db($db['name']) or die ('Die Datenbank existiert nicht');
	//$link = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);
}

/**
 * dbClose
 * Schließt eine Datenbankverbindung
 */
function dbClose() {
	global $db;
	$link = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);
	mysqli_close($link);
}

/**
 * doQuery
 * Fuehrt eine Query aus
 * @param $query
 */
function doQuery($query) {
	global $db;
	$link = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);
	mysqli_query($link, $query) or die (mysql_error());
	return TRUE;
}

/**
 * getDbLink
 * Gibt den Link fuer die Datenbankverbindung zurueck
 */
function getDbLink() {
	global $db;
	return mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);
}

/**
 * checkDbConnection
 * Prueft ob eine Datenbankverbindung moeglich ist
 */
function checkDbConnection(){
	ini_set('display_startup_errors',0);
	ini_set('display_errors',0);
	error_reporting(0);
	
	global $db;
	$connect = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name'])
		or print ('<img src="../1img/aas/icons/dbFalse.png" alt="Datenbankverbindung fehlgeshlagen!">');
	if ($connect == FALSE) return FALSE;
	echo '<img src="../1img/aas/icons/dbTrue.png" alt="Datenbankverbindung erfolgreich!">';
}

/**
 * checkDbExist
 * Prueft ob eine Datenbank existiert
 */
function checkDbExist(){
	ini_set('display_startup_errors',0);
	ini_set('display_errors',0);
	error_reporting(0);
	
	global $db;
	$connect = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name'])
		or print ('<img src="../1img/aas/icons/dbTableFalse.png" alt="Datenbank existiert nicht!">');
	if ($connect == FALSE) return FALSE;
	echo '<img src="../1img/aas/icons/dbTableTrue.png" alt="Datenbankverbindung erfolgreich!">';
}

/**
 * getRows
 * Fuehrt eine Query aus und gibt alle Zeilen in einem assoziativen Array zurueck
 * @param string $query
 */
function getRows($query) {
	global $db;
	dbConnect();
	$link = getDbLink();

	if ($result = mysqli_query($link, $query)) {
		$row2 = array();
	    while ($row = mysqli_fetch_assoc($result)) {
	       $row2[] = $row;
	    }
	    return $row2;
	} else {
		return FALSE;
	}
	
	dbClose();
	
}

/**
 * getRow
 * Fuehrt eine Query aus und gibt eine einzelne Zeile in einem Array zurueck
 * @param string $query
 */
function getRow($query) {
	global $db;
	dbConnect();
	$link = getDbLink();
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	dbClose();
	return $row;
}

/**
 * insertRow
 * Fuegt eine einzelne neue Zeile in eine Tabelle ein
 * @param array $row
 * @param string $table
 */
function insertRow($row, $table) {
	global $db;
	dbConnect();
	
	$query = 'INSERT INTO ' . $table . ' ';
	$fieldNames = array();
	$fieldContents = array();

	foreach ($row as $varId => $var) {
		$row[$varId] = '"' . $var . '"';
	}
	
	foreach ($row as $varId => $var) {
		$fieldNames[] = $varId;
		$fieldContents[] = $var;
	}
	
	$names = implode (',', $fieldNames);
	$contents = implode (',', $fieldContents);
	
	$query .= '(' . $names . ')';
	$query .= ' VALUES ';
	$query .= '(' . $contents . ')';
	
	doQuery($query) or die('Fehler aufgetreten');
	dbClose();
	return TRUE;
}

function insertRowX($row, $table) {
	global $db;
	dbConnect();
	
	$query = 'INSERT INTO ' . $table . ' ';
	$fieldNames = array();
	$fieldContents = array();

	foreach ($row as $varId => $var) {
		$row[$varId] = '"' . $var . '"';
	}
	
	foreach ($row as $varId => $var) {
		$fieldNames[] = '"' . $varId . '"';
		$fieldContents[] = '"' . $var . '"';
	}
	
	$names = implode (',', $fieldNames);
	$contents = implode (',', $fieldContents);
	
	$query .= '(' . $names . ')';
	$query .= ' VALUES ';
	$query .= '(' . $contents . ')';
	
	doQuery($query) or die('Fehler aufgetreten');
	dbClose();
	return TRUE;
}

/**
 * updateRow
 * Aktualisiert eine einzelne anhand von $keyField und $key bestimmte Zeile in der Tabelle
 * @param array $row
 * @param string $keyField
 * @param string $key
 * @param string $table
 */
function updateRow($row, $keyField, $key, $table) {
	global $db;
	dbConnect();
	
	$query = 'UPDATE ' . $table . ' SET ';
	
	$fields = array();
	foreach ($row as $varId => $var) {
		$fields[] = $varId . ' = "' . $var . '"';
	}
	
	$fields2 = implode(',', $fields);
	$query .= $fields2;
	$query .= ' WHERE ' . $keyField . ' = ' . $key;

	doQuery($query) or die ('Fehler aufgetreten');
	dbClose();
	return TRUE;
}

/**
 * deleteRow
 * Loescht eine einzelne anhand von $keyField und $key bestimmte Zeile in der Tabelle
 * @param string $keyField
 * @param string $key
 * @param string $table
 */
function deleteRow($keyField, $key, $table) {
	global $db;
	dbConnect();
	if (is_numeric($key) || $keyField == 'id') {
		$query = 'DELETE FROM ' . $table . ' WHERE ' . $keyField . ' = ' . $key;
	} else {
		$query = 'DELETE FROM ' . $table . ' WHERE ' . $keyField . ' LIKE "' . $key . '"';
	}
	doQuery($query) or die ('Fehler aufgetreten');
	dbClose();
	return TRUE;
	
}

/**
 * sqlEscape
 * Escaped einen String/Id mittels mysqli_real_escape_string. Db-Link wird automatisch gesetzt
 * @param string $string
 */

function sqlEscape($string) {
	$link = getDbLink();
	return mysqli_real_escape_string($link, $string);
}
?>