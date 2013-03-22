<?php
class Paginator {
	//items
	protected $totalItems;
	protected $numItemsPerPage;
	
	//pages
	protected $totalPages;
	protected $currentPage;
	protected $previousPage;
	protected $nextPage;
	protected $firstPage = 1;
	protected $lastPage;

	//index
	protected $offset;

	protected $isOutOfBounds;

	//url
	protected $baseUrl;

	//Constructor
	public function __construct(PageRang $pageRang) {

		$this->totalItems 		= $pageRang->totalItems();
		$this->currentPage 		= $pageRang->currentPage();
		$this->numItemsPerPage  = $pageRang->numItemsPerPage();
	}

	//whether it is out of bounds or not
	public function isOutOfBounds() {

		$this->isOutOfBounds = $this->currentPage > $this->getTotalPages();
		return $this->isOutOfBounds;
	}

	//return the items per page
	public function getNumItemsPerPage() {

		return $this->itemsPerPage;
	}

	//return the current page
	public function getCurrentPage() {

		return $this->currentPage;
	}

	//return the number of results
	public function getTotalItems() {

		return $this->totaltems;
	}

	//return the number of pages
	public function getTotalPages() {
		
		$this->totalPages = (int) ceil($this->getTotalItems() / $this->getItemsPerPage());
		$this->lastPage = $this->totalPages;
		return $this->totalPages;
	}

	//return whether have to paginate or not
	public function haveToPaginate() {

		return $this->getNumResults() > $this->itemsPerPage; 
	}

	//return whether there is previous page or not
	public function hasPreviousPage() {

		return $this->currentPage > $this->getFirstPage();
	}

	//return the previous page
	public function getPreviousPage() {

		if ($this->hasPreviousPage()) {
			return $this->currentPage - 1;
		} else {
			throw new Exception("There is not previous page.");
			exit();
		}
	}

	//return whether there is next page or not
	public function hasNextPage() {

		return $this->currentPage < $this->getTotalPages();
	}

	//return the next page
	public function getNextPage() {

		if ($this->hasNextPage()) {
			return $this->currentPage + 1;
		} else {
			throw new Exception("There is not next page.");
			exit();
		}
	}

	//return the first page
	public function getFirstPage() {
		return $this->firstPage;
	}

	//return the last page
	public function getLastPage() {
		return $this->lastPage;
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