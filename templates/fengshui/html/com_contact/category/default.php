<?php if (!defined('_JEXEC')) exit('Restricted access'); // no direct access
require_once dirname(__FILE__) . DS . '..' . DS . '..' . DS . '..' . DS . 'functions.php'; ?>
<?php $cparams =& JComponentHelper::getParams('com_media'); ?>
<?php ob_start(); ?>
<div class="contentpane<?php echo $this->params->get('pageclass_sfx'); ?>">
<?php if ($this->category->image || $this->category->description) : ?>
	<div class="contentdescription<?php echo $this->params->get('pageclass_sfx'); ?>">
	<?php if ($this->params->get('image') != -1 && $this->params->get('image') != '') : ?>
		<img src="<?php echo $this->baseurl . '/' . $cparams->get('image_path') . '/' . $this->params->get('image'); ?>" align="<?php echo $this->params->get('image_align'); ?>" hspace="6" alt="<?php echo JText::_( 'Contacts' ); ?>" />
	<?php elseif ($this->category->image) : ?>
		<img src="<?php echo $this->baseurl . '/' . $cparams->get('image_path') . '/' . $this->category->image; ?>" align="<?php echo $this->category->image_position; ?>" hspace="6" alt="<?php echo JText::_( 'Contacts' ); ?>" />
	<?php endif; ?>
	<?php echo $this->category->description; ?>
	</div>
<?php endif; ?>
<script language="javascript" type="text/javascript">
function tableOrdering(order, dir, task) {
	var form = document.adminForm;
	form.filter_order.value = order;
	form.filter_order_Dir.value = dir;
	document.adminForm.submit(task);
}
</script>
<form action="<?php echo artxUrlToHref($this->action); ?>" method="post" name="adminForm">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<?php if ($this->params->get('show_limit')) : ?>
	<thead>
		<tr>
			<td align="right" colspan="6">
				<?php echo JText::_('Display Num'); ?>&nbsp;<?php echo $this->pagination->getLimitBox(); ?>
			</td>
		</tr>
	</thead>
	<?php endif; ?>
	<tbody>
	<?php if ($this->params->get('show_headings')) : ?>
		<tr>
			<td width="5" align="right" class="sectiontableheader<?php echo $this->params->get('pageclass_sfx'); ?>">
				<?php echo JText::_('Num'); ?>
			</td>
			<td height="20" class="sectiontableheader<?php echo $this->params->get('pageclass_sfx'); ?>">
				<?php echo JHTML::_('grid.sort',  'Name', 'cd.name', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</td>
			<?php if ( $this->params->get('show_position') ) : ?>
			<td height="20" class="sectiontableheader<?php echo  $this->params->get('pageclass_sfx'); ?>">
				<?php echo JHTML::_('grid.sort',  'Position', 'cd.con_position', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</td>
			<?php endif; ?>
			<?php if ( $this->params->get('show_email') ) : ?>
			<td height="20" width="20%" class="sectiontableheader<?php echo $this->params->get('pageclass_sfx'); ?>">
				<?php echo JText::_( 'Email' ); ?>
			</td>
			<?php endif; ?>
			<?php if ( $this->params->get('show_telephone') ) : ?>
			<td height="20" width="15%" class="sectiontableheader<?php echo $this->params->get('pageclass_sfx'); ?>">
				<?php echo JText::_( 'Phone' ); ?>
			</td>
			<?php endif; ?>
			<?php if ( $this->params->get('show_mobile') ) : ?>
			<td height="20" width="15%" class="sectiontableheader<?php echo $this->params->get('pageclass_sfx'); ?>">
				<?php echo JText::_( 'Mobile' ); ?>
			</td>
			<?php endif; ?>
			<?php if ( $this->params->get('show_fax') ) : ?>
				<td height="20" width="15%" class="sectiontableheader<?php echo $this->params->get('pageclass_sfx'); ?>">
					<?php echo JText::_( 'Fax' ); ?>
				</td>
			<?php endif; ?>
		</tr>
	<?php endif; ?>
	<?php echo $this->loadTemplate('items'); ?>
</tbody>
</table>
<?php $paginationPagesLinks = trim($this->pagination->getPagesLinks());
$paginationPagesCounter = trim($this->pagination->getPagesCounter()); ?>
<?php if (strlen($paginationPagesLinks) > 0 || strlen($paginationPagesCounter) > 0) : ?>
<div id="navigation">
	<?php if (strlen($paginationPagesLinks) > 0) : ?><p><?php echo $paginationPagesLinks; ?></p><?php endif; ?>
	<?php if (strlen($paginationPagesCounter) > 0) : ?><p><?php echo $paginationPagesCounter; ?></p><?php endif; ?>
</div>
<?php endif; ?>
<input type="hidden" name="option" value="com_contact" />
<input type="hidden" name="catid" value="<?php echo $this->category->id;?>" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="" />
</form>
</div>
<?php echo artxPost(artxPageTitle($this), ob_get_clean()); ?>