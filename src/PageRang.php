<?php
class PageRang {
	//item
	protected $totalItems;
	protected $totalItemsPerPage;
	//page
	protected $currentPage;

	//$param = array($currentPage, $totalItemsPerPage, $totalItems)
	//改为关联数组比较好
	public function __construct(array $param = array()) {
		$this->currentPage = ((int) $param['currentPage'] > 0) ? ((int) $param['currentPage']) : 1;
		$this->numItemsPerPage = ((int) $param["numItemsPerPage"] >0 ) ? ((int) $param['numItemsPerPage']) : 10;
		$this->totalItems = (int) $param['totalItems'];
	}

	public function currentPage() {
		return $this->currentPage;
	}

	public function numItemsPerPage() {
		return $this->numItemsPerPage;
	}

	public function totalItems() {
		return $this->totalItems;
	}
}
?>