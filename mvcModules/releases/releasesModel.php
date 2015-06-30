<?php
class releasesModel {
	public $table;
	private $db;
	public $entries;

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
	
	public function countDownload($entryId) {
		$query = 'UPDATE `' . $this->table['name'] . '` SET downloads = downloads + 1 WHERE id = ' . $entryId;
		$this->db->query($query);
	}
}