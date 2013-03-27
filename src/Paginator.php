<?php
class Paginator {
	//items
	protected $totalItems = 0;
	protected $numItemsPerPage = 10;
	
	//pages
	protected $totalPages = 0;
	protected $currentPage = 1;
	protected $previousPage = null;
	protected $nextPage = null;
	protected $firstPage = 1;
	protected $lastPage = null;

	//index
	protected $offset = null;

	protected $isOutOfBounds = false;

	//url
	protected $baseUrl;

	//Constructor
	//it not need class PageRang
	public function __construct(array $param = array()) {

		$this->currentPage = ((int) $param['currentPage'] > 0) ? ((int) $param['currentPage']) : 1;
		$this->numItemsPerPage = ((int) $param["numItemsPerPage"] >0 ) ? ((int) $param['numItemsPerPage']) : 10;
		$this->totalItems = (int) $param['totalItems'];
	}

	//whether it is out of bounds or not
	public function isOutOfBounds() {

		$this->isOutOfBounds = ($this->getCurrentPage() > $this->getTotalPages());
		return $this->isOutOfBounds;
	}

	//return the items per page
	public function getNumItemsPerPage() {

		return $this->numItemsPerPage;
	}

	//return the current page
	public function getCurrentPage() {

		return $this->currentPage;
	}

	//return the number of results
	public function getTotalItems() {

		return $this->totalItems;
	}

	//return the number of pages
	public function getTotalPages() {
		
		$this->totalPages = (int) ceil($this->getTotalItems() / $this->getNumItemsPerPage());
		$this->lastPage = $this->totalPages;
		return $this->totalPages;
	}

	//return whether have to paginate or not
	public function haveToPaginate() {

		return $this->getTotalItems() > $this->getNumItemsPerPage(); 
	}

	//return whether there is previous page or not
	public function hasPreviousPage() {

		return $this->getCurrentPage() > $this->getFirstPage();
	}

	//return the previous page
	public function getPreviousPage() {

		if ($this->hasPreviousPage()) {
			return $this->getCurrentPage() - 1;
		} else {
			//throw new Exception("There is not previous page.");
			//exit();
			return false;
		}
	}

	//return whether there is next page or not
	public function hasNextPage() {

		return $this->getCurrentPage() < $this->getTotalPages();
	}

	//return the next page
	public function getNextPage() {

		if ($this->hasNextPage()) {
			return $this->getCurrentPage() + 1;
		} else {
			//throw new Exception("There is not next page.");
			//exit();
			return false;
		}
	}

	//return the first page
	public function getFirstPage() {
		return (int) $this->firstPage;
	}

	//return the last page
	public function getLastPage() {
		return (int) $this->lastPage;
	}

	//return the index offset
	public function getOffset() {
		
		$this->offset = ($this->getCurrentPage() - 1) * $this->getNumItemsPerPage();
		return (int) $this->offset;
	}

	public function makeUrl() {
		
	}
}
?>