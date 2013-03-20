<?php
class MySqlAdapter implements AdapterInterface {
	private $_dataname;

	public function __construct($dataname) {
		$this->_dataname = $dataname;
	}

	public function getNumResults() {
		$sql = sprintf("SELECT columnname FROM %s", $this->_dataname);

		//link database and execute $sql
		//return the results
	}

	public function getSlice($offset, $length){

	}
}
?>
