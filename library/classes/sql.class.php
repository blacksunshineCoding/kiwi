<?php
class sql {
	private $host;
	private $name;
	private $user;
	private $pass;
	
	public function __construct($config){
		$this->host = $config['host'];
		$this->name = $config['name'];
		$this->user = $config['user'];
		$this->pass = $config['pass'];
		$this->charset = $config['charset'];
	}
	
	public function connect(){
		mysqli_connect($this->host, $this->user, $this->pass, $this->name) or die ('Keine Verbindung moeglich');
	}
	
	public function close() {
		mysqli_close($this->link());
	}
	
	public function link() {
		return mysqli_connect($this->host, $this->user, $this->pass, $this->name);
	}
	
	public function escape($string) {
		$link = $this->link();
		return mysqli_real_escape_string($link, $string);
	}
	
	public function proofConnection(){
		$connect = $this->connect() or print ('Datenbankverbindung fehlgeschlagen!');
		if ($connect == false) {
			return false;
		} else {
			$this->close();
			return 'Datenbankverbindung erfolgreich!';
		}
	}
	
	public function proofDatabase(){
		$connect = $this->connect() or print ('Datenbank nicht gefunden!');
		if ($connect == false) { 
			return false;
		} else {
			$this->close();
			return 'Datenbankverbindung erfolgreich!';
			
		}
	}
	
	public function query($query) {
		mysqli_query($this->link(), $query) or die (mysql_error());
		return true;
	}
	
	public function getRows($query) {
		$this->connect();
		$link = $this->link();
	
		if ($result = mysqli_query($link, $query)) {
			$row2 = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$row2[] = $row;
			}
			return $this->idAsKey($row2);
		} else {
			return false;
		}
	
		$this->close();
	}
	
	public function getRow($query) {
		$this->connect();
		$link = $this->link();
		
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$this->close();
		return $row;
	}
	
	public function insertRow($row, $table) {
		$this->connect();
	
		$query = 'INSERT INTO ' . $table . ' ';
		$fieldNames = array();
		$fieldContents = array();
	
		foreach ($row as $varId => $var) {
			$row[$varId] = '"' . $this->escape($var) . '"';
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
		
		$this->query($query) or die('Fehler beim Eintragen des Datensatzes!');
		$this->close();
		return true;
	}
	
	
	public function updateRow($row, $keyField, $key, $table) {
		$this->connect();
	
		$query = 'UPDATE ' . $table . ' SET ';
	
		$fields = array();
		foreach ($row as $varId => $var) {
			$fields[] = '' . $varId . ' = "' . $var . '"';
		}
	
		$fields2 = implode(',', $fields);
		$query .= $fields2;
		$query .= ' WHERE ' . $keyField . ' = "' . $key . '"';
	
		$this->query($query) or die ('Fehler beim Aktualisieren des Datensatzes!');
		$this->close();
		return true;
	}
	
	public function deleteRow($keyField, $key, $table) {
		$this->connect();
	
		if (is_numeric($key) || $keyField == 'id') {
			$query = 'DELETE FROM ' . $table . ' WHERE ' . $keyField . ' = "' . $key . '"';
		} else {
			$query = 'DELETE FROM ' . $table . ' WHERE ' . $keyField . ' LIKE "' . $key . '"';
		}
		$this->query($query) or die ('Fehler beim Löschen des Datensatzes');
		$this->close();
		return true;
	}
	
	public function idAsKey($array) {
		if (count($array) > 0) {
			$newArray = array();
			foreach ($array as $arrayEintragId => $arrayEintrag) {
				$newArray[$arrayEintrag['id']] = $arrayEintrag;
			}
			return $newArray;
		}
	}
}