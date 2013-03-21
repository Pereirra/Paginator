<?php
class Paginator {
	protected $_totalPages;
	protected $_totalItems;
	protected $_itemsPerPage;
	protected $_currentPage;
	protected $_currentPageResults;
	protected $_previousPage;
	protected $_nextPage;
	protected $_firstPage;
	protected $_lastPage;
	protected $_adapter;

	//Constructor
	public function __construct(Adapter $adapter) {
		$this->_adapter = $adapter;
	}

	//set the items per page
	public function setItemsPerPage($itemsPerPage === 10) {
		$this->_currentPageResults = null;
		$this->_totalPages = null;
		$this->_itemsPerPage = (int) $itemsPerPage;
	}

	//return the items per page
	public function getItemsPerPage() {
		return $this->_itemsPerPage;
	}

	//set the current page
	public function setCurrentPage($currentPage === 1) {
		$this->_currentPageResults = null;
		$this->_currentPage = $currentPage;
	}

	//return the current page
	public function getCurrentPage() {
		return $this->_currentPage;
	}

	//return the number of results
	public function getNumResults() {
		if ($this->_totalItems === null) {
			$this->_totalItems = $this->_adapter->getNumResults();
		}

		return $this->_totalItems;
	}

	//return the number of pages
	public function getNumPages() {
		if ($this->_totalPages === null) {
			$this->_totalPages = (int) ceil($this->getNumResults() / $this->getItemsPerPage());
		}

		return $this->_totalPages;
	}

	//return whether have to paginate or not
	public function haveToPaginate() {
		return $this->getNumResults() > $this->_itemsPerPage; 
	}

	//return whether there is previous page or not
	public function hasPreviousPage() {
		return $this->_currentPage > 1;
	}

	//return the previous page
	public function getPreviousPage() {
		if ($this->hasPreviousPage()) {
			return $this->_currentPage - 1;
		} else {
			throw new Exception("There is not previous page.");
			exit();
		}
	}

	//return whether there is next page or not
	public function hasNextPage() {
		return $this->_currentPage < $this->getNumPages();
	}

	//return the next page
	public function getNextPage() {
		if ($this->hasNextPage()) {
			return $this->_currentPage + 1;
		} else {
			throw new Exception("There is not next page.");
			exit();
		}
	}
}
?>