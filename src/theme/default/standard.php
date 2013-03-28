<div class="pagination standard">
<?php
include "../../Paginator.php";
//get page params
$input = array('currentPage'=>5, 'numItemsPerPage'=>10, 'totalItems'=>100);
$paginator = new Paginator($input);
$page = $paginator->getCurrentPage();
$totalPages = $paginator->getTotalPages();
$firstPage = $paginator->getFirstPage();
$lastPage = $paginator->getLastPages();
$adjacents = $paginator->getAdjacents();

//set default params	
$prevlabel  = "Prev";
$nextlabel  = "Next";
$url = "";

// previous
if($page==1) {
	$out.= "<span>" . $prevlabel . "</span>\n";
} else {
	$out.= "<a href=\"" . $url . "&amp;page=" . ($page-1) . "\">" . $prevlabel . "</a>\n";
}

// 1 2 3 4 etc
$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
for($i=$pmin; $i<=$pmax; $i++) {
	if($i==$page) {
		$out.= "<span class=\"current\">" . $i . "</span>\n";
	}
	elseif($i==1) {
		$out.= "<a href=\"" . $url . "\">" . $i . "</a>\n";
	}
	else {
		$out.= "<a href=\"" . $url . "&amp;page=" . $i . "\">" . $i . "</a>\n";
	}
}

// next
if($page<$tpages) {
	$out.= "<a href=\"" . $url . "&amp;page=" .($page+1) . "\">" . $nextlabel . "</a>\n";
}
else {
	$out.= "<span>" . $nextlabel . "</span>\n";
}

return $out;
}
?>
</div>