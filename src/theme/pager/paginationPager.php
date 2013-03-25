<div class="pagination pager">
	<ul>
<?php if ($this->getFirstPage() !== $this->getCurrentPage()) {?>
	<li><a href="<?php $this->makeUrl($this->getCurrentPage() - 1); ?>" class="previous">Previous</a></li>
<?php } else { ?>
	<li><a href="# ?>" class="previous">Previous</a></li>
<?php } ?>

	<?php if ($this->getLastPage() !== $this->getCurrentPage()) {?>
	<li><a href="<?php $this->makeUrl($this->getCurrentPage() + 1); ?>" class="next">Next</a></li>
<?php } else { ?>
	<li><a href="# ?>" class="previous">Next</a></li>
<?php } ?>
	</ul>
</div>