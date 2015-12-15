<?php if (!defined('_JEXEC')) exit('Restricted access'); // no direct access
require_once dirname(__FILE__) . DS . '..' . DS . '..' . DS . '..' . DS . 'functions.php'; ?>
<?php JHTML::_('stylesheet', 'poll_bars.css', 'components/com_poll/assets/'); ?>
<?php ob_start(); ?>
<form action="index.php" method="post" name="poll" id="poll">
<div class="contentpane<?php echo $this->params->get('pageclass_sfx') ?>">
	<label for="id">
		<?php echo JText::_('Select Poll'); ?>
		<?php echo $this->lists['polls']; ?>
	</label>
</div>
<div class="contentpane<?php echo $this->params->get('pageclass_sfx') ?>">
<?php echo $this->loadTemplate('graph'); ?>
</div>
</form>
<?php echo artxPost(artxPageTitle($this), ob_get_clean()); ?>
