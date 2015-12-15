<?php if (!defined('_JEXEC')) exit('Restricted access'); // no direct access
require_once dirname(__FILE__) . DS . '..' . DS . '..' . DS . '..' . DS . 'functions.php'; ?>
<?php ob_start(); ?>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
	<td>
		<?php echo JText::_( 'WELCOME_DESC' ); ?>
	</td>
</tr>
</table>
<?php echo artxPost(artxPageTitle($this), ob_get_clean()); ?>
