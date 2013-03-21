<?php
interface ViewInterface {
	
	function render(Paginator $Paginator, $routeGenerator, array $options = array());

	function getViewName();
}
?>