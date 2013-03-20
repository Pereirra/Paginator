<?php
interface AdapterInterface {

	public function getNumResults();

	public function getSlice($offset, $length);
}
?>