<?php
class PageRang {
	//item
	protected $numItems;
	protected $numItemsPerPage;
	//page
	protected $currentPage;

	//$param = array($currentPage, $numItemsPerPage, $numItems)
	//改为关联数组比较好
	public function __construct(array $param = array(0, 0, 0)) {
		$this->currentPage = ((int) $param[0] > 0) ? ((int) $param[0]) : 1;
		$this->numItemsPerPage = ((int) $param[1] >0 ) ? ((int) $param[1]) : 10;
		$this->numItems = (int) $param[2];
	}

	public function currentPage() {
		return $this->currentPage;
	}

	public function numPerPage() {
		return $this->numItemsPerPage;
	}

	public function numItems() {
		return $this->numItems;
	}
}
?>