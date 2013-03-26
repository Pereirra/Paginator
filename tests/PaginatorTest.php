<?php
require 'src/Paginator.php';
require 'src/PageRang.php';

class PaginatorTest extends PHPUnit_Framework_TestCase {

	//return the items per page
	public function testCurrentPage100ItemsAndOnPage5() {
		$params = array('currentPage'=>5, 'numItemsPerPage'=>10, 'totalItems'=>100);
		$pageRang = new PageRang($params);
		$paginator = new Paginator($pageRang);
		$this->assertFalse($paginator->isOutOfBounds());
		$this->assertSame(10, $paginator->getNumItemsPerPage());
		$this->assertSame(5, $paginator->getCurrentPage());
		$this->assertSame(100, $paginator->getTotalItems());
		$this->assertSame(10, $paginator->getTotalPages());
		$this->assertTrue($paginator->haveToPaginate());
		$this->assertTrue($paginator->hasPreviousPage());
		$this->assertTrue($paginator->hasNextPage());
		$this->assertSame(1, $paginator->getFirstPage());
		$this->assertSame(10, $paginator->getLastPage());
		$this->assertSame(6, $paginator->getNextPage());
		$this->assertSame(4, $paginator->getPreviousPage());
		$this->assertSame(40, $paginator->getOffset());
	}

	public function testCurrentPage100ItemsAndOnPage10() {
		$params = array('currentPage'=>10, 'numItemsPerPage'=>10, 'totalItems'=>100);
		$pageRang = new PageRang($params);
		$paginator = new Paginator($pageRang);
		$this->assertFalse($paginator->isOutOfBounds());
		$this->assertSame(10, $paginator->getNumItemsPerPage());
		$this->assertSame(10, $paginator->getCurrentPage());
		$this->assertSame(100, $paginator->getTotalItems());
		$this->assertSame(10, $paginator->getTotalPages());
		$this->assertTrue($paginator->haveToPaginate());
		$this->assertTrue($paginator->hasPreviousPage());
		$this->assertFalse($paginator->hasNextPage());
		$this->assertSame(1, $paginator->getFirstPage());
		$this->assertSame(10, $paginator->getLastPage());
		$this->assertFalse($paginator->getNextPage());
		$this->assertSame(9, $paginator->getPreviousPage());
		$this->assertSame(90, $paginator->getOffset());
	}
/*
	public function testMakeUrl() {
		
	}*/
}
?>