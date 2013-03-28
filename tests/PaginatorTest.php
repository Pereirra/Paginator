<?php
include 'src/Paginator.php';

class PaginatorTest extends PHPUnit_Framework_TestCase {

	//test results under normal conditions
	public function test100ItemsAndOnPage5() {
		$input = array('currentPage'=>5, 'numItemsPerPage'=>10, 'totalItems'=>100);
		$paginator = new Paginator($input);
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

	//test results when on the last page
	public function test100ItemsAndOnPage10() {
		$input = array('currentPage'=>10, 'numItemsPerPage'=>10, 'totalItems'=>100);
		$paginator = new Paginator($input);
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
	
	//test results when on the first page
	public function test100ItemsAndOnPage1() {
		$input = array('currentPage'=>1, 'numItemsPerPage'=>10, 'totalItems'=>100);
		$paginator = new Paginator($input);
		$this->assertFalse($paginator->isOutOfBounds());
		$this->assertSame(10, $paginator->getNumItemsPerPage());
		$this->assertSame(1, $paginator->getCurrentPage());
		$this->assertSame(100, $paginator->getTotalItems());
		$this->assertSame(10, $paginator->getTotalPages());
		$this->assertTrue($paginator->haveToPaginate());
		$this->assertFalse($paginator->hasPreviousPage());
		$this->assertTrue($paginator->hasNextPage());
		$this->assertSame(1, $paginator->getFirstPage());
		$this->assertSame(10, $paginator->getLastPage());
		$this->assertFalse($paginator->getPreviousPage());
		$this->assertSame(2, $paginator->getNextPage());
		$this->assertSame(0, $paginator->getOffset());
	}

	//teste no items
	public function testNoItems() {
		$input = array('currentPage'=>1, 'numItemsPerPage'=>5, 'totalItems'=>0);
		$paginator = new Paginator($input);
		$this->assertSame(1, $paginator->getCurrentPage());
		$this->assertSame(0, $paginator->getTotalItems());
		$this->assertSame(0, $paginator->getTotalPages());
	}
	/*
	public function testMakeUrl() {
		
	}*/
}
?>