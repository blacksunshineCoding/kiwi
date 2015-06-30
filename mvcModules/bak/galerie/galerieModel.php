<?php
class galerieModel {
	public $table;
	public $entries;

	public function __construct($table){
		$this->table = $table;
		$this->entries = $this->getEntries();
	}
	
	public function getEntries() {
		$query = 'SELECT * FROM `' . $this->table['name'] . '` WHERE online = 1 ORDER BY position, id';
		$entries = getRows($query);
		return $entries;
	}
	
	public function countViews($entryId) {
		$query = 'UPDATE `' . $this->table['name'] . '` SET views = views + 1 WHERE id = ' . $entryId;
		doQuery($query);
	}
}