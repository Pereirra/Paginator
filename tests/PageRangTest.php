<?php
require_once 'src/PageRang.php';

class PageRangTest extends PHPUnit_Framework_TestCase {

	public function testCurrentPage() {
		$params = array('currentPage'=>2, 'numItemsPerPage'=>5, 'numItems'=>100);
		$page = new PageRang($params);
		$this->assertSame(2, $page->currentPage());
	}

	public function testNumItemsPerPage() {
		$params = array('currentPage'=>2, 'numItemsPerPage'=>5, 'numItems'=>100);
		$page = new PageRang($params);
		$this->assertSame(5, $page->numItemsPerPage());
	}

	public function testNumItems() {
		$params = array('currentPage'=>2, 'numItemsPerPage'=>5, 'numItems'=>100);
		$page = new PageRang($params);
		$this->assertSame(100, $page->totalItems());
	}
}
?>