<?php
require 'src/Paginator.php';
require 'src/PageRang.php';

class PaginatorTest extends PHPUnit_Framework_TestCase {

	//out of bounds
	public function testOutOfBounds() {
		$params = array('currentPage'=>12, 'numItemsPerPage'=>10, 'totalItems'=>100);
		$pageRang = new PageRang($params);
		$paginator = new Paginator($pageRang);
		$this->assertTrue($paginator->isOutOfBounds());
	}

	//not out of bounds
	public function testNotOutOfBounds() {
		$params = array('currentPage'=>5, 'numItemsPerPage'=>10, 'totalItems'=>100);
		$pageRang = new PageRang($params);
		$paginator = new Paginator($pageRang);
		$this->assertFalse($paginator->isOutOfBounds());
	}

	//return the items per page
	public function testGetNumItemsPerPage() {
		$params = array('currentPage'=>5, 'numItemsPerPage'=>10, 'totalItems'=>100);
		$pageRang = new PageRang($params);
		$paginator = new Paginator($pageRang);
		$this->assertSame(10, $paginator->getNumItemsPerPage());
	}

	//return the current page
	public function testGetCurrentPage() {
		$params = array('currentPage'=>5, 'numItemsPerPage'=>10, 'totalItems'=>100);
		$pageRang = new PageRang($params);
		$paginator = new Paginator($pageRang);
		$this->assertSame(5, $paginator->getCurrentPage());
	}

	//return the number of results
	public function testGetTotalItems() {

		$params = array('currentPage'=>5, 'numItemsPerPage'=>10, 'totalItems'=>100);
		$pageRang = new PageRang($params);
		$paginator = new Paginator($pageRang);
		$this->assertSame(100, $paginator->getTotalItems());
	}

	//return the number of pages
	public function testGetTotalPages() {
		
		$params = array('currentPage'=>5, 'numItemsPerPage'=>10, 'totalItems'=>100);
		$pageRang = new PageRang($params);
		$paginator = new Paginator($pageRang);
		$this->assertSame(10, $paginator->getTotalPages());
	}
/*
	//return whether have to paginate or not
	public function testHaveToPaginate() {

		return $this->getNumResults() > $this->itemsPerPage; 
	}

	//return whether there is previous page or not
	public function testHasPreviousPage() {

		return $this->currentPage > $this->getFirstPage();
	}

	//return the previous page
	public function testGetPreviousPage() {

		if ($this->hasPreviousPage()) {
			return $this->currentPage - 1;
		} else {
			throw new Exception("There is not previous page.");
			exit();
		}
	}

	//return whether there is next page or not
	public function testHasNextPage() {

		return $this->currentPage < $this->getTotalPages();
	}

	//return the next page
	public function testGetNextPage() {

		if ($this->hasNextPage()) {
			return $this->currentPage + 1;
		} else {
			throw new Exception("There is not next page.");
			exit();
		}
	}

	//return the first page
	public function testGetFirstPage() {
		return $this->firstPage;
	}

	//return the last page
	public function testGetLastPage() {
		return $this->lastPage;
	}

	//return the index offset
	public function testGetOffset() {
		
		$this->offset = ($this->getCurrentPage() - 1) * $this->getNumItemsPerPage();
		return (int) $this->offset;
	}

	public function testMakeUrl() {
		
	}*/
}
?>
?>