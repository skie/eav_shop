<?php if ($this->Paginator->hasNext() || $this->Paginator->hasPrev()): ?>
	<div class="paging">
		<?php echo $this->Paginator->prev('< prev', array(), null, array('class' => 'disabled'));?>
		<?php echo $this->Paginator->numbers(array('separator' => ' '));?>
		<?php echo $this->Paginator->next('next >', array(), null, array('class' => 'disabled'));?>
	</div>
<?php endif; ?>