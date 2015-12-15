<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

if (!defined('_ARTX_FUNCTIONS')) {

	define('_ARTX_FUNCTIONS', 1);

	function artxHasMessages()
	{
		global $mainframe;
		$messages = $mainframe->getMessageQueue();
		if (is_array($messages) && count($messages))
			foreach ($messages as $msg)
				if (isset($msg['type']) && isset($msg['message']))
					return true;
		return false;
	}

	function artxUrlToHref($url)
	{
		$result = '';
		$p = parse_url($url);
		if (isset($p['scheme']) && isset($p['host'])) {
			$result = $p['scheme'] . '://';
			if (isset($p['user'])) {
				$result .= $p['user'];
				if (isset($p['pass']))
					$result .= ':' . $p['pass'];
				$result .= '@';
			}
			$result .= $p['host'];
			if (isset($p['port']))
				$result .= ':' . $p['port'];
			if (!isset($p['path']))
				$result .= '/';
		}
		if (isset($p['path']))
			$result .= $p['path'];
		if (isset($p['query'])) {
			$result .= '?' . str_replace('&', '&amp;', $p['query']);
		}
		if (isset($p['fragment']))
			$result .= '#' . $p['fragment'];
		return $result;
	}

	function artxPost($caption, $content)
	{
		$hasCaption = (null !== $caption && strlen(trim($caption)) > 0);
		$hasContent = (null !== $content && strlen(trim($content)) > 0);

		if (!$hasCaption && !$hasContent)
			return '';

		ob_start();
?>
<div class="Post">
		    <div class="Post-body">
		<div class="Post-inner">
		
		<?php if ($hasCaption): ?>
<h2 class="PostHeaderIcon-wrapper"> <span class="PostHeader">
		<?php echo $caption; ?>
</span>
		</h2>
		
		<?php endif; ?>
		<?php if ($hasContent): ?>
<div class="PostContent">
		
		<?php echo $content; ?>

		</div>
		<div class="cleared"></div>
		
		<?php endif; ?>

		</div>
		
		    </div>
		</div>
		
<?php
		return ob_get_clean();
	}

	function artxBlock($caption, $content)
	{
		$hasCaption = (null !== $caption && strlen(trim($caption)) > 0);
		$hasContent = (null !== $content && strlen(trim($content)) > 0);

		if (!$hasCaption && !$hasContent)
			return '';

		ob_start();
?>
<div class="Block">
		    <div class="Block-body">
		
		<?php if ($hasCaption): ?>
<div class="BlockHeader">
		    <div class="l"></div>
		    <div class="r"></div>
		    <div class="header-tag-icon">
		        <div class="t">
		<?php echo $caption; ?>
</div>
		    </div>
		</div>
		<?php endif; ?>
		<?php if ($hasContent): ?>
<div class="BlockContent">
		    <div class="BlockContent-body">
		
		<?php echo $content; ?>

		    </div>
		</div>
		
		<?php endif; ?>

		    </div>
		</div>
		
<?php
		return ob_get_clean();
	}

	function artxPageTitle($page, $criteria = null, $key = null)
	{
		if ($criteria === null)
			$criteria = $page->params->def('show_page_title', 1);
		return $criteria
			? ('<span class="componentheading' . $page->params->get('pageclass_sfx') . '">'
				. $page->escape($page->params->get($key === null ? 'page_title' : $key)) . '</span>')
			: '';
	}
	
	function artxPositions($document, $positions, $style)
	{
		ob_start();
		if (count($positions) == 3) {
			if ($document->countModules($positions[0]) && $document->countModules($positions[1]) && $document->countModules($positions[2])) {
				?>
<table class="position" cellpadding="0" cellspacing="0" border="0">
<tr valign="top">
  <td width="33%"><jdoc:include type="modules" name="<?php echo $positions[0]; ?>" style="<?php echo $style; ?>" /></td>
  <td width="33%"><jdoc:include type="modules" name="<?php echo $positions[1]; ?>" style="<?php echo $style; ?>" /></td>
  <td><jdoc:include type="modules" name="<?php echo $positions[2]; ?>" style="<?php echo $style; ?>" /></td>
</tr>
</table>
<?php } elseif ($document->countModules($positions[0]) && $document->countModules($positions[1])) { ?>
<table class="position" cellpadding="0" cellspacing="0" border="0">
<tr valign="top">
  <td width="33%"><jdoc:include type="modules" name="<?php echo $positions[0]; ?>" style="<?php echo $style; ?>" /></td>
  <td><jdoc:include type="modules" name="<?php echo $positions[1]; ?>" style="<?php echo $style; ?>" /></td>
</tr>
</table>
<?php } elseif ($document->countModules($positions[1]) && $document->countModules($positions[2])) { ?>
<table class="position" cellpadding="0" cellspacing="0" border="0">
<tr valign="top">
  <td width="67%"><jdoc:include type="modules" name="<?php echo $positions[1]; ?>" style="<?php echo $style; ?>" /></td>
  <td><jdoc:include type="modules" name="<?php echo $positions[2]; ?>" style="<?php echo $style; ?>" /></td>
</tr>
</table>
<?php } elseif ($document->countModules($positions[0]) && $document->countModules($positions[2])) { ?>
<table class="position" cellpadding="0" cellspacing="0" border="0">
<tr valign="top">
  <td width="50%"><jdoc:include type="modules" name="<?php echo $positions[0]; ?>" style="<?php echo $style; ?>" /></td>
  <td><jdoc:include type="modules" name="<?php echo $positions[2]; ?>" style="<?php echo $style; ?>" /></td>
</tr>
</table>
<?php } else { ?>
<jdoc:include type="modules" name="<?php echo $positions[0]; ?>" style="<?php echo $style; ?>" />
<jdoc:include type="modules" name="<?php echo $positions[1]; ?>" style="<?php echo $style; ?>" />
<jdoc:include type="modules" name="<?php echo $positions[2]; ?>" style="<?php echo $style; ?>" />
<?php } ?>
<?php } elseif (count($positions) == 2) { ?>
<?php if ($document->countModules($positions[0]) && $document->countModules($positions[1])) { ?>
<table class="position" cellpadding="0" cellspacing="0" border="0">
<tr valign="top">
<td width="50%"><jdoc:include type="modules" name="<?php echo $positions[0]; ?>" style="<?php echo $style; ?>" /></td>
<td><jdoc:include type="modules" name="<?php echo $positions[1]; ?>" style="<?php echo $style; ?>" /></td>
</tr>
</table>
<?php } else { ?>
<jdoc:include type="modules" name="<?php echo $positions[0]; ?>" style="<?php echo $style; ?>" />
<jdoc:include type="modules" name="<?php echo $positions[1]; ?>" style="<?php echo $style; ?>" />
<?php }
		} // count($positions)
		return ob_get_clean();
	}
	
	function artxGetContentCellStyle($document)
	{
		$leftCnt = $document->countModules('left');
		$rightCnt = $document->countModules('right');
		if ($leftCnt > 0 && $rightCnt > 0)
			return 'content';
		if ($rightCnt > 0)
			return 'content-sidebar1';
		if ($leftCnt > 0)
			return 'content-sidebar2';
		return 'content-wide';
	}

}