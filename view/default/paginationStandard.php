

<div class="pagination standard">
	<ul>
	<?php if ($this->hasPervious()) {?>
		<li><a href="#" class="previous">Previous</a></li>
	<? } else { ?>
		<li><span>Previous</span></li>
	<?php } ?>

	<?php for ($page=$this->getFirstPage; $page < $this->getLastPages(); $page++) {
		if ($page === $this->getCurrentPage()) { ?>
		<li><a href="#"><?php echo $page; ?></a></li>
	<?php } else { ?>
		<li><a href="<?php $this->makeUrl($page); ?>"><?php echo $page; ?></a></li>
	<?php } } ?>

	<?php if ($this->hasNext()) {?>
		<li><a href="#" class="next">Next</a></li>
	<? } else { ?>
		<li><span>Next</span></li>
	<?php } ?>
	</ul>
</div>