<?php
class MySqlAdapter implements AdapterInterface {
	private $_sql;

	public function __construct($sql) {
		$this->_sql = $sql;
	}

	public function getNumResults() {

		//link database and execute $sql
		//return the results
	}

	public function getSlice($offset, $length){
		
	}
}
?>
