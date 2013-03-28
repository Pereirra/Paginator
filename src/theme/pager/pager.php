<?php
include "../../Paginator.php";
$input = array('currentPage'=>5, 'numItemsPerPage'=>10, 'totalItems'=>100);

if ($_GET['page']) {
	$input['currentPage']=$_GET['page'];
}

$pager = new Paginator($input);
$page = $pager->getCurrentPage();

$prevLabel = "Prev";
$nextLabel = "Next";
echo $pager->getTotalItems() . ' total Items<br />';
echo $pager->getNumItemsPerPage() . 'numItemsPerPage<br />';
echo $pager->getLastPage() . ' the last page';
$url = $_SERVER['PHP_SELF'];
?>
<div class="pagination pager">

	<ul>
<?php if ( $pager->getCurrentPage() <= $pager->getFirstPage() ) {?>
	<li><span><?=$prevLabel;?></span></li>
<?php } else { ?>
	<li><a href="<?php echo $url . '?page=' . ($page-1);?>"><?=$prevLabel;?></a></li>
<?php } ?>

<?php if ( $pager->getCurrentPage() >= $pager->getLastPage() ) {?>
	<li><span><?=$nextLabel;?></span></li>
<?php } else { ?>
	<li><a href="<?php echo $url . '?page=' . ($page+1);?>"><?=$nextLabel?></a></li>
<?php } ?>
	</ul>

</div>