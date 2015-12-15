<?php if (!defined('_JEXEC')) exit('Restricted access'); // no direct access ?>
<script language="javascript" type="text/javascript">
	function tableOrdering( order, dir, task )
	{
		var form = document.adminForm;
		form.filter_order.value = order;
		form.filter_order_Dir.value = dir;
		document.adminForm.submit(task);
	}
</script>
<form action="<?php echo artxUrlToHref($this->action); ?>" method="post" name="adminForm">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php if ($this->params->get('filter') || $this->params->get('show_pagination_limit')) : ?>
<tr>
	<td colspan="5">
		<table>
			<tr>
			<?php if ($this->params->get('filter')) : ?>
				<td align="left" width="60%" nowrap="nowrap">
					<?php echo JText::_($this->params->get('filter_type') . ' Filter').'&nbsp;'; ?>
					<input type="text" name="filter" value="<?php echo $this->lists['filter'];?>" class="inputbox" onchange="document.adminForm.submit();" />
				</td>
			<?php endif; ?>
			<?php if ($this->params->get('show_pagination_limit')) : ?>
				<td align="right" width="40%" nowrap="nowrap">
				<?php
					echo '&nbsp;&nbsp;&nbsp;'.JText::_('Display Num') . '&nbsp;';
					echo $this->pagination->getLimitBox();
				?>
				</td>
			<?php endif; ?>
			</tr>
		</table>
	</td>
</tr>
<?php endif; ?>
<?php if ($this->params->get('show_headings')) : ?>
<tr>
	<td class="sectiontableheader<?php echo $this->params->get('pageclass_sfx'); ?>" align="right" width="5%">
		<?php echo JText::_('Num'); ?>
	</td>
	<?php if ($this->params->get('show_title')) : ?>
 	<td class="sectiontableheader<?php echo $this->params->get('pageclass_sfx'); ?>" width="45%">
		<?php echo JHTML::_('grid.sort',  'Item Title', 'a.title', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</td>
	<?php endif; ?>
	<?php if ($this->params->get('show_date')) : ?>
	<td class="sectiontableheader<?php echo $this->params->get('pageclass_sfx'); ?>" width="25%">
		<?php echo JHTML::_('grid.sort',  'Date', 'a.created', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</td>
	<?php endif; ?>
	<?php if ($this->params->get('show_author')) : ?>
	<td class="sectiontableheader<?php echo $this->params->get('pageclass_sfx'); ?>"  width="20%">
		<?php echo JHTML::_('grid.sort',  'Author', 'author', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</td>
	<?php endif; ?>
	<?php if ($this->params->get('show_hits')) : ?>
	<td align="center" class="sectiontableheader<?php echo $this->params->get('pageclass_sfx'); ?>" width="5%" nowrap="nowrap">
		<?php echo JHTML::_('grid.sort',  'Hits', 'a.hits', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</td>
	<?php endif; ?>
</tr>
<?php endif; ?>
<?php foreach ($this->items as $item) : ?>
<tr class="sectiontableentry<?php echo ($item->odd +1 ) . $this->params->get('pageclass_sfx'); ?>" >
	<td align="right">
		<?php echo $this->pagination->getRowOffset($item->count); ?>
	</td>
	<?php if ($this->params->get('show_title')) : ?>
		<?php if ($item->access <= $this->user->get('aid', 0)) : ?>
		<td>
			<a href="<?php echo $item->link; ?>">
				<?php echo $item->title; ?></a>
				<?php $this->item = $item; echo JHTML::_('icon.edit', $item, $this->params, $this->access) ?>
		</td>
		<?php else : ?>
		<td>
			<?php
				echo $this->escape($item->title).' : ';
				$link = JRoute::_('index.php?option=com_user&view=login');
				$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug, $item->sectionid));
				$fullURL = new JURI($link);
				$fullURL->setVar('return', base64_encode($returnURL));
				$link = $fullURL->toString();
			?>
			<a href="<?php echo $link; ?>">
				<?php echo JText::_( 'Register to read more...' ); ?></a>
		</td>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ($this->params->get('show_date')) : ?>
		<td><?php echo $item->created; ?></td>
	<?php endif; ?>
	<?php if ($this->params->get('show_author')) : ?>
		<td><?php echo $item->created_by_alias ? $item->created_by_alias : $item->author; ?></td>
	<?php endif; ?>
	<?php if ($this->params->get('show_hits')) : ?>
		<td align="center"><?php echo $item->hits ? $item->hits : '-'; ?></td>
	<?php endif; ?>
</tr>
<?php endforeach; ?>
</table>
<?php if ($this->params->get('show_pagination')) : ?>
<?php $paginationPagesLinks = trim($this->pagination->getPagesLinks());
$paginationPagesCounter = trim($this->pagination->getPagesCounter()); ?>
<?php if (strlen($paginationPagesLinks) > 0 || strlen($paginationPagesCounter) > 0) : ?>
<div id="navigation">
	<?php if (strlen($paginationPagesLinks) > 0) : ?><p><?php echo $paginationPagesLinks; ?></p><?php endif; ?>
	<?php if (strlen($paginationPagesCounter) > 0) : ?><p><?php echo $paginationPagesCounter; ?></p><?php endif; ?>
</div>
<?php endif; ?>
<?php endif; ?>
<input type="hidden" name="id" value="<?php echo $this->category->id; ?>" />
<input type="hidden" name="sectionid" value="<?php echo $this->category->sectionid; ?>" />
<input type="hidden" name="task" value="<?php echo $this->lists['task']; ?>" />
<input type="hidden" name="filter_order" value="" />
<input type="hidden" name="filter_order_Dir" value="" />
<input type="hidden" name="limitstart" value="0" />
</form>
