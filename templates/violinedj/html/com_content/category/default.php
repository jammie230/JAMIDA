<?php if (!defined('_JEXEC')) exit('Restricted access'); // no direct access
require_once dirname(__FILE__) . DS . '..' . DS . '..' . DS . '..' . DS . 'functions.php'; ?>

<?php $cparams =& JComponentHelper::getParams('com_media'); ?>

<?php ob_start(); ?>
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="contentpane<?php echo $this->params->get('pageclass_sfx'); ?>">
<tr>
	<td width="60%" valign="top" class="contentdescription<?php echo $this->params->get('pageclass_sfx'); ?>" colspan="2">
	<?php if ($this->category->image) : ?>
		<img src="<?php echo $this->baseurl . '/' . $cparams->get('image_path') . '/'. $this->category->image;?>" align="<?php echo $this->category->image_position;?>" hspace="6" alt="<?php echo $this->category->image;?>" />
	<?php endif; ?>
	<?php echo $this->category->description; ?>
</td>
</tr>
<tr>
	<td>
	<?php
		$this->items =& $this->getItems();
		echo $this->loadTemplate('items');
	?>
	<?php if ($this->access->canEdit || $this->access->canEditOwn) :
			echo JHTML::_('icon.create', $this->category  , $this->params, $this->access);
	endif; ?>
	</td>
</tr>
</table>
<?php echo artxPost(artxPageTitle($this), ob_get_clean()); ?>