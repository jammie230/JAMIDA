<?php if (!defined('_JEXEC')) exit('Restricted access'); // no direct access
require_once dirname(__FILE__) . DS . '..' . DS . '..' . DS . '..' . DS . 'functions.php'; ?>
<?php ob_start(); ?>
<form action="index.php" method="post" name="login" id="login">
<table border="0" align="center" cellpadding="4" cellspacing="0" class="contentpane<?php echo $this->params->get('pageclass_sfx'); ?>" width="100%">
<tr>
	<td valign="top">
		<div>
		<?php echo $this->image; ?>
		<?php
			if ($this->params->get('description_logout')) :
				echo $this->params->get('description_logout_text');
			endif;
		?>
		</div>
	</td>
</tr>
<tr>
	<td align="center">
		<div align="center">
			<input type="submit" name="Submit" class="button" value="<?php echo JText::_( 'Logout' ); ?>" />
		</div>
	</td>
</tr>
</table>

<br /><br />

<input type="hidden" name="option" value="com_user" />
<input type="hidden" name="task" value="logout" />
<input type="hidden" name="return" value="<?php echo $this->return; ?>" />
</form>
<?php echo artxPost(artxPageTitle($this, $this->params->get('show_logout_title'), 'header_logout'), ob_get_clean()); ?>