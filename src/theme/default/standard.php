<?php
include "../../paginator.php";
//get page params
$input = array('currentPage'=>5, 'numItemsPerPage'=>10, 'totalItems'=>100);

if ($_GET['page']) {
	$input['currentPage']=$_GET['page'];
}

$pager = new Paginator($input);
$page = $pager->getCurrentPage();

$totalPages = $pager->getTotalPages();
$adjacents = $pager->getAdjacents();

//set default params	
$prevLabel  = "Prev";
$nextLabel  = "Next";
$url = $_SERVER['PHP_SELF'];
?>

<div class="pagination standard">
<?php
//previous
if($page==1) {
	$out.= "<span>" . $prevLabel . "</span>\n";
} else {
	$out.= "<a href=\"" . $url . "?page=" . ($page-1) . "\">" . $prevLabel . "</a>\n";
}

// loop out
$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
$pmax = ( ($page+$adjacents)<$totalPages) ? ($page+$adjacents) : $totalPages;
for( $i=$pmin; $i<=$pmax; $i++ ) {
	if( $i===$page ) {
		$out.= "<span>" . $i . "</span>\n";
	}
	elseif($i==1) {
		$out.= "<a href=\"" . $url . "\">" . $i . "</a>\n";
	}
	else {
		$out.= "<a href=\"" . $url . "?page=" . $i . "\">" . $i . "</a>\n";
	}
}

// next
if( $page<$totalPages ) {
	$out.= "<a href=\"" . $url . "?page=" .($page+1) . "\">" . $nextLabel . "</a>\n";
}
else {
	$out.= "<span>" . $nextLabel . "</span>\n";
}

	echo $out;
?>
</div>