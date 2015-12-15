<?php if (!defined('_JEXEC')) exit('Restricted access'); // no direct access
require_once dirname(__FILE__) . DS . '..' . DS . '..' . DS . '..' . DS . 'functions.php'; ?>
<?php ob_start(); ?>
<table width="100%" cellpadding="4" cellspacing="0" border="0" align="center" class="contentpane<?php echo $this->params->get('pageclass_sfx'); ?>">
<?php if ( ($this->params->get('image') != -1) || $this->params->get('show_comp_description') ) : ?>
<tr>
	<td valign="top" class="contentdescription<?php echo $this->params->get('pageclass_sfx'); ?>">
	<?php
		if ( isset($this->image) ) :  echo $this->image; endif;
		echo $this->params->get('comp_description');
	?>
	</td>
</tr>
<?php endif; ?>
</table>
<?php if (count($this->categories) > 0) : ?>
<ul>
<?php foreach ( $this->categories as $category ) : ?>
	<li>
		<a href="<?php echo $category->link; ?>" class="category<?php echo $this->params->get('pageclass_sfx'); ?>">
			<?php echo $category->title; ?></a>
		<?php if ( $this->params->get( 'show_cat_items' ) ) : ?>
		&nbsp;
		<span class="small">(<?php echo $category->numlinks; ?>)</span>
		<?php endif; ?>
		<?php if ( $this->params->get( 'show_cat_description' ) && $category->description ) : ?>
		<br />
		<?php echo $category->description; ?>
		<?php endif; ?>
	</li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
<?php echo artxPost(artxPageTitle($this), ob_get_clean()); ?>