<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );
define( 'YOURBASEPATH', dirname(__FILE__) );

$live_site                  = $mainframe->getCfg('live_site');
$template_path              = $this->baseurl . '/templates/' .  $this->template;
$show_flashheader           = ($this->params->get("showFlashheader", 1)  == 0)?"false":"true";
$show_logo                  = ($this->params->get("showLogo", 1)  == 0)?"false":"true";
$show_date                  = ($this->params->get("showDate", 1)  == 0)?"false":"true";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<jdoc:include type="head" />
<link rel="shortcut icon" href="<?php echo $this->baseurl; ?>/images/favicon.ico" />
<link href="<?php echo $this->baseurl ?>/templates/system/css/system.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->baseurl ?>/templates/system/css/general.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_css.css" rel="stylesheet" type="text/css" />
</head>
<body id="body_bg">
<table width="998" border="0" align="center" cellpadding="0" cellspacing="0" id="maintable">
<tr>
<td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="top_border_left">&nbsp;</td>
<td class="top_border_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td colspan="2">
<div id="tophead">
<!-- BEGIN: LOGO -->
<?php if($show_logo == "true") : ?>
<div id="logo">
<a href="<?php echo $mosConfig_live_site;?>">
<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/images/logo.png" alt="" />
</a>
</div>
<?php endif; ?>
<!-- END: LOGO -->
<!-- BEGIN: flashheader -->
<?php if($show_flashheader == "true") : ?>
<div id="ol-flashheader">
<object type="application/x-shockwave-flash" data="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/images/header.swf" width="700" height="240">
<param name="wmode" value="transparent" />
<param name="movie" value="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/images/header.swf" />
</object>
</div>
<?php endif; ?>
<!-- END: flashheader -->
</div>
</td>
</tr>
</table></td>
<td class="top_border_right">&nbsp;</td>
</tr>
<tr>
<td class="sub_top_border_left">&nbsp;</td>
<td class="sub_top_bg">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<div id="topmenu">
<jdoc:include type="modules" name="user3" />
</div>
</td>
<td>
<!-- BEGIN: Date -->
<?php if($show_date == "true") : ?>
<div id="date">
<div align="right">
<?php $now = &JFactory::getDate(); echo $now->toFormat("%A, %d %b %Y"); ?>
</div>
</div>
<?php endif; ?>
<!-- END: Date -->
</td>
</tr>
</table>
</td>
<td class="sub_top_border_right">&nbsp;</td>
</tr>
<tr>
<td class="maincontent_border_left">&nbsp;</td>
<td class="maincontent">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<?php if( $this->countModules('left') ) {?>
<td valign="top" class="left_table">
<div id="left">
<jdoc:include type="modules" name="left" style="xhtml" />
</div>
</td>
<?php } ?>
<td valign="top" class="mainbody">

<table width="98%" border="0" align="center" cellpadding="4" cellspacing="0">
<tr>
<td>
<jdoc:include type="modules" name="user1" style="xhtml" /></td>
<td>
<jdoc:include type="modules" name="user2" style="xhtml" /></td>
</tr>
</table>
<div id="mainbody">
<jdoc:include type="message" />
<jdoc:include type="component" />
</div><div id="banner">
<jdoc:include type="modules" name="banner" />
</div></td>
<?php if( $this->countModules('right') ) {?>
<td valign="top" class="right_table">
<div id="right">
<jdoc:include type="modules" name="right" style="rounded" />
</div>
</td>
<?php } ?>
</tr>
</table>
</td>
<td class="maincontent_border_right">&nbsp;</td>
</tr>
<tr>
<td class="footer_border_left">&nbsp;</td>
<td class="footer_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>&nbsp;</td>
<td><div id="bottom_links">
<div align="right">
<?php include (dirname(__FILE__).DS.'/footer.php');?>
</div>
</div></td>
</tr>
</table></td>
<td class="footer_border_right">&nbsp;</td>
</tr>
</table></td>
</tr>
</table>
</body>
</html>