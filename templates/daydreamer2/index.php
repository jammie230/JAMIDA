<?php

/**
 * @copyright holder is Amigrend
 * @creator of the gfx is Actiview.de
 * @license Creative Commons 2.5
 * If you use this template or parts of it, please setup a link somewhere in your site to www.amigrend.de
 * or leave the link in the footer-part untouched. That is all you have to do, to legaly use this tem and the graphics in it.
 * Please be fair, so I can create more temps like this in the future - thanks.
 */

defined('_JEXEC') or die('Restricted access'); // no direct access
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions.php';
$document = isset($this) ? $this : null;
$baseUrl = $this->baseurl;
$templateUrl = $this->baseurl . '/templates/' . $this->template;
artxComponentWrapper($document);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
 <head>
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<jdoc:include type="head" />
  <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/system.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/general.css" type="text/css" />

  <link rel="stylesheet" type="text/css" href="<?php echo $templateUrl; ?>/css/template.css" />

  <script type="text/javascript" src="<?php echo $templateUrl; ?>/script.js"></script>
 </head>
<body>
    <div class="PageBackgroundGradient"></div>
<div class="PageBackgroundGlare">
    <div class="PageBackgroundGlareImage"></div>
</div>
<div class="Main">
<div class="Sheet">
    <div class="Sheet-tl"></div>
    <div class="Sheet-tr"></div>
    <div class="Sheet-bl"></div>
    <div class="Sheet-br"></div>
    <div class="Sheet-tc"></div>
    <div class="Sheet-bc"></div>
    <div class="Sheet-cl"></div>
    <div class="Sheet-cr"></div>
    <div class="Sheet-cc"></div>
    <div class="Sheet-body">
<jdoc:include type="modules" name="user3" />
<div class="Header">
    <div class="Header-jpeg"><div class="anihead"></div><div class="anileg"></div></div>
<div class="logo">
 <h1 id="name-text" class="logo-name"><a href="<?php echo $baseUrl; ?>/"><?php echo $this->params->get('Site-Title'); ?></a></h1>
 <div id="slogan-text" class="logo-text"><?php echo $this->params->get('Site-Description'); ?></div>

</div>


</div>
<jdoc:include type="modules" name="banner1" style="xhtml" />
<?php echo artxPositions($document, array('top1', 'top2', 'top3'), 'artblock'); ?>
<div class="contentLayout">
<?php if (artxCountModules($document, 'left')) : ?>
<div class="sidebar1"><?php echo artxModules($document, 'left', 'artblock'); ?>
</div>
<?php endif; ?>
<div class="<?php echo artxGetContentCellStyle($document); ?>">

<?php
  echo artxModules($document, 'banner2', 'xhtml');
  if (artxCountModules($document, 'breadcrumb'))
    echo artxPost(null, artxModules($document, 'breadcrumb'));
  echo artxPositions($document, array('user1', 'user2'), 'artpost');
  echo artxModules($document, 'banner3', 'xhtml');
?>
<?php if (artxHasMessages()) : ?><div class="Post">
    <div class="Post-body">
<div class="Post-inner">
<div class="PostContent">

<jdoc:include type="message" />

</div>
<div class="cleared"></div>

</div>

    </div>
</div>
<?php endif; ?>
<jdoc:include type="component" />

<?php echo artxModules($document, 'banner4', 'xhtml'); ?>
<?php echo artxPositions($document, array('user4', 'user5'), 'artpost'); ?>
<?php echo artxModules($document, 'banner5', 'xhtml'); ?>
</div>
<?php if (artxCountModules($document, 'right')) : ?>
<div class="sidebar2"><?php echo artxModules($document, 'right', 'artblock'); ?>
</div>
<?php endif; ?>

</div>
<div class="cleared"></div>

<?php echo artxPositions($document, array('bottom1', 'bottom2', 'bottom3'), 'artblock'); ?>
<jdoc:include type="modules" name="banner6" style="xhtml" />
<div class="Footer">
 <div class="Footer-inner">
  <?php echo artxModules($document, 'syndicate'); ?>
  <div class="Footer-text">
  <?php if (artxCountModules($document, 'copyright') == 0): ?>
<p>Content is copyright &copy; 2009 ---.<br/>
All Rights Reserved.</p>

  <?php else: ?>
  <?php echo artxModules($document, 'copyright', 'xhtml'); ?>
  <?php endif; ?>
  </div>
 </div>
 <div class="Footer-background"></div>
</div>

    </div>
</div>
<div class="cleared"></div>
<p class="page-footer">Joomla template by <a href="http://www.amigrend.de/" target="blank" title="behandlung von migraene">Amigrend</a>.</p>
</div>

</body> 
</html>