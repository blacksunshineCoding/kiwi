<?php
class galerieModel {
	public $table;
	public $entries;
	private $db;

	public function __construct($table, $db){
		$this->table = $table;
		$this->db = $db;
		$this->entries = $this->getEntries();
	}
	
	public function getEntries() {
		$query = 'SELECT * FROM `' . $this->table['name'] . '` WHERE online = 1 ORDER BY position, id';
		$entries = $this->db->getRows($query);
		return $entries;
	}
	
	public function countViews($entryId) {
		$query = 'UPDATE `' . $this->table['name'] . '` SET views = views + 1 WHERE id = ' . $entryId;
		$this->db->query($query);
	}
}