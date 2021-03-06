<?php if (!defined('_JEXEC')) exit('Restricted access'); // no direct access
require_once dirname(__FILE__) . DS . '..' . DS . '..' . DS . '..' . DS . 'functions.php'; ?>
<?php $cparams =& JComponentHelper::getParams('com_media'); ?>
<?php ob_start(); ?>
<?php if ($this->params->get('show_description_image') && $this->section->image) : ?>
	<img src="<?php echo $this->baseurl . '/' . $cparams->get('image_path') . '/'.  $this->section->image;?>" align="<?php echo $this->section->image_position;?>" hspace="6" alt="<?php echo $this->section->image;?>" />
<?php endif; ?>
<?php if ($this->params->get('show_description') && $this->section->description) : ?>
	<?php echo $this->section->description; ?>
<?php endif; ?>
<?php if ($this->params->get('show_categories', 1) && count($this->categories) > 0) : ?>
<ul>
<?php foreach ($this->categories as $category) : ?>
	<?php if (!$this->params->get('show_empty_categories') && !$category->numitems) continue; ?>
	<li>
		<a href="<?php echo $category->link; ?>" class="category"><?php echo $category->title;?></a>
		<?php if ($this->params->get('show_cat_num_articles')) : ?>
		&nbsp;<span class="small">(<?php echo $category->numitems . ' ' . JText::_('items');?>)</span>
		<?php endif; ?>
		<?php if ($this->params->def('show_category_description', 1) && $category->description) : ?>
		<br />
		<?php echo $category->description; ?>
		<?php endif; ?>
	</li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
<?php echo artxPost(artxPageTitle($this), ob_get_clean()); ?>